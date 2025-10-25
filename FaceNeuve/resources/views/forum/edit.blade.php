@extends('layouts.app')
@section('title', trans('lang.text_header_forum_edit'))
@section('content')

@php
$locale = session()->get('locale', config('app.locale', 'fr'));
@endphp

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('lang.titre_label_edit')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.forum_soustitre_edit')</h3>
        </div>
        <form id="contactForm" class="mt-5" method="post">
            @csrf
            <div class="col-md-8 mx-auto d-flex flex-wrap gap-4 justify-content-between">
                <!-- Colonne 1 - Français -->
                <div class="flex-fill d-flex flex-column gap-3">
                    <div class="form-group">
                        <label for="title_fr">Titre (FR) :</label>
                        <input class="form-control" id="title_fr" name="title_fr" type="text"
                            placeholder="{{ trans('lang.titre_placeholder') }}"
                            value="{{ old('title_fr', $forum->title['fr'] ?? '') }}" />

                        @if($errors->has('title_fr'))
                        <div class="text-danger mt-2">{{ $errors->first('title_fr') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description_fr">Description (FR) :</label>
                        <textarea class="form-control" rows="5" id="description_fr" name="description_fr"
                            placeholder="{{ trans('lang.description_placeholder') }}">{{ old('description_fr', $forum->description['fr']) }}</textarea>
                        @if($errors->has('description.fr'))
                        <div class="text-danger mt-2">{{ $errors->first('description_fr') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Colonne 2 - Anglais -->
                <div class="d-flex flex-column gap-3 flex-fill">
                    <div class="form-group">
                        <label for="title_en">Title (EN) :</label>
                        <input class="form-control" id="title_en" name="title_en" type="text"
                            placeholder="{{ trans('lang.titre_placeholder') }}"
                            value="{{ old('title_en', $forum->title['en']) }}" />
                        @if($errors->has('title_en'))
                        <div class="text-danger mt-2">{{ $errors->first('title_en') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description_en">Description (EN) :</label>
                        <textarea class="form-control" rows="5" id="description_en" name="description_en"
                            placeholder="{{ trans('lang.description_placeholder') }}">{{ old('description.en', $forum->description['en']) }}</textarea>
                        @if($errors->has('description.en'))
                        <div class="text-danger mt-2">{{ $errors->first('description.en') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Submit Button-->
            <div class="text-center mt-4"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">@lang('lang.form_button')</button>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary mt-3 p-2">← @lang('lang.button_back')</a>
        </form>

    </div>

</section>

@endsection('content')