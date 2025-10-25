<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('student')->orderBy('date', 'desc')->paginate(5);
        return view('document.index', ['documents' => $documents]);
    }

    public function create()
    {
        return view('document.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'nullable|max:255',
            'file' => 'required|file|mimes:pdf,zip,doc,docx|max:10240',
        ], [], [
            'title_fr' => 'titre en français',
            'title_en' => 'titre en anglais',
            'file' => 'fichier'
        ]);

        $document_title = array_filter([
            'fr' => $request->title_fr,
            'en' => $request->title_en,
        ]);

        $student = Student::where('email', Auth::user()->email)->first();

        // Sauvegarder le fichier
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        // Créer le document
        Document::create([
            'title' => $document_title,
            'file_path' => $filePath,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientOriginalExtension(),
            'student_id' => $student->id,
            'date' => now()->format('Y-m-d'),
        ]);

        return redirect()->route('documents.index')->withSuccess('Document partagé avec succès!');
    }

    public function edit(Document $document)
    {
        // Vérifier que l'utilisateur est le propriétaire
        $student = Student::where('email', Auth::user()->email)->first();

        if ($document->student_id !== $student->id) {
            return back();
        }

        return view('document.edit', ['document' => $document]);
    }

    public function update(Request $request, Document $document)
    {
        // Vérifier que l'utilisateur est le propriétaire
        $student = Student::where('email', Auth::user()->email)->first();

        if ($document->student_id !== $student->id) {
            return back();
        }

        $request->validate([
            'title_fr' => 'required|max:255',
            'title_en' => 'nullable|max:255',
            'file' => 'nullable|file|mimes:pdf,zip,doc,docx|max:10240',
        ]);

        // Préparer le titre
        $document_title = array_filter([
            'fr' => $request->title_fr,
            'en' => $request->title_en,
        ]);

        $data = [
            'title' => $document_title,
        ];

        // Si un nouveau fichier est téléchargé
        if ($request->hasFile('file')) {
            // Supprimer l'ancien fichier
            Storage::disk('public')->delete($document->file_path);

            // Sauvegarder le nouveau fichier
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            $data['file_path'] = $filePath;
            $data['file_name'] = $file->getClientOriginalName();
            $data['file_type'] = $file->getClientOriginalExtension();
        }

        $document->update($data);

        return redirect()->route('documents.index');
    }

    public function destroy(Document $document)
    {
        // Vérifier que l'utilisateur est le propriétaire
        $student = Student::where('email', Auth::user()->email)->first();

        if ($document->student_id !== $student->id) {
            return back();
        }

        // Supprimer le fichier du stockage
        Storage::disk('public')->delete($document->file_path);

        // Supprimer l'enregistrement
        $document->delete();

        return redirect()->route('documents.index')->withSuccess('Document supprimé avec succès!');
    }

    public function download(Document $document)
    {
        // Vérifier si le fichier existe dans le stockage
        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'Fichier introuvable');
        }

        // Télécharger le fichier avec son nom original
        return Storage::disk('public')->download(
            $document->file_path,
            $document->file_name
        );
    }
}
