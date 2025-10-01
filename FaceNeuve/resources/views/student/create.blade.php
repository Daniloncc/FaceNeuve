@extends('layouts.app')
@section('title', 'Bienvenue')
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
                        <input class="form-control" id="name" name="name" type="text" placeholder="Ton nom *" value="{{ old('name') }}" />
                        @if($errors->has('name'))
                        <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
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
                        <label for="phone">Téléphone:</label>
                        <input class="form-control" id="phone" type="tel" name="phone" placeholder="Format: XXXXXXXXXX" value="{{ old('phone') }}" />
                        @if($errors->has('phone'))
                        <div class="text-danger mt-2">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="address">Adresse:</label>
                        <input class="form-control" id="address" type="text" name="address" placeholder="Ton Adresse *" value="{{ old('address') }}" />
                        @if($errors->has('address'))
                        <div class="text-danger mt-2">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="birthday">Date de naissance:</label>
                        <input class="form-control" id="birthday" type="date" name="birthday" placeholder="Ton anniversaire *" value="{{ old('birthday') }}" />
                        @if($errors->has('birthday'))
                        <div class=" text-danger mt-2">{{ $errors->first('birthday') }}
                        </div>
                        @endif
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
                        @if($errors->has('city_id'))
                        <div class="text-danger mt-2">{{ $errors->first('city_id') }}</div>
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