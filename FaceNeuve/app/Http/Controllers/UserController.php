<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

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
        print_r($request->all());
        $request->validate([
            'firstname' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:30',
            'name' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:80',
            'email' => 'required|string',
            'phone' => 'required|regex:/^[0-9]+$/',
            'address' => 'required|string|max:150',
            'birthday' => 'required|string|date',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/|max:150',
            'city_id' => 'required|integer',
        ]);
        //
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
