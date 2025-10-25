@extends('layouts.app')
@section('title', trans('lang.text_header_forums'))
@section('content')

@php
$locale = session()->get('locale', config('app.locale', 'fr'));
@endphp
<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">@lang('lang.title_forums')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.subtitle_forums')</h3>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>@lang('lang.document_directory_title')</h4>
                        </div>

                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                            @endif

                            @if($documents->isEmpty())
                            <p class="text-center">@lang('lang.no_documents_available')</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>@lang('lang.table_title')</th>
                                            <th>@lang('lang.table_shared_by')</th>
                                            <th>@lang('lang.table_date')</th>
                                            <th>@lang('lang.table_actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $document)
                                        <tr>
                                            <td>
                                                @if(app()->getLocale() === 'fr')
                                                {{ $document->title['fr'] ?? $document->title['en'] }}
                                                @else
                                                {{ $document->title['en'] ?? $document->title['fr'] }}
                                                @endif
                                            </td>
                                            <td>{{ $document->student->name ?? 'N/A' }}</td>
                                            <td>{{$document->date}}</td>

                                            <td class="">
                                                @if(Auth::user()->email !== $document->student->email)
                                                <a href="{{ route('documents.download', $document->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fas fa-download"></i> @lang('lang.button_download')
                                                </a>
                                                @endif
                                                @if(Auth::user()->email === $document->student->email)
                                                <a href="{{ route('documents.edit', $document->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> @lang('lang.button_edit')
                                                </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-modal>
                                                    <i class="bi bi-trash"></i> @lang('lang.button_delete')
                                                </button>
                                                @endif
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.title_modal')</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @lang('lang.subtitle_modal')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('lang.annuler_modal')</button>
                                                            <form action="{{ route('documents.destroy', $document->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <input type="hidden" name="id" value="{{ $document->id }}">
                                                                <input type="submit" value="{{ trans('lang.button_delete')}}" class="btn btn-sm btn-outline-danger">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 mr-auto">{{$documents}}</div>
    </div>


</section>

@endsection