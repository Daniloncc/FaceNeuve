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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">@lang('lang.edit_document_title')</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('documents.update', $document->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title_fr" class="form-label">@lang('lang.title_label_fr') *</label>
                                    <input type="text"
                                        class="form-control @error('title_fr') is-invalid @enderror"
                                        id="title_fr"
                                        name="title_fr"
                                        placeholder="{{ trans('lang.title_placeholder') }}"
                                        value="{{ old('title_fr', $document->title['fr'] ?? '') }}"
                                        required>
                                    @error('title_fr')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="title_en" class="form-label">@lang('lang.title_label_en')</label>
                                    <input type="text"
                                        class="form-control @error('title_en') is-invalid @enderror"
                                        id="title_en"
                                        name="title_en"
                                        placeholder="{{ trans('lang.title_placeholder') }}"
                                        value="{{ old('title_en', $document->title['en'] ?? '') }}">
                                    @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">@lang('lang.current_file_label')</label>
                                    <p class="form-control-plaintext">
                                        {{ $document->file_name }}
                                        <span class="badge bg-info">{{ strtoupper($document->file_type) }}</span>
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">@lang('lang.replace_file_label')</label>
                                    <input type="file"
                                        class="form-control @error('file') is-invalid @enderror"
                                        id="file"
                                        name="file"
                                        accept=".pdf,.zip,.doc,.docx">
                                    <small class="text-muted">@lang('lang.keep_current_file_help')</small>
                                    @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">
                                        @lang('lang.button_cancel')
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        @lang('lang.button_update')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection('content')