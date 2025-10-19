@extends('layouts.app')
@section('title', trans('lang.text_header_users'))
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">@lang('lang.title_users')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.subtitle_users')</h3>
        </div>

        <table class="container table table-striped mt-5">
            <thead>
                <tr class="navbar-brand fs-3">
                    <th scope="col">@lang('lang.firstname_label')</th>
                    <th scope="col">@lang('lang.email_label')</th>
                    <th scope="col">@lang('lang.see_more')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td>{{$user->email}}</td>
                    <td><a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye px-2"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 mr-auto">{{$users}}</div>
    </div>

</section>

@endsection('content')