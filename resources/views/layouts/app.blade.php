<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-sls.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                <!--{{ config('app.name', 'Laravel') }}-->
                    <img src="{{URL::asset('/images/sls-nav.png')}}" alt="nav pics" height="43" width="138">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articles.index') }}">{{ __('Blog') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">{{ __('Events') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pricing') }}">{{ __('Pricing') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/images/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">
                                    {{ Auth::user()->firstname }} {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('manage-users')
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">SLS Dashboard</a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ url('/profile') }}">User Profile</a>
                                        <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('partials.alerts')
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <section id="footer" class="footpad">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Visit our Website</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{ route('homepage') }}"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="{{ route('aboutus.index') }}"><i class="fa fa-angle-double-right"></i>About</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Contact Us</h5>
                    {{--@if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ url('/contact') }}" method="post">
                        {{ csrf_token() }}
                        {{ method_field('path') }}
                        <div class="row">
                            <div class="col">
                                <label class="contact" for="firstname">First name</label>
                                <input type="text" class="form-control" placeholder="First name" id="firstname">
                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                            </div>

                            <div class="col">
                                <label class="contact" for="name">Last name</label>
                                <input type="text" class="form-control" placeholder="Last name" id="name">
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <label class="contact" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col">
                                <label class="contact" for="subject">Subject</label>
                                <input type="text" class="form-control" placeholder="Subject" id="subject">
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="contact" for="message">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message"></textarea>
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            </div>
                        </div>
                        <div class="row py-2">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                    </form>--}}
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Galerie</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Forum</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://www.facebook.com/social.live.sports/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter" target="_blank"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/sociallivesports/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fab fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="mailto:contact@sl-sports.net" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                </hr>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p class="h6">Social Live Sports 2020 Copyright&copy All right Reversed</p>
                </div>
                </hr>
            </div>
        </div>
    </section>
    <!-- ./Footer -->

</body>
</html>
