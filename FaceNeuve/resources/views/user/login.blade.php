@extends('layouts.app')
@section('title', 'Connetez-vous')
@section('content')

<section class="page-section mt-5" id="contact">
    <div class="container">
        <div class="text-center mt-5">
            <h2 class="section-heading text-uppercase">Connectez-vous</h2>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="form-group">
                    <!-- Email address input-->
                    <label for="courriel">Courriel :</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Ton courriel *" value="{{ old('email') }}" />
                    @if($errors->has('email'))
                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group mb-md-0">
                    <!-- Phone number input-->
                    <label for="password">Mot de pass:</label>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Ton mot de passe *" />
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