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

    public function index()
    {
        $userId = Auth::id();
        if ($userId === 9) {
            $users = User::select()
                ->orderby('name')
                ->paginate(5);
            return view('user.index', ["users" => $users]);
        }
        return redirect(route('login'));
    }

    public function create()
    {
        return view('user.create');
    }

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
        return redirect('login')->with('message', 'Utilisateur cree avec success');
    }

    public function show(User $user)
    {
        $userId = Auth::id();
        if ($userId === 9) {
            return view('user.show', ['user' => $user]);
        }
        return redirect(route('login'));
    }

    public function profil(User $user)
    {
        $userId = Auth::id();
        if ($userId === 9) {
            $student = Student::where('email', $user->email)->first();
            return view('student.show', ['student' => $student]);
        }
        return redirect(route('login'));
    }

    public function edit(User $user)
    {
        $userId = Auth::id();
        if ($userId === 9) {
            $student = Student::where('email', $user->email)->first();
            return view('student.show', ['student' => $student]);
        }
        return redirect(route('login'));
    }
}
