<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Selak') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('Semantic-UI-CSS-master/semantic.min.css') }}">
    <script src="{{ asset('Semantic-UI-CSS-master/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Semantic-UI-CSS-master/semantic.min.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="ui inverted vertical center aligned segment">
        <div class="ui secondary borderless inverted menu">
            <a class="item" href="{{url('home')}}"><img src="{{ asset('logo.png') }}"></a>
            @guest
            <div class="right menu">
                <a class="item" href="{{url('login')}}">Sign in</a>
                <a class="item"href="{{url('register')}}">Sign up</a>
            </div>

            @else
            {{-- <a class="item" href="{{url('lapak')}}">Book</a> --}}
            {{-- <a class="item" href="{{url('invoice')}}">Invoice</a> --}}
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

        <div class="container">
            <div class="ui two column centered grid" style="margin-top: 50px">
                <div class="column">
                    <center>
                        <h2 class="ui center aligned icon header" style="color:white">
                            <i class="circular users icon"></i>
                            Admin Dashboard
                        </h2>

                        <h3>Hi, {{Auth::user()->name}}...</h3>

                        <p>Semua database booklist, lapak, dan user akan masuk kedalam file yang akan didownload. File ini digunakan untuk validasi di hari H. Panitia bisa memvalidasi ulang melalui data dibawah ini.</p>


                        <form class="ui form" action="/adminhome/data" method="GET">
                            <div class="ui right icon input">
                                <i class="download icon"></i>
                                <input class="ui teal button" type="submit" value="Download Data">
                            </div>
                        </form>

                    </center>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
$(function(){
    $('.ui.dropdown').dropdown();
});
$('.ui.basic.modal').modal('show');

</script>

<style type="text/css">
.ui.inverted.vertical.segment {
    height: 100vh;
    background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
}
</style>









{{--
    <div class="ui green message">
        @if (session('status'))
            <div class="ui green message">
                {{ session('status') }}
            </div>
        @endif

        <div class="ui green message">
            <p>Youre Log in as admin</p>
        </div>
        You are logged in!
    </div> --}}


