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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::select()->orderby('date', 'DESC')->paginate(5);
        return view('forum.index', ['forums' => $forums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print("<pre>");
        // print_r($request->toArray());
        // print("</pre>");
        // die;
        $request->validate([
            'title_fr' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:100',
            'description_fr' => 'max:1000',
            'title_en' => 'required|regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/|max:100',
            'description_en' => 'max:1000',
        ]);

        $forum_title = array_filter([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
        ]);

        $forum_description = array_filter([
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en
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

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
