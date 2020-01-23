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
        <div class="container" style="margin-top: 20px">
            <center>
                <h1>How to use Selak ?</h1>
                <br>
            </center>
            <center>
                <h2 class="ui icon header" style="color:white">
                    <i class="map marker icon"></i>
                    <div class="content">
                        Pilih lapak
                        <div class="sub header" style="color:white">Pilih lapak yang anda inginka pada menu Book di navigation bar.</div>
                    </div>
                </h2>
            </center>
            <br>
            <center>
                <h2 class="ui icon header" style="color:white">
                    <i class="edit icon"></i>
                    <div class="content">
                        Lengkapi Data
                        <div class="sub header" style="color:white">Deskripsikan detail tentang lapak anda.</div>
                    </div>
                </h2>
            </center>
            <br>
            <center>
                <h2 class="ui icon header" style="color:white">
                    <i class="save icon"></i>
                    <div class="content">
                        Konfirmasi lapak
                        <div class="sub header" style="color:white">Konfirmasi pesanan anda untuk memesan lapak.</div>
                    </div>
                </h2>
            </center>
            <br>
            <center>
                <h2 class="ui icon header" style="color:white">
                    <i class="download icon"></i>
                    <div class="content">
                        Download invoice
                        <div class="sub header" style="color:white">Download invoice sebagai bukti bahwa telah melakukan pemesanan dan invoice dibawa saat hari-H.</div>
                    </div>
                </h2>
            </center>
            <br>
            <center>
                <h2 class="ui icon header" style="color:white">
                    <i class="clipboard check icon"></i>
                    <div class="content">
                        Konfirmasi kehadiran
                        <div class="sub header" style="color:white">
                            Kami akan mengirimkan konfirmasi kehadiran ke alamat email anda.<br>
                            Jika tidak melakukan konfirmasi kehadiran maka tidak dapat menggunakan lapak tersebut.
                        </div>
                    </div>
                </h2>
            </center>
        </div>
    </div>

    @if (session('status'))
    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="thumbs down outline icon"></i>{{ session('status') }}.
        </div>

        <div class="content">
            <p align="center">Hi, {{Auth::user()->name}}...</p>
            <p align="center">You still dont have lapak. Make sure you book lapak to get touch in us. Thankyou :)</p>
        </div>

        <div class="actions">
            <div class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>
    @endif

    @if (session('msg'))
    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="thumbs up outline icon"></i>{{ session('msg') }}.
        </div>

        <div class="content">
            <p align="center">Hi, {{Auth::user()->name}}...</p>
            <p align="center">Thank you for join with us. Enjoy:)</p>
        </div>

        <div class="actions">
            <div class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>
    @endif
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
    height: 160vh;
    background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
}
</style>

