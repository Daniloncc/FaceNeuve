@extends('layouts.app')
@section('title', trans('lang.text_header_login'))
@section('content')

<section class="page-section" id="login">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('lang.title_login')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.subtitle_login')</h3>
        </div>

        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">

                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="courriel">@lang('lang.email_label')</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="{{ trans('lang.email_placeholder') }}" value="{{ old('email') }}" />
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- Email address input-->
                        <label for="password">@lang('lang.password_label')</label>
                        <input class="form-control" id="password" type="password" name="password" value="{{ old('password') }}" />
                        @if($errors->has('password'))
                        <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                        @if(session('error_password'))
                        <div class="text-danger mt-2">@lang('lang.error_password')</div>
                        @endif
                    </div>

                </div>

            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">@lang('lang.button_login')</button></div>
        </form>
    </div>
</section>

@endsection('content')