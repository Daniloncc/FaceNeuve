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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::select()->orderby('firstname')->paginate(5);
        // print("<pre>");
        // print_r($student->toArray());
        // print("</pre>");
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::select(['id', 'city', 'abreviation'])->orderBy('city', 'ASC')->get();
        // print("<pre>");
        // print_r($cities->toArray());
        // print("</pre>");

        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        //

        $student = Student::create([
            'firstname' => $request->firstname,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'city_id' => $request->city_id,
        ]);


        $students = Student::select()->get();
        // $_SESSION['Success] = 'Task created Successfull'
        //return view('user.login');
        return redirect()->route('student.index')->with('message', 'Etudiant ajoute avec sucess !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

        // print("<pre>");
        // print_r($student->toArray());
        // print("</pre>");
        $cities = City::select(['id', 'city', 'abreviation'])->orderBy('city', 'ASC')->get();
        return view('student.edit', ['student' => $student, 'cities' => $cities]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

        // print("<pre>");
        // print_r($request->toArray());
        // print("</pre>");
        // die;
        $student->update([
            'firstname' => $request->firstname,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'city_id' => $request->city_id,
        ]);

        if (Auth::id() !== 9) {
            return redirect()->route('student.show', $student->id,)->with('message', "Profil mis à jour !");
        }
        //
        return redirect()->route('student.index', $student->id,)->with('message', "L'élève " . $request->firstname . " " . $request->name . " a mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if (Auth::id() === 9) {
            $studentFirstName = $student->firstname;
            $studentName = $student->name;
            // Supprimer Eleve
            $student->delete();

            // Supprimer User
            $user = User::where('email', $student->email)->first();
            $user->delete();

            return redirect()->route('student.index')->with('message', "L'etudiant " . $studentFirstName . " " . $studentName . ' a ete bien supprime');
        }
    }
}
