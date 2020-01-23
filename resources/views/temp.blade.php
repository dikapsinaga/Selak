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
      /* font-family: lato, sans-serif; */
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
    <p style="text-align:right">Invoice #{{$booklist->id}}</p>
    <p style="text-align:right">{{date('Y-m-d H:i:s')}}</p>

    <h1 style="text-align:center">
        SELAK
    </h1>

    <h2 style="margin-bottom:0">Profile</h2>
        <span>Make sure your identity is correct.</span>
    <hr>

    <p>{{Auth::user()->name}}</p>
    <p>{{Auth::user()->no_identitas}}</p>
    <p>{{Auth::user()->email}}</p>

    <h2 style="margin-bottom:0">Billings</h2>
        <span>Details about your invoice and payment..</span>
    <hr>

    <table>
        <tr>
            <th>Invoice #</th>
            <th>Kode</th>
            <th>Jenis</th>
            <th>Ukuran</th>
            <th>Status</th>
            <th>Harga</th>
        </tr>
        
        <tr>
            <td>{{$booklist->id}}</td>
            <td>{{$booklist->lapak->kodeLapak }}</td>
            <td>{{$booklist->lapak->jenisLapak}}</td>
            <td>{{$booklist->lapak->ukuranLapak}} m2</td>
            <td>Unpaid</td>
            <td>{{$booklist->lapak->harga}}</td>
        </tr>
        
        <tr>
            <th colspan="5" style="align">Total</th>
            <td>{{$booklist->lapak->harga}}</td>
        </tr>
    </table>
    
    <h4 style="margin-bottom:0">Beberapa hal yang perlu diperhatikan.</h4>
    <ul>
        <li>Pembayaran hanya dapat dilakukan pada <b>hari Wisuda </b>berlangsung.</li>
        <li>Petugas kami akan memeriksa dan menagih pembayaran anda.</li>
        <li>Pastikan anda <b>mencetak</b> dan <b>membawa</b> invoice sebagai bukti yang sah.</li>
        <li>Bawalah kartu identitas anda yang terdaftar dalam sistem.</li>
        <li>Pihak kami berhak, tanpa pemberitahuan sebelumnya, membatalkan pesanan jika terjadi kecurangan.</li>
    </ul>
    
    <h2 style="margin-bottom:0">Details</h2>
    <span>Description about lapak..</span>
    <hr>
    <p>{{$booklist->detail}}</p>
</body>
</html>