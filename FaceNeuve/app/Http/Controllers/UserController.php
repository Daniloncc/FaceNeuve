<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::select()->orderby('firstname')->get();
        // print("<pre>");
        // print_r($users->toArray());
        // print("</pre>");
        return view('user.index', ['users' => $users]);
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

        return view('user.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->all());
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
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/|max:150',
            'city_id' => 'required|integer',
        ]);
        //

        $user = User::create([
            'firstname' => $request->firstname,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'password' => $request->password,
            'city_id' => $request->city_id,
        ]);

        $users = User::select()->get();
        // $_SESSION['Success] = 'Task created Successfull'
        //return view('user.login');
        return redirect()->route('user.index')->with('message', 'Utilisateur cree avec sucess !');
        //return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
