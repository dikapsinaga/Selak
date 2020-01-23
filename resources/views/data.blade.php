<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family:arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body>
    <p style="text-align:right">{{date('Y-m-d H:i:s')}}</p>

    <h1 style="text-align:center">
    SELAK
    </h1>

    <h2 style="margin-bottom:0">Admin Profile</h2>
    <span>For validation and verification only.</span>
    <hr>
    <p>{{Auth::user()->name}}</p>
    <p>{{Auth::user()->no_identitas}}</p>
    <p>{{Auth::user()->email}}</p>

    <h2 style="margin-bottom:0">Data</h2>
    <span>Details about booklist, lapak and user.</span>
    <hr>
    <table>
        <tr>
            <th>Invoice #</th>
            <th>Nama</th>
            <th>No. Identitas</th>
            <th>Kode Lapak</th>
            <th>Jenis</th>
            <th>Ukuran</th>
            <th>Harga</th>
            <th>Description</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->no_identitas}}</td>
            <td>{{$item->kodeLapak}}</td>
            <td>{{$item->jenisLapak}}</td>
            <td>{{$item->ukuranLapak}}</td>
            <td>{{$item->harga}}</td>
            <td>{{$item->detail}}</td>
        </tr>
        @endforeach
    </table>


</body>
</html>
