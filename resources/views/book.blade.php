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

        <div class="container">
            <div class="ui two column centered grid" style="margin-top: 10px">
                <div class="column">
                    <div class="ui blue segment">
                        <h2 style="text-align: center">Lapak's Detail</h2>
                        <div class="ui success message">
                            <div class="header">
                                <h2>Hi, {{ Auth::user()->name }}</h2>
                            </div>
                            <span>You're almost done.<br>Please describe the lapak.</span>
                        </div>

                        <h4 class="ui horizontal divider header">
                            <i class="bar chart icon"></i>
                            Specifications
                        </h4>

                        <table class="ui  definition compact table">
                            <tbody>
                                <tr>
                                    <td class="three wide column">Kode</td>
                                    <td>{{$lapak->kodeLapak}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>{{$lapak->jenisLapak}}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran</td>
                                    <td>{{$lapak->ukuranLapak}} meter persegi</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>{{$lapak->harga}}</td>
                                </tr>
                            </tbody>
                        </table>


                        <h4 class="ui horizontal divider header">
                                <i class="tag icon"></i>
                                Description
                        </h4>

                        <form class="ui form" action="/lapak/book" method="POST">
                            {{ csrf_field() }}
                            <div class="field">
                                <label>Deskripsikan lapak mu</label>
                                <textarea name ="description" required></textarea>
                            </div>

                            <input type="hidden" name="id_lapak" value="{{ $lapak->id }}">

                            <h4 class="ui horizontal divider header">
                                    <i class="handshake outline icon"></i>
                                    Terms and Conditions
                            </h4>

                            <div class="ui icon message">
                                <i class="inbox icon"></i>
                                <div class="content">
                                    <div class="header">
                                        Beberapa info yang perlu anda perhatikan.
                                    </div>
                                    <ul class="list">
                                            <li>Pembayaran hanya dapat dilakukan pada <b>hari Wisuda </b>berlangsung.</li>
                                            <li>Petugas kami akan memeriksa dan menagih pembayaran anda.</li>
                                            <li>Pastikan anda <b>mencetak</b> dan <b>membawa</b> invoice sebagai bukti yang sah.</li>
                                            <li>Bawalah kartu identitas anda yang terdaftar dalam sistem.</li>
                                            <li>Pihak kami berhak, tanpa pemberitahuan sebelumnya, membatalkan pesanan jika terjadi kecurangan.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="ui checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <label>I agree to the Terms and Conditions</label>
                                    <br>
                            </div>

                            <div class="field">
                                    <button class="ui fluid blue button" name="submit" type="submit">Confirm</button>
                            </div>
                        </form>
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
    height: 180vh;
    background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
}
</style>
