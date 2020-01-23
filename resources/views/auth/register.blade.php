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
    <div class="ui inverted vertical center aligned segment">
        <div class="ui secondary borderless inverted menu">
            <a class="item" href="{{url('home')}}"><img src="{{ asset('logo.png') }}"></a>
            @guest
            <div class="right menu">
                <a class="item" href="{{url('login')}}">Sign in</a>
                <a class="item" href="{{url('register')}}">Sign up</a>
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
        <div class="ui two column centered grid" style="">
                <div class="column">
                    <div class="ui segment">
                    <h1 class="ui blue center aligned header" >
                        Register
                    </h1>
                    <form class="ui form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" placeholder="Name" required>
                            </div>

                            <div class="field">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="field">
                                <label for="no_identitas">Nomor Identitas</label>
                                <input type="text" name="no_identitas" placeholder="Nomor Identitas/KTP/KTM" required>
                            </div>

                            <div class="field">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="field">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Enter Password Again" required>
                            </div>

                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <label>I agree to the Terms and Conditions</label>
                                </div>
                            </div>

                            <div class="field">
                                <button class="ui fluid blue button" name="submit" type="submit">Sign Up</button>
                            </div>
                        </form>

                        <div class="field">
                            <center>
                                <p><br>Have an account? Log in<a href="{{url('login')}}"> here</a></p>
                            </center>
                        </div>

                    </div>
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
    height: 110vh;
    background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
}
</style>

