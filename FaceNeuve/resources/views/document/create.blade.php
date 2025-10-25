@extends('layouts.app')
@section('title', trans('lang.text_header_document_create'))
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('lang.titre_labe_document')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.forum_soustitre_document')</h3>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">@lang('lang.share_document_title')</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title_fr" class="form-label">@lang('lang.title_label_fr') *</label>
                                    <input type="text"
                                        class="form-control"
                                        id="title_fr"
                                        name="title_fr"
                                        placeholder="{{ trans('lang.title_placeholder') }}"
                                        value="{{ old('title_fr') }}"
                                        required>
                                    @error('title_fr')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="title_en" class="form-label">@lang('lang.title_label_en')</label>
                                    <input type="text"
                                        class="form-control"
                                        id="title_en"
                                        name="title_en"
                                        placeholder="{{ trans('lang.title_placeholder') }}"
                                        value="{{ old('title_en') }}">
                                    @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">@lang('lang.file_label') *</label>
                                    <input type="file"
                                        class="form-control"
                                        id="file"
                                        name="file"
                                        accept=".pdf,.zip,.doc,.docx"
                                        required>
                                    <small class="text-muted">@lang('lang.file_help')</small>
                                    @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button-->
                                <div class="text-center mt-4"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">@lang('lang.button_share')</button></div>

                            </form>

                        </div>

                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary mt-5 p-2">← @lang('lang.button_back')</a>
                </div>
            </div>
        </div>
</section>
@endsection('content')