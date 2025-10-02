@extends('layouts.app')
@section('title', 'Etudiants')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">Nos élèves</h2>
            <h3 class="section-subheading text-muted">Les étudiants inscrits sur la plateforme :</h3>
        </div>

        <table class="container table table-striped mt-5">
            <thead>
                <tr class="navbar-brand fs-3">
                    <th scope="col">Nom</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Voir Plus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{$student->firstname}}</th>
                    <td>{{$student->email}}</td>
                    <td>{{$student->city->city}}</td>
                    <td><a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye px-2"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 mr-auto">{{$students}}</div>
    </div>

</section>

@endsection('content')