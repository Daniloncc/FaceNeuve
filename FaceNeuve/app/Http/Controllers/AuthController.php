<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)):
            return redirect(route('login'))->with('error_password', true)
                ->withErrors(trans('auth.failed'))
                ->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($request->email !== "marcos@gmail.com") {
            Auth::login($user);
            $student = Student::where('email', $user->email)->first();
            return view('student.show', ['student' => $student]);
        }
        // print("<pre>");
        // print_r($user->toArray());
        // print("</pre>");
        // die;
        Auth::login($user);
        return redirect()->intended(route('user.index'))->with('message', true);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
