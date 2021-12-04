<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="print.css" type="text/css" media="print" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"  style="margin-bottom: 10px;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Accueil') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @can('manage-users')
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                         Gestion des utilisateurs
                                    </a>
                                    @endcan
                                    @can('gestion-administration')
                                    <a class="dropdown-item" href="{{ action('ServivceController@administration') }}">
                                        Administration
                                    </a>
                                    <a class="dropdown-item" href="{{ action('UserSystemInfoController@index') }}">
                                        Sessions
                                    </a>
                                    @endcan
                                    @can('gestion-secretariat')
                                        <a class="dropdown-item" href="{{ action('ServivceController@secretariat') }}">
                                            Sécretariat
                                        </a>
                                    @endcan
                                    @can('gestion-admingeneral')
                                        <a class="dropdown-item" href="{{ action('ServivceController@admingeneral') }}">
                                            Administration Générale
                                        </a>
                                    @endcan
                                    @can('gestion-finance')
                                        <a class="dropdown-item" href="{{ action('ServivceController@finance') }}">
                                           Gestion Finance
                                        </a>
                                    @endcan
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


        <main class="py-12">
            <div class="container">
                @include('partials.alerts')
                @yield('content')
            </div>
        </main>
        <div>

        </div>
    </div>
</body>
</html>
@include('partials.script')
@include('partials.script1')
@include('partials.script3')
@include('partials.script5')
@include('partials.script4')
@include('partials.script6')
@include('partials.script7')
@include('partials.script8')



<script>
    function myFunction() {
        window.print();
    }
</script>
