<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::select()->orderby('date', 'DESC')->paginate(5);
        return view('forum.index', ['forums' => $forums]);
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|max:100',
            'description_fr' => 'required|max:1000',
            'title_en' => 'required|max:100',
            'description_en' => 'required|max:1000',
        ]);

        $forum_title = array_filter([
            'fr' => $request->title_fr,
            'en' => $request->title_en,
        ]);

        $forum_description = array_filter([
            'fr' => $request->description_fr,
            'en' => $request->description_en
        ]);

        $student = Student::where('email', Auth::user()->email)->first();

        $forum = Forum::create([
            'title' => $forum_title,
            'description' => $forum_description,
            'student_id' => $student->id,
            'date' => now()->format('Y-m-d'),
        ]);

        // // $forums = Forum::select()->orderby('due_date', 'ASC');
        return redirect()->route('forum.index');
    }

    public function edit(Forum $forum)
    {
        // Vérifier que l'utilisateur est le propriétaire
        $student = Student::where('email', Auth::user()->email)->first();

        if ($forum->student_id !== $student->id) {
            return back();
        }
        return view('forum.edit', ['forum' => $forum]);
    }

    public function update(Request $request, Forum $forum)
    {

        // Vérifier que l'utilisateur est le propriétaire
        $student = Student::where('email', Auth::user()->email)->first();

        if ($forum->student_id !== $student->id) {
            return back();
        }

        $request->validate([
            'title_fr' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:100',
            'description_fr' => 'required|max:1000',
            'title_en' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:100',
            'description_en' => 'required|max:1000',
        ]);

        $forum_title = array_filter([
            'fr' => $request->title_fr,
            'en' => $request->title_en,
        ]);

        $forum_description = array_filter([
            'fr' => $request->description_fr,
            'en' => $request->description_en
        ]);

        $student = Student::where('email', Auth::user()->email)->first();

        $forum->update([
            'title' => $forum_title,
            'description' => $forum_description,
            'student_id' => $student->id,
            'date' => now()->format('Y-m-d'),
        ]);

        // // $forums = Forum::select()->orderby('due_date', 'ASC');
        return redirect()->route('forum.index');
        //
    }

    public function destroy(Request $request)
    {
        $forum = Forum::select()->where('id', $request->id)->first();
        // Vérifier que l'utilisateur est le propriétaire
        $student = Student::where('email', Auth::user()->email)->first();

        // print("<pre>");
        // print_r($student->toArray());
        // print("</pre>");

        // print("<pre>");
        // print_r($forum->toArray());
        // print("</pre>");
        if ($forum->student_id !== $student->id) {
            return back();
        }
        $forum->delete();
        return redirect()->route('forum.index');
    }
}
