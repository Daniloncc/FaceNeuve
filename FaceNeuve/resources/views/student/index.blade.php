@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">Nos élèves</h2>
            <h3 class="section-subheading text-muted">Les étudiants inscrits sur la plateforme :</h3>
        </div>

        @foreach($students as $student)
        <div class="card mb-4 mt-5">
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
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-outline-primary">Éditer</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-modal>
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cet élève ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                    <form action="" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Supprimer" class="btn btn-sm btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>
</section>

@endsection('content')