@extends('layouts.app')
@section('title', 'Inscription')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Inscription d’un nouvel utilisateur</h2>
            <h3 class="section-subheading text-muted">
                Remplissez le formulaire ci-dessous pour créer une compte et accéder à toutes nos fonctionnalités.
            </h3>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">
                    <div class="form-group">
                        <!-- Prenom input-->
                        <label for="firstname">Prenom :</label>
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Ton Prenom" value="{{ old('firstname') }}" />
                        @if($errors->has('firstname'))
                        <div class="text-danger mt-2">{{ $errors->first('firstname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Nom input-->
                        <label for="firstname">Nom :</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Ton nom " value="{{ old('name') }}" />
                        @if($errors->has('name'))
                        <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="courriel">Nom de l'utilisateur :</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="Ton courriel " value="{{ old('email') }}" />
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Password password input-->
                        <label for="courriel">Mot de passe :</label>
                        <div class="text-primary mt-2">Le mot de passe doit contenir lettres(Majuscule et minuscule) et chiffres</div>
                        <input class="form-control" id="password" type="password" name="password" pattern="^[A-Za-z0-9]{6,20}$" value="{{ old('password') }}" />

                        @if($errors->has('password'))
                        <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Password password input-->
                        <label for="courriel">Confirmer mot de passe :</label>
                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" pattern="^[A-Za-z0-9]{6,20}$" value="{{ old('password') }}" />
                    </div>
                </div>
            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Submettre</button></div>
        </form>
    </div>
</section>

@endsection('content')