<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tipe;
use App\Models\Transaksi;

class TransactionController extends Controller
{
    public function transactionCancel($id)
    {
        $data = Transaksi::find($id);
        $data->update(['status'=>'canceled']);

        $idKamar = explode(', ',$data->idkmr);
        $dataKamar = Kamar::whereIn('id', $idKamar)->get();
        foreach ($dataKamar as $val) {
            Kamar::find($val->id)->update(['status' => 'v']);
        }

        return redirect()->route('customer.transactions');
    }

    public function reservations()
    {
        $datas = Transaksi::select("*")
            ->orderBy("created_at", "desc")
            ->get();;
        return view('resepsionis.reservations', compact('datas'));
    }

    public function toProcessTransaction($id)
    {

        $data = Transaksi::find($id);
        $data->update(['status'=>'process']);


        return redirect()->route('resepsionis.reservations', compact('data'));
    }

    public function toVerifiedTransaction($id)
    {
        $data = Transaksi::find($id);
        $data->update(['status'=>'verified']);


        return redirect()->route('resepsionis.reservations');
    }

    public function toFailedTransaction($id)
    {
        $data = Transaksi::find($id);
        $data->update(['status'=>'failed']);


        return redirect()->route('resepsionis.reservations');
    }

    public function transactionProof($id)
    {
        $data = Transaksi::find($id);
        $idKamar = explode(', ', $data->idkmr);

        $kamar = Kamar::whereIn('id', $idKamar)->get();
        $dataType = Tipe::where('id', '=', $kamar[0]->id_tipe)->first();
        foreach ($kamar as $val) {
            $nomorKamar[] = $val->number;
        }
        $nomorKamar = implode(', ', $nomorKamar);
        return view('customer.bukti', compact('data', 'nomorKamar'));
    }
}
