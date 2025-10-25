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

        <div class="grid grid-cols-4 gap-2">
            @foreach($forums as $forum)
            <div class="card mb-2 mt-3">
                <div class="card-header text-bg-light">
                    <h3 class="card-title mt-1 mb-1">
                        <strong>{{ $forum->title[$locale] ?? $forum->title['fr'] ?? 'N/A' }}</strong>
                    </h3>
                    <small>{{$forum->date}}</small>
                    <small>| {{$forum->student->email}}</small>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <strong>{{ $forum->description[$locale] ?? $forum->description['fr'] ?? '' }}</strong>
                    </p>
                </div>

                @auth
                @if($forum->student->email === auth()->user()->email)
                <div class="card-footer text-bg-light">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('forum.edit', $forum->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-pen"></i> @lang('lang.button_edit')
                        </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-modal>
                            <i class="bi bi-trash"></i> @lang('lang.button_delete')
                        </button>
                    </div>
                </div>
                @endif
                @endauth
            </div>
            @endforeach
        </div>
        <div class="mt-5 mr-auto">{{$forums->links()}}</div>
    </div>

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
                    <form action="{{ route('forum.destroy') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{ $forum->id }}">
                        <input type="submit" value="{{ trans('lang.button_delete')}}" class="btn btn-sm btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection