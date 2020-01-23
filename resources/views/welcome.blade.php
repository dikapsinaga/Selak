<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport" />
    <title>SELAK</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('Semantic-UI-CSS-master/semantic.css') }}">
    <script src="{{ asset('Semantic-UI-CSS-master/semantic.min.js') }}"></script>
</head>

<body>
    <div class="ui inverted vertical center aligned segment">
        <div class="ui secondary borderless inverted menu">
            <a class="item">
                <img src="{{ asset('logo.png') }}">
            </a>
            <div class="right menu">
                @if (Route::has('login'))
                    @auth
                        <a class="item" href="{{ url('home') }}">Home</a>
                    @else
                        <a class="item" href="{{url('login')}}">Sign in</a>
                        <a class="item"href="{{url('register')}}">Sign up</a>
                    @endauth
                @endif
            </div>
        </div>

        <div class="ui container">
            <img class="ui centered medium image" src="{{ asset('logo1.png') }}">
            <div class="ui text container">
                <h1 class="ui inverted header">
                    SewaLapak
                </h1>
                <p>
                    Daftarkan Lapak Anda Disini. Bertujuan untuk mengorganisir semua pelapak menjadi terpusat melalui sistem kami.
                </p>
                {{-- <a href="{{url('home')}}">
                    <div class="ui massive white button">
                        Learn more
                    </div>
                </a> --}}

            </div>
        </div>
    </div>

    <style type="text/css">
        .ui.inverted.menu{
            background-color: transparent;
            box-shadow: none;
            border: none;
            outline: none;
        }

        .ui.inverted.vertical.segment {
            height: 100vh;
            background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
        }
        .ui.inverted.vertical.segment h1.header.item {
            font-size: 2em;
        }
        .ui.inverted.vertical.segment a.item {
            font-size: 1.2em;
        }

        .ui.inverted.vertical.segment .ui.text.container {
            /* top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto; */
        }

        .ui.inverted.vertical.segment .ui.text.container h1.header {
            font-size: 3em;
        }

        .ui.inverted.vertical.segment .ui.text.container p {
            font-size: 1.6em;
            line-height: 1.6;
        }
    </style>
</body>
</html>
