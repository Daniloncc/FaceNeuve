<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::select()->orderby('firstname')->paginate(5);
        return view('student.index', ['students' => $students]);
    }

    public function create()
    {
        if (Auth::id() === 9) {
            $cities = City::select(['id', 'city', 'abreviation'])->orderBy('city', 'ASC')->get();
            return view('student.create', ['cities' => $cities]);
        }
        return redirect(route('login'));
    }

    public function store(Request $request)
    {
        if (Auth::id() === 9) {
            $request->validate([
                'firstname' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:30',
                'name' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:80',
                'email' => 'required|string|unique:students,email',
                'phone' => 'required|regex:/^[0-9]+$/',
                'address' => 'required|string|max:150',
                'birthday' => [
                    'required',
                    'date',
                    'before_or_equal:' . Carbon::now()->subYears(16)->format('Y-m-d')
                ],
                'city_id' => 'required|integer',
            ]);

            $student = Student::create([
                'firstname' => $request->firstname,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'city_id' => $request->city_id,
            ]);

            return redirect()->route('student.index')->with('message', 'Etudiant ajoute avec sucess !');
        }
        return redirect(route('login'));
    }

    public function show(Student $student)
    {
        $userId = Auth::id();
        $user = User::where('id', $userId)->first();
        if ($user->email === $student->email || $userId === 9) {
            return view('student.show', ['student' => $student]);
        }
        return redirect(route('login'));
    }

    public function edit(Student $student)
    {
        $userId = Auth::id();
        $user = User::where('id', $userId)->first();
        if ($user->email === $student->email || $userId === 9) {
            $cities = City::select(['id', 'city', 'abreviation'])->orderBy('city', 'ASC')->get();
            return view('student.edit', ['student' => $student, 'cities' => $cities]);
        }
        return redirect(route('login'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'firstname' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:30',
            'name' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:80',
            'email' => 'required|string',
            'phone' => 'required|regex:/^[0-9]+$/',
            'address' => 'required|string|max:150',
            'birthday' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(16)->format('Y-m-d')
            ],
            'city_id' => 'required|integer',
        ]);

        $userId = Auth::id();
        $user = User::where('id', $userId)->first();
        if ($user->email === $student->email || $userId === 9) {
            $student->update([
                'firstname' => $request->firstname,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'city_id' => $request->city_id,
            ]);

            if ($userId !== 9) {
                return redirect()->route('student.show', $student->id,)->with('message', "Profil mis à jour !");
            }
            //
            return redirect()->route('student.index', $student->id,)->with('message', "L'élève " . $request->firstname . " " . $request->name . " a mis à jour !");
        }
        return redirect(route('login'));
    }

    public function destroy(Student $student)
    {
        $userId = Auth::id();
        $user = User::where('id', $userId)->first();
        if ($user->email === $student->email || $userId === 9) {
            $studentFirstName = $student->firstname;
            $studentName = $student->name;
            // Supprimer Eleve
            $student->delete();

            // Supprimer User
            $user = User::where('email', $student->email)->first();
            $user->delete();

            if (Auth::id() === 9) {
                return redirect()->route('student.index')->with('message', "L'etudiant " . $studentFirstName . " " . $studentName . ' a ete bien supprime');
            }

            return redirect(route('login'));
        }
    }
}
