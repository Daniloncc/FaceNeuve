<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select()
            ->orderby('name')
            ->paginate(5);
        return view('user.index', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:80',
            'email' => 'required|string|exists:students|unique:users',
            'password' => [
                'required',
                'confirmed',
                'string',
                Password::min(6)
                    ->letters()->mixedCase()->numbers()->max(20)
            ],
        ]);
        $user = new User;
        $user->fill($request->except('password'));
        $user->password = Hash::make($request->password);
        $user->save();
        // print("<pre>");
        // print_r($user->toArray());
        // print("</pre>");
        return redirect('login')->with('message', 'Utilisateur cree avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function profil(User $user)
    {
        // $user = User::where('id', Auth::id())->first();

        $student = Student::where('email', $user->email)->first();
        return view('student.show', ['student' => $student]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // print("<pre>");
        // print_r($user->toArray());
        // print("</pre>");
        // die;
        // $user = User::where('id', $request->id)->first();
        $student = Student::where('email', $user->email)->first();
        return view('student.show', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
