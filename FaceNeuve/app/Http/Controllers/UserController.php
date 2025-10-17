<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'email' => 'required|string|unique:users',
            'password' => [
                'required',
                'confirmed',
                'string',
                Password::min(6)
                    ->letters()->mixedCase()->numbers()->max(20)
            ],
        ]);
        // print("<pre>");
        // print_r($request->password);
        // print("</pre>");
        $user = new User;
        $user->fill($request->except('password')); // Remplir SAUF password
        $user->password = Hash::make($request->password); // Puis assigner le password hashé
        $user->save();
        // print("<pre>");
        // print_r($user->toArray());
        // print("</pre>");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
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
