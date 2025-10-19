@extends('layouts.app')
@section('title', trans('lang.text_header_students'))
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div>
            <h2 class="section-heading text-uppercase">@lang('lang.title_students')</h2>
            <h3 class="section-subheading text-muted">@lang('lang.subtitle_students')</h3>
        </div>

        <table class="container table table-striped mt-5">
            <thead>
                <tr class="navbar-brand fs-3">
                    <th scope="col">@lang('lang.firstname_label')</th>
                    <th scope="col">@lang('lang.address_label')</th>
                    <th scope="col">@lang('lang.city_label')</th>
                    <th scope="col">@lang('lang.see_more')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{$student->firstname}}</th>
                    <td>{{$student->email}}</td>
                    <td>{{$student->city->city}}</td>
                    <td><a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye px-2"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 mr-auto">{{$students}}</div>
    </div>

</section>

@endsection('content')