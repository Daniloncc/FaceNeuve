@extends('layouts.app')
@section('title', trans('lang.text_header_users_create'))
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('lang.title_users_create')</h2>
            <h3 class="section-subheading text-muted">
                @lang('lang.subtitle_users_create')
            </h3>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">
                    <div class="form-group">
                        <!-- Nom input-->
                        <label for="name">@lang('lang.firstname_label')</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{ trans('lang.firstname_placeholder') }}" value="{{ old('name') }}" />
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
                    <div class="form-group">
                        <!-- Password password input-->
                        <label for="password">@lang('lang.password_label')</label>
                        <div class="text-primary mt-2">@lang('lang.password_text')</div>
                        <input class="form-control" id="password" type="password" name="password" pattern="^[A-Za-z0-9]{6,20}$" value="{{ old('password') }}" />

                        @if($errors->has('password'))
                        <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Password password input-->
                        <label for="password_confirmation">@lang('lang.password_conf_label')</label>
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