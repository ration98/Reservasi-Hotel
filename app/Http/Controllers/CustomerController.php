<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Tipe;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function __construct()
    {
        return $this->middleware('Customer');
    }

    public function index()
    {
        $tipe = Tipe::all();
        return view('customer.home', compact('tipe'));
    }

    public function boking(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        else {
            $dataType = Tipe::find($request->id_tipe);
            $check_in = Carbon::parse($request->check_in);
            $check_out = Carbon::parse($request->check_out);
            $totalMalam = $check_in->diffInDays($check_out);

            $jumlahPesanan = $request->jumlah;

            $dataKamar = Kamar::where('id_tipe', '=', $request->id_tipe)->where('status', '=', 'v')->get()->take($jumlahPesanan);
            // dd($dataKamar);
            foreach ($dataKamar as $val) {
                $idKamar[] = $val->id;
                $nomorKamar[] = $val->nomor;
                Kamar::find($val->id)->update(['status' => 'r']);
            }
            //  dd($request->idKamar);
            if ($dataKamar != NULL) {
                $idKamar = implode(', ', $dataKamar);
                $nomorKamar = implode(', ', $nomorKamar);
            } else {
                $idKamar = "ERROR!";
            }

            $totalHarga = $dataType->harga * $totalMalam * $jumlahPesanan;


            $transaksi = Transaksi::create([
                'id_user' => Auth::user()->id,
                'id_kamar' => $idKamar,
                'jumlah_pesanan' => $jumlahPesanan,
                'check_in' => $check_in,
                'check_out' => $check_out,
            ]);

            Pembayaran::create([
                'id_user' => Auth::user()->id,
                'id_transaksi' => $transaksi->id,
                'harga' => $totalHarga,
            ]);

            return redirect()->route('customer.pembayaran');
        }
    }

    public function dtPribadiPost(Request $request) {
        $dataType = Tipe::find($request->id_tipe);
        $check_in = Carbon::parse($request->check_in);
        $check_out = Carbon::parse($request->check_out);
        $totalMalam = $check_in->diffInDays($check_out);

        $jumlahPesanan = $request->jumlah;

        $dataKamar = Kamar::where('id_tipe', '=', $request->id_tipe)->where('status', '=', 'v')->get()->take($jumlahPesanan);
        // dd($dataKamar);
        foreach ($dataKamar as $val) {
            $dataKamar[] = $val->id;
            $nomorKamar[] = $val->number;
            Kamar::find($val->id)->update(['status' => 'r']);
        }
        // dd($request->type_id);
        if ($dataKamar != NULL) {
            $idKamar = implode(', ', $dataKamar);
            $nomorKamar = implode(', ', $nomorKamar);
        } else {
            $idKamar = "ERROR!";
        }

        $totalHarga = $dataType->harga * $totalMalam * $jumlahPesanan;
        // dd($dataType->price * $totalMalam * $jumlahPesanan);
        $post = Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'pekerjaan' => $request->pekerjaan,
            'tgl_lahir' => $request->tgl_lahir,
            'id_user' => Auth::user()->id,
        ]);

        $transaction = Transaksi::create([
            'id_user' => Auth::user()->id,
            'id_customer' => $post->id,
            'id_kamar' => $idKamar,
            'jmlh_kmr' => $jumlahPesanan,
            'check_in' => $check_in,
            'check_out' => $check_out,
        ]);

        Pembayaran::create([
            'id_user' => Auth::user()->id,
            'id_transaksi' => $transaction->id,
            'harga' => $totalHarga,
        ]);

        return redirect()->route('customer.pembayaran');
    }

    public function pembayaran()
    {
        $transaction = Transaksi::where('id_user', '=', Auth::user()->id, 'AND')->where('status', '=', 'menunggu pembayaran')->latest('created_at')->first();
        $pembayaran = Pembayaran::where('id_transaksi', '=', $transaction->id)->first();
        $totalHarga = $pembayaran->harga;
        $jumlahPesanan = $transaction->jumlah_pesanan;
        $idKamar = explode(', ', $transaction->idkamar);

        $kamar = Kamar::whereIn('id', $idKamar)->get();
        $dataType = Tipe::where('id', '=', $kamar[0]->id_tipe)->first();
        foreach ($kamar as $val) {
            $nomorKamar[] = $val->nomor;
        }
        $nomorKamar = implode(', ', $nomorKamar);
        // dd($dataType);
        return view('customer.pembayaran', compact('nomorKamar', 'totalHarga', 'jumlahPesanan', 'dataType', 'pembayaran'));
    }

    public function invoice()
    {
        $transaction = Transaksi::where('id_user', '=', Auth::user()->id, 'AND')->where('status', '=', 'menunggu pembayaran')->pluck('id');
        $pembayaran = Pembayaran::whereIn('id_transaksi', $transaction)->get();
        $totalHarga = 0;
        foreach ($pembayaran as $val)
        {
            $totalHarga += $val->harga;
        }

        return view('customer.invoice', compact('totalHarga'));
    }
}
