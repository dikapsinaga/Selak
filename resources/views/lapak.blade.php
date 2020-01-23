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

        <h1 class="ui header" style="color:white">Choose Your lapak.</h1>

        <div class="container" align="center">
            <br>
            <img class="map" src="{{ asset('lapak.png') }}" usemap="#image-map">
            <map name="image-map" >
                <area data-status="{{$item[0]->status}}" alt="A1" title="A1" href="/lapak/details/1" coords="-1,248,63,206" shape="rect">
                <area data-status="{{$item[1]->status}}" alt="A2" title="A2" href="/lapak/details/2" coords="66,248,137,207" shape="rect">
                <area data-status="{{$item[2]->status}}" alt="A3" title="A3" href="/lapak/details/3" coords="315,201,324,189,335,181,345,174,351,188,354,202,357,214,347,225,339,235,334,245" shape="poly">
                <area data-status="{{$item[3]->status}}" alt="A4" title="A4" href="/lapak/details/4" coords="359,214,371,207,388,198,383,159,367,165,357,171,348,175" shape="poly">
                <area data-status="{{$item[4]->status}}" alt="A5" title="A5" href="/lapak/details/5" coords="390,197,402,196,419,194,433,196,437,156,421,155,405,157,384,158" shape="poly">
                <area data-status="{{$item[5]->status}}" alt="A6" title="A6" href="/lapak/details/6" coords="433,196,445,201,454,205,461,208,466,212,477,196,481,181,488,175,470,166,455,163,444,159,438,157" shape="poly">
                <area data-status="{{$item[6]->status}}" alt="A7" title="A7" href="/lapak/details/7" coords="498,248,489,235,483,228,474,218,468,214,488,176,495,182,503,189,509,198,518,206" shape="poly">
                <area data-status="{{$item[7]->status}}" alt="A8" title="A8" href="/lapak/details/8" coords="696,248,753,249,753,209,696,209" shape="poly">
                <area data-status="{{$item[8]->status}}" alt="A9" title="A9" href="/lapak/details/9" coords="757,250,816,251,815,210,756,209" shape="poly">
                <area data-status="{{$item[9]->status}}" alt="A10" title="A10" href="/lapak/details/10" coords="1,352,57,352,60,388,1,390" shape="poly">
                <area data-status="{{$item[10]->status}}" alt="A11" title="A11" href="/lapak/details/11" coords="62,355,65,389,135,389,135,354" shape="poly">
                <area data-status="{{$item[11]->status}}" alt="A12" title="A12" href="/lapak/details/12" coords="310,389,338,352,342,357,344,364,350,370,357,380,341,417" shape="poly">
                <area data-status="{{$item[12]->status}}" alt="A13" title="A13" href="/lapak/details/13" coords="359,382,368,388,378,393,393,398,383,435,365,430,343,419" shape="poly">
                <area data-status="{{$item[13]->status}}" alt="A14" title="A14" href="/lapak/details/14" coords="385,434,394,440,405,440,420,440,433,440,427,404,394,401" shape="poly">
                <area data-status="{{$item[14]->status}}" alt="A15" title="A15" href="/lapak/details/15" coords="437,441,456,437,470,431,483,423,467,386,454,398,438,403,430,403" shape="poly">
                <area data-status="{{$item[15]->status}}" alt="A16" title="A16" href="/lapak/details/16" coords="486,423,505,409,517,396,496,357,489,366,480,378,470,388" shape="poly">
                <area data-status="{{$item[16]->status}}" alt="A17" title="A17" href="/lapak/details/17" coords="560,356,621,357,621,392,559,391" shape="poly">
                <area data-status="{{$item[17]->status}}" alt="A18" title="A18" href="/lapak/details/18" coords="626,392,624,355,684,355,686,393" shape="poly">
                <area data-status="{{$item[18]->status}}" alt="A19" title="A19" href="/lapak/details/19" coords="689,393,751,391,751,355,688,355" shape="poly">
                <area data-status="{{$item[19]->status}}" alt="A20" title="A20" href="/lapak/details/20" coords="754,391,815,391,816,355,753,357" shape="poly">
                <area data-status="{{$item[20]->status}}" alt="B1" title="B1" href="/lapak/details/21" coords="140,112,184,112,181,157,140,156" shape="poly">
                <area data-status="{{$item[21]->status}}" alt="B2" title="B2" href="/lapak/details/22" coords="140,157,184,157,181,203,139,205" shape="poly">
                <area data-status="{{$item[22]->status}}" alt="B3" title="B3" href="/lapak/details/23" coords="275,111,314,110,314,156,274,155" shape="poly">
                <area data-status="{{$item[23]->status}}" alt="B4" title="B4" href="/lapak/details/24" coords="274,158,312,157,313,206,275,205" shape="poly">
                <area data-status="{{$item[24]->status}}" alt="B5" title="B5" href="/lapak/details/25" coords="522,113,560,112,560,156,522,156" shape="poly">
                <area data-status="{{$item[25]->status}}" alt="B6" title="B6" href="/lapak/details/26" coords="525,206,522,161,559,161,558,206" shape="poly">
                <area data-status="{{$item[26]->status}}" alt="B7" title="B7" href="/lapak/details/27" coords="646,113,695,114,693,156,645,156" shape="poly">
                <area data-status="{{$item[27]->status}}" alt="B8" title="B8" href="/lapak/details/28" coords="643,157,647,207,694,206,695,159" shape="poly">
                <area data-status="{{$item[28]->status}}" alt="C1" title="C1" href="/lapak/details/29" coords="136,489,181,492,181,537,136,535" shape="poly">
                <area data-status="{{$item[29]->status}}" alt="C2" title="C2" href="/lapak/details/30" coords="135,537,179,539,181,581,136,581" shape="poly">
                <area data-status="{{$item[30]->status}}" alt="C3" title="C3" href="/lapak/details/31" coords="136,584,179,587,179,632,137,630" shape="poly">
                <area data-status="{{$item[31]->status}}" alt="C4" title="C4" href="/lapak/details/32" coords="137,631,180,632,181,676,137,676" shape="poly">
                <area data-status="{{$item[32]->status}}" alt="C5" title="C5" href="/lapak/details/33" coords="135,678,180,678,179,719,137,718" shape="poly">
                <area data-status="{{$item[33]->status}}" alt="C6" title="C6" href="/lapak/details/34" coords="271,492,313,491,310,536,272,536" shape="poly">
                <area data-status="{{$item[34]->status}}" alt="C7" title="C7" href="/lapak/details/35" coords="272,540,312,538,310,582,273,583" shape="poly">
                <area data-status="{{$item[35]->status}}" alt="C8" title="C8" href="/lapak/details/36" coords="274,587,310,588,310,630,273,630" shape="poly">
                <area data-status="{{$item[36]->status}}" alt="C9" title="C9" href="/lapak/details/37" coords="273,633,310,634,309,676,273,676" shape="poly">
                <area data-status="{{$item[37]->status}}" alt="C10" title="C10" href="/lapak/details/38" coords="273,680,312,680,313,719,273,719,272,702" shape="poly">
            </map>
        </div>
    </div>

    @if (session('status'))
    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="thumbs down outline icon"></i>{{ session('status') }}
        </div>

        <div class="content">
            <p align="center">Eitttsss....</p>
            <p align="center">That lapak is not available. Make sure you choose the correct one. Please book another and enjoy :)</p>
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
    height: 150vh;
    background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
}
</style>

<script type="text/javascript">
$(function () {
    var data = {};
    $('.map').maphilight({ stroke: false, fillColor: '00ff00', fillOpacity: 0.5, alwaysOn:false });
    data.alwaysOn = false;
    data.stroke = false;
    data.fillColor = 'ff0000';
    data.fillOpacity = '0.5';
    $('area[data-status="0"]').data('maphilight', data).trigger('alwaysOn.maphilight');
});
</script>

<script>
$('.ui.basic.modal').modal('show');
</script>
