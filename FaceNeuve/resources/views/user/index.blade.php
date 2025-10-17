@extends('layouts.app')
@section('title', 'Utilisateurs')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">Nos utilisateurs</h2>
            <h3 class="section-subheading text-muted">Les utilisateurs inscrits sur la plateforme :</h3>
        </div>

        <table class="container table table-striped mt-5">
            <thead>
                <tr class="navbar-brand fs-3">
                    <th scope="col">Nom</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">Voir Plus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td>{{$user->email}}</td>
                    <td><a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye px-2"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 mr-auto">{{$users}}</div>
    </div>

</section>

@endsection('content')