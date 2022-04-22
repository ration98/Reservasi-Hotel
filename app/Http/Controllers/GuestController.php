<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\tipe;
use Auth;

class GuestController extends Controller
{
    public function index()
    {
        if(!Auth::check() OR auth()->user()->level == "customer"){
            return view('guest.home');
        }
        elseif(auth()->user()->level == "admin"){
            return redirect()->route('home');
        }
        elseif(auth()->user()->level == "resepsionis"){
            return redirect()->route('home');
        }
    }

    public function detail($id)
    {
        if(!Auth::check() OR auth()->user()->level == "customer"){
            $data = Tipe::where('id','=', $id)->first();
            $kmr = Kamar::where('id_tipe','=', $id)->first();
            $jumlahPesanan = Kamar::where('id_tipe','=', $id)->where('status','=','v')->count();
            return view('guest.detailKamar', compact('data','jumlahPesanan','id','kmr'));
        }
        elseif(auth()->user()->level == "admin"){
            return redirect()->route('home');
        }
        elseif(auth()->user()->level == "resepsionis"){
            return redirect()->route('home');
        }
    }

}
