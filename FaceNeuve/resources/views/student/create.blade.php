@extends('layouts.app')
@section('title', trans('lang.text_header_student'))
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('lang.title_form')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.subtitle_form')</h3>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">
                    <div class="form-group">
                        <!-- Prenom input-->
                        <label for="firstname">@lang('lang.firstname_label')</label>
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="{{ trans('lang.firstname_placeholder') }}" value="{{ old('firstname') }}" />
                        @if($errors->has('firstname'))
                        <div class="text-danger mt-2">{{ $errors->first('firstname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Nom input-->
                        <label for="firstname">@lang('lang.lastname_label')</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{ trans('lang.lastname_placeholder') }}" value="{{ old('name') }}" />
                        @if($errors->has('name'))
                        <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="courriel">@lang('lang.email_label')</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="{{ trans('lang.email_placeholder') }}" value="{{ old('email') }}" />
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="phone">@lang('lang.phone_label')</label>
                        <input class="form-control" id="phone" type="tel" name="phone" placeholder="{{ trans('lang.phone_placeholder') }}" value="{{ old('phone') }}" />
                        @if($errors->has('phone'))
                        <div class="text-danger mt-2">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="address">@lang('lang.address_label')</label>
                        <input class="form-control" id="address" type="text" name="address" placeholder="{{ trans('lang.address_placeholder') }}" value="{{ old('address') }}" />
                        @if($errors->has('address'))
                        <div class="text-danger mt-2">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <label for="birthday">@lang('lang.birthday_label')</label>
                        <input class="form-control" id="birthday" type="date" name="birthday" value="{{ old('birthday') }}" />
                        @if($errors->has('birthday'))
                        <div class=" text-danger mt-2">{{ $errors->first('birthday') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group mb-md-0">
                        <label for="city_id">@lang('lang.city_label')</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="">@lang('lang.city_placeholder')</option>
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
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">@lang('lang.form_button')</button></div>
        </form>
    </div>
</section>

@endsection('content')