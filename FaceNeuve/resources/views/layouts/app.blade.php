<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/scripts.js') }}" defer></script>
</head>

<body id="page-top" class="d-flex flex-column min-vh-100">
    @php $locale = session()->get('locale') @endphp
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand" href="/"><img width="80px" height="80px" src="{{ asset('/assets/img/logo_faceneuve.png') }}" alt="Logo FaceNeuve"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                @lang('lang.menu')
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <!-- Connection Admin -->
                    @auth
                    @if(auth()->id() == 9)
                    <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('student.create') }}">@lang('lang.add_student')</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('student.index') }}">@lang('lang.students')</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('user.index') }}">@lang('lang.users')</a></li>
                    @endif
                    @endauth
                    <!-- Connection Etudiant -->
                    @auth
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('lang.menu_profile')
                        </a>
                        <ul class="dropdown-menu">
                            @if(auth()->id() !== 9)
                            <li><a class="dropdown-item" href="{{ route('user.profil', auth()->id()) }}">@lang('lang.menu_view_profile')</a></li>
                            @endif
                            <li><a class="dropdown-item" href="#">@lang('lang.menu_settings')</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">@lang('lang.menu_notifications')</a></li>
                            <li><a class="dropdown-item" href="#">@lang('lang.menu_privacy')</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="nav-link me-lg-3" href="{{ route('logout') }}">@lang('lang.logout')</a>
                            </li>
                        </ul>
                    </div>
                    @endauth
                    <!-- General -->
                    @guest
                    <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('user.create') }}">@lang('lang.signup')</a></li>
                    @endguest
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Forum
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('forum.index') }}">Messages</a></li>
                            @auth
                            @if(auth()->id() !== 9)
                            <li><a class="dropdown-item" href="{{ route('forum.create') }}">Ajouter message</a></li>
                            @endif
                            @endauth
                            <hr>
                            <li><a class="dropdown-item" href="{{ route('documents.index') }}">Materiel</a></li>
                            @auth
                            @if(auth()->id() !== 9)
                            <li><a class="dropdown-item" href="{{ route('documents.create') }}">Ajouter materiel</a></li>
                            @endif
                            @endauth
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('lang.language') <span class="text-primary"> {{ $locale == '' ? '(fr)' : "($locale)" }}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="{{ route('lang', 'fr') }}">@lang('lang.french')</a></li>
                            <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">@lang('lang.english')</a></li>
                        </ul>
                    </div>
                </ul>
                @guest
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                    <span class="d-flex align-items-center">
                        <i class="bi-chat-text-fill me-2"></i>
                        <a class="nav-link me-lg-3" href="{{ route('login') }}">@lang('lang.login')</a>
                    </span>
                </button>
                @endguest

            </div>
        </div>
    </nav>

    @if(session('message'))
    <div class="container col-lg-6 col-md-6 col-sm-8 bg-success mt-5 rounded d-flex justify-content-center align-items-center">
        <p class="text-white my-2">{{session('message')}}</p>
    </div>
    @endif
    <!-- Content -->
    @yield('content')

    <!-- Footer-->
    <footer class="bg-black text-center py-3 mt-auto">
        <div class="container px-5">
            <div class="col-lg-4 my-lg-0 mx-auto">
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Courriel"><i class="fa-solid fa-envelope"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="text-white-50 small mt-2">
                <div class="mb-2">&copy; Danilo Costa {{ date('Y') }}. @lang('lang.rights')</div>
                <a href="#!">@lang('lang.privacy')</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">@lang('lang.terms')</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">@lang('lang.faq')</a>
            </div>
        </div>
    </footer>


</body>

</html>