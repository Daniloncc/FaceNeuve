@extends('layouts.app')
@section('title', 'Eleve ')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">Utilisateur</h2>
        </div>
        <div class="card mb-4 mt-5">
            <div class="card-header text-bg-light">
                <h3 class="card-title mt-1 mb-1">{{$user->name}}</h3>
            </div>
            <div class="card-body">
                <p class="card-text">Courriel: <strong>{{$user->email}}</strong></p>
            </div>
            <div class="card-footer text-bg-light">
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i> Editer</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-modal>
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        </div>

        <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary mt-3 p-2">← Retourner</a>
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
</section>

@endsection('content')