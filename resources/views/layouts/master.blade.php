<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Selak') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('Semantic-UI-CSS-master/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mapify.css') }}">
    <script src="{{ asset('Semantic-UI-CSS-master/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Semantic-UI-CSS-master/semantic.min.js') }}"></script>
    <script src="{{ asset('js/jquery.maphilight.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mapify.js') }}"></script>

    <title>@yield('title')</title>
</head>
<body>
    <div class="ui secondary borderless menu">
        <a class="item" href="{{url('home')}}"><img src="{{ asset('logo.png') }}"></a>

        @guest
        <div class="right menu">
            <a class="item" href="{{url('login')}}">Sign in</a>
            <a class="item"href="{{url('register')}}">Sign up</a>
        </div>

        @else
        <a class="item" href="{{url('lapak')}}">Book</a>
        <a class="item" href="{{url('invoice')}}">Invoice</a>
        <div class="right menu">
            <div class="ui dropdown item">
                <i class="user icon"></i>
                {{ Auth::user()->name }}
                <i class="dropdown icon"></i>

                <div class="menu">
                    <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="close icon"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form>
                </div>
            </div>
        </div>
        @endguest
    </div>
@yield('content')

</body>

</html>
<style type="text/css">
/* .ui.inverted.menu{
    background-color: transparent;
    box-shadow: none;
    border: none;
    outline: none;
} */
</style>
<script>
        $(function(){
        $('.ui.dropdown')
        .dropdown();
    });
</script>
