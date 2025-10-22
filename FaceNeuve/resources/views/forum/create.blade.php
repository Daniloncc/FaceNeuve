@extends('layouts.app')
@section('title', trans('lang.text_header_student'))
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('lang.titre_label')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.forum_soustitre')</h3>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6 mx-auto d-flex flex-column gap-3">
                    <div class="form-group">
                        <!-- Prenom input-->
                        <label for="titre">@lang('lang.titre_label')</label>
                        <input class="form-control" id="titre" name="titre" type="text" placeholder="{{ trans('lang.titre_placeholder') }}" value="{{ old('titre') }}" />
                        @if($errors->has('titre'))
                        <div class="text-danger mt-2">{{ $errors->first('titre') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- Nom input-->
                        <label for="description">@lang('lang.description_label')</label>
                        <textarea class="form-control" id="description" name="description" placeholder="{{ trans('lang.lastname_placeholder') }}" value="{{ old('description') }}"></textarea>
                        @if($errors->has('description'))
                        <div class="text-danger mt-2">{{ $errors->first('description') }}</div>
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