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
            <div class="ui two column centered grid" style="margin-top: 50px">
                <div class="column">
                    <div class="ui segment">
                        <h4 class="ui right aligned header">
                                Invoice #{{$booklist->id}}
                            <div class="sub header">{{date('Y-m-d H:i:s')}}</div>
                        </h4>
                        <h1 class="ui centered header">SELAK</h1>

                        <h2 class="ui dividing header">
                            Profile
                            <div class="sub header">Make sure your identity is correct.</div>
                        </h2>
                        <div class="ui big list">
                            <div class="item">
                                <i class="users icon"></i>
                                <div class="content">
                                    {{Auth::user()->name}}
                                </div>
                            </div>
                            <div class="item">
                                <i class="address card icon"></i>
                                <div class="content">
                                    {{Auth::user()->no_identitas}}
                                </div>
                            </div>
                            <div class="item">
                                <i class="mail icon"></i>
                                <div class="content">
                                    {{Auth::user()->email}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <h2 class="ui dividing header">
                            Billings
                            <div class="sub header">Details about your invoice and payment.</div>
                        </h2>
                        <table class="ui table">
                            <thead>
                                <tr>
                                    <th class="two wide">Invoice #</th>
                                    <th class="two wide">Kode</th>
                                    <th class="three wide">Jenis</th>
                                    <th class="two wide">Ukuran</th>
                                    <th class="three wide">Status</th>
                                    <th class="four wide">Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                    <tr>
                                        <td>{{$booklist->id}}</td>
                                        <td>{{$booklist->lapak->kodeLapak }}</td>
                                        <td>{{$booklist->lapak->jenisLapak}}</td>
                                        <td>{{$booklist->lapak->ukuranLapak}} m2</td>
                                        <td class="negative"><i class="attention icon"></i>Unpaid</td>
                                        <td>
                                            <div class="ui tag labels">
                                                <a class="ui label">
                                                    Rp. {{$booklist->lapak->harga}}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th class="center aligned" colspan="5">Jumlah</th>
                                    <th>
                                        <div class="ui tag labels">
                                            <a class="ui label">
                                                Rp. {{$booklist->lapak->harga}}
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="ui positive message">
                            <div class="header">
                                Beberapa hal yang perlu diperhatikan.
                            </div>
                            <ul class="list">
                                    <li>Pembayaran hanya dapat dilakukan pada <b>hari Wisuda </b>berlangsung.</li>
                                    <li>Petugas kami akan memeriksa dan menagih pembayaran anda.</li>
                                    <li>Pastikan anda <b>mencetak</b> dan <b>membawa</b> invoice sebagai bukti yang sah.</li>
                                    <li>Bawalah kartu identitas anda yang terdaftar dalam sistem.</li>
                                    <li>Pihak kami berhak, tanpa pemberitahuan sebelumnya, membatalkan pesanan jika terjadi kecurangan.</li>
                                    </ul>
                        </div>

                        <br>
                        <h2 class="ui dividing header">
                            Details
                            <div class="sub header">Description about lapak.</div>
                        </h2>
                        <p>{{$booklist->detail}}</p>
                        <br>
                        <form class="ui form" action="/invoice/download" method="GET">
                            <div class="ui right icon input">
                                <i class="download icon"></i>
                                <input class="ui fluid blue button" type="submit" value="Download Pdf">
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
    height: 190vh;
    background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
}
</style>
