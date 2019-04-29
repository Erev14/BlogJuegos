<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 32;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    @if (Route::has('login'))
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
    @endif
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Blog Juegos
            </div>

        </div>
    </div>
</body>

</html>