@extends('layouts.app')
@section('title', 'Nouveau eleve')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Faites votre inscription</h2>
            <h3 class="section-subheading text-muted">Fournissez vos données pour créer votre compte :</h3>

        </div>
        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">

                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="courriel">Courriel :</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="Ton courriel *" value="{{ old('email') }}" />
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="password">Mot de pass :</label>
                        <input class="form-control" id="password" type="password" name="password" placeholder="Ton courriel *" value="{{ old('password') }}" />
                        @if($errors->has('password'))
                        <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                </div>

            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Submettre</button></div>
        </form>
    </div>
</section>

@endsection('content')