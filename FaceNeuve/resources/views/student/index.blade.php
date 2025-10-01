@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')

<section class="page-section mt-5" id="contact">
    <div class="container">
        <div class=" mt-5">
            <h2 class="section-heading text-uppercase">Nos élèves</h2>
            <h3 class="section-subheading text-muted">Les étudiants inscrits sur la plateforme :</h3>
        </div>

        @foreach($students as $student)
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">{{$student->name}}, <strong>{{$student->firstname}}</strong></h3>
            </div>
            <div class="card-body">
                <p class="card-text">{{$student->email}}</p>
                <p class="card-text">{{$student->phone}}</p>
                <p class="card-text">{{$student->birthday}}</p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete
                    </button>

                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>

@endsection('content')