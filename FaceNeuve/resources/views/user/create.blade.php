@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')

<section class="page-section mt-5" id="contact">
    <div class="container">
        <div class="text-center mt-5">
            <h2 class="section-heading text-uppercase">Faites votre inscription</h2>
            <h3 class="section-subheading text-muted">Fournissez vos données pour créer votre compte :</h3>

        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="mt-5">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">
                    <div class="form-group">
                        <!-- Prenom input-->
                        <label for="firstname">Prenom :</label>
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Ton Prenom" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- Nom input-->
                        <label for="firstname">Nom :</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Ton nom" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="courriel">Courriel :</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="Ton courriel *" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="phone">Téléphone:</label>
                        <input class="form-control" id="phone" type="tel" name="phone" placeholder="Ton téléphone *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="address">Adresse:</label>
                        <input class="form-control" id="address" type="text" name="adress" placeholder="Ton Adresse *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="birthday">Date de naissance:</label>
                        <input class="form-control" id="birthday" type="text" name="birthday" placeholder="Ton anniversaire *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="city">Ville:</label>
                        <input class="form-control" id="city" type="text" name="city" placeholder="Ton anniversaire *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>

                    <div class="form-group mb-md-0">
                        <lablel for="city_id">Ville :</lablel>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="">Choisissez la ville</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                                @if(old('city_id')==$city->id || (isset($user) && $user->city_id == $city->id)) selected @endif>
                                {{ $city->city }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="password">Mot de pass:</label>
                        <input class="form-control" id="password" type="password" name="password" placeholder="Ton mot de passe *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                </div>

            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Submettre</button></div>
        </form>
    </div>
</section>

@endsection('content')