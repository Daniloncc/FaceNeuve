@extends('layouts.app')
@section('title', 'Editer utilisateur')
@section('content')

<section class="page-section mt-5" id="contact">
    <div class="container">
        <div class="text-center mt-5">
            <h2 class="section-heading text-uppercase">Editer profil utilisateur</h2>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            @method('put')
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">
                    <div class="form-group">
                        <!-- Prenom input-->
                        <label for="name">Nom complet :</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Ton Prenom" value="{{ old('name', $user->name) }}" />
                        @if($errors->has('name'))
                        <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="courriel">Courriel :</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="Ton courriel *" value="{{ old('email', $user->email) }}" />
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Mettre a jour</button></div>
        </form>
    </div>
</section>

@endsection('content')