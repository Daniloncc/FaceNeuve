@extends('layouts.app')
@section('title', trans('lang.text_header_welcome'))
@section('content')
<!-- Mashead header-->
<header class="masthead">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <!-- Texte d'accueil -->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-1 lh-1 mb-3">@lang('lang.header_title')</h1>
                    <p class="lead fw-normal text-muted mb-5">
                        @lang('lang.header_paragraph')
                    </p>
                    <div class="d-flex flex-column flex-lg-row align-items-center">
                        <a class="btn btn-primary btn-lg me-lg-3 mb-4 mb-lg-0" href="{{ route('user.create') }}">@lang('lang.header_btn_register')</a>
                        <a class="btn btn-outline-dark btn-lg" href="{{ route('login') }}">@lang('lang.header_btn_login')</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Masthead device mockup feature-->
                <div class="masthead-device-mockup">
                    <div class="device-wrapper">
                        <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                            <div class="screen bg-black">
                                <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                    <!-- reference video -->
                                    <!-- https://www.pexels.com/pt-br/video/garoto-menino-rapaz-garotas-7971022/ -->
                                    <source src="assets/img/video/eleves.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Quote/testimonial aside-->
<aside class="text-center bg-gradient-primary-to-dark">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xl-8">
                <div class="h2 fs-1 text-white mb-4">
                    @lang('lang.aside_quote')
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- App features section-->
<section id="features" class="features">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-8 mb-5 mb-lg-0 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="section-heading text-uppercase">@lang('lang.section_students_title')</h2>
                    <h3 class="section-subheading text-primary">@lang('lang.section_students_subtitle')</h3>
                </div>
                <div class="container-fluid px-5">

                    <div class="row gx-5">
                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" height="150px" width="150px" alt="..." />
                                <!-- <i class="bi-chat-dots icon-feature text-gradient d-block mb-3"></i> -->
                                <h3 class="font-alt">@lang('lang.testimonial_1_name')</h3>
                                <p class="text-muted mb-0">@lang('lang.testimonial_1_text')</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" height="150px" width="150px" alt="..." />
                                <!-- <i class="bi-person-circle icon-feature text-gradient d-block mb-3"></i> -->
                                <h3 class="font-alt">@lang('lang.testimonial_2_name')</h3>
                                <p class="text-muted mb-0">@lang('lang.testimonial_2_text')</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <img class="mx-auto rounded-circle" src="assets/img/team/danilo.jpg" height="150px" width="150px" alt="..." />
                                <!-- <i class="bi-lightbulb icon-feature text-gradient d-block mb-3"></i> -->
                                <h3 class="font-alt">@lang('lang.testimonial_3_name')</h3>
                                <p class="text-muted mb-0">@lang('lang.testimonial_3_text')</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" height="150px" width="150px" alt="..." />
                                <!-- <i class="bi-emoji-smile icon-feature text-gradient d-block mb-3"></i> -->
                                <h3 class="font-alt">@lang('lang.testimonial_4_name')</h3>
                                <p class="text-muted mb-0">@lang('lang.testimonial_4_text')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mx-auto text-center mt-5">
                    <p class="large text-muted">
                        @lang('lang.students_paragraph')
                    </p>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 30 1440 220">
        <path d="M0,192L60,181.3C120,171,240,149,360,138.7C480,128,600,128,720,138.7C840,149,960,171,1080,160C1200,149,1320,107,1380,85.3L1440,64" fill="none" stroke="#0099ff" stroke-width="0.5" />
    </svg>
</section>
<!-- Basic features section-->
<section class="border-top-dark">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-5">
                <h2 class="display-4 lh-1 mb-4">@lang('lang.discover_title')</h2>
                <p class="lead fw-normal text-muted mb-5 mb-lg-0">
                    @lang('lang.discover_paragraph')
                </p>
                <a class="btn btn-outline-dark py-3 px-4 rounded-pill mt-5" href="{{ route('login') }}">@lang('lang.discover_btn')</a>
            </div>
            <!-- ">Connexion</a> -->
            <div class="col-sm-8 col-md-6">
                <div class="px-5 px-sm-0">
                    <img class="img-fluid rounded-circle" src="/assets/img/eleves.jpg" alt="Étudiants" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- App badge section-->
<section class="bg-img" id="download">
    <div class="container px-5">
        <h2 class="text-center text-white font-alt mb-4">
            @lang('lang.download_title')</h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
            <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
        </div>
    </div>
</section>

@endsection('content')