@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')

<section class="page-section mt-5" id="contact">
    <div class="container">
        <div class=" mt-5">
            <h2 class="section-heading text-uppercase">Nos élèves</h2>
            <h3 class="section-subheading text-muted">Les étudiants inscrits sur la plateforme :</h3>
        </div>

        @foreach($users as $user)
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">{{$user->name}}, <strong>{{$user->firstname}}</strong></h3>
            </div>
            <div class="card-body">
                <p class="card-text">{{$user->email}}</p>
                <p class="card-text">{{$user->phone}}</p>
                <p class="card-text">{{$user->birthday}}</p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end gap-3">
                    <a href="" class="btn btn-sm btn-outline-primary">Edit</a>
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