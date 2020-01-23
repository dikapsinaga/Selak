<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Lapak;
use App\User;
use App\Booklist;
use App\Notifications\ConfirmationLapak;
use PDF;
use App;


class InformasiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function showLapak()
    {
        $lapak = Lapak::all();
        return view('lapak', ['item' => $lapak]);
    }
    public function detailLapak($id)
    {

        $lapak = Lapak::find($id);

        if($lapak->status == 1){
            return view('book', ['lapak' => $lapak, 'status' =>"success"] );
        }
        else{
            return redirect('lapak')->with('status', 'Lapak not available.');
        }

    }

    public function bookLapak(Request $request)
    {
        $booklist = new Booklist;
        $booklist->id_user = Auth::user()->id;
        $booklist->id_lapak = $request->id_lapak;
        $booklist->detail = $request->description;
        $booklist->save();

        $lapak = Lapak::find($booklist->id_lapak);
        $lapak->status = '0';
        $lapak->save();

        Auth::user()->notify(new ConfirmationLapak($booklist->id));
        // \Notification::send(Auth::user(), new ConfirmationLapak($booklist->id));

        return redirect('/home');

    }

    public function showInvoice()
    {
        $booklist = Booklist::with(['User', 'Lapak'])->where('id_user', Auth::user()->id)->first();

        if($booklist)
        {
            return view('invoice', ['booklist' => $booklist]);
        }
        else
        {
            return redirect('home')->with('status', 'You dont have invoice');
        }

    }

    public function downloadInvoice()
    {
        $booklist = Booklist::with(['User', 'Lapak'])->where('id_user', Auth::user()->id)->first();

        $pdf = PDF::loadView('temp', ['booklist'=>$booklist]);

        return $pdf->download('in.pdf');
    }

    public function downloadData()
    {
        $data = Booklist::join('Users as u', 'u.id', '=', 'Booklist.id_user')
                        ->join('Lapak as l', 'l.id', '=', 'Booklist.id_lapak')
                        ->select('Booklist.id', 'u.name', 'u.no_identitas', 'l.kodeLapak', 'l.jenisLapak', 'l.ukuranLapak', 'l.harga', 'Booklist.detail')
                        ->orderBy('l.kodeLapak', 'asc')->get();

        $pdf = PDF::loadView('data', ['data'=>$data]);

        return $pdf->download('RekapData.pdf');
    }

    public function confirmation($id)
    {
        $booklist = Booklist::with(['User', 'Lapak'])->where('id_user', Auth::user()->id)->first();
        if($booklist['id'] == $id){
            $temp = Booklist::find($id);
            $temp->delete();

            $lapak = Lapak::find($booklist['id_lapak']);
            $lapak->status = '1';
            $lapak->save();

            return redirect('home')->with('status', 'You dont have invoice');
        }
        else{
            return redirect('home');
        }
    }
}
