<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @unless (Route::has('login'))
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-menu">
                <div class="navbar-end">
                    @auth
                    <a class="navbar-item is-hoverable" href="{{ url('/home') }}">Home</a>
                    @else
                    <a class="navbar-item is-hoverable" href="{{ route('login') }}">Ingresar</a>

                    @if (Route::has('register'))
                    <a class="navbar-item is-hoverable" href="{{ route('register') }}">Registarse</a>
                    @endif
                    @endauth
                </div>
            </div>

        </nav>
        @else
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/"> {{ config('app.name', 'Laravel') }}</a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">

                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            @guest
                            <a class="button is-dark" href="{{ route('register') }}">
                                <strong>{{ __('Register') }}</strong>
                            </a>
                            @if (Route::has('register'))
                            <a class="button is-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link"> {{ Auth::user()->name }}</a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @endunless

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>