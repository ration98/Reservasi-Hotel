<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Fasilitas_Kamar;
use App\Models\Kamar;
use App\Models\Tipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function __construct()
    {
        return $this->middleware('Admin');
    }


    //Tipe Kamar
    public function addTipe()
    {
        return view('admin.tipe_kmr.tipe');
    }

    public function tipeStore(Request $request)
    {
        $imgname = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('foto'), $imgname);

        Tipe::create ([
            'nama' => $request->nama,
            'foto' => $imgname,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
            'informasi' => $request->informasi,
        ]);

        return redirect()->route('admin.listTipe');
    }

    public function listTipe()
    {
        $data = Tipe::all();
        return view('admin.tipe_kmr.listTipe', compact('data'));
    }

    public function editTipe($id)
    {
        $data = Tipe::find($id);
        return view('admin.tipe_kmr.editTipe', compact('data'));
    }

    public function hapusTipe($id)
    {
        $data = Tipe::destroy($id);
        return redirect()->route('admin.listTipe', compact('data'));
    }

    public function updateTipe(Request $request, $id)
    {
        $request->validate([
            'foto'=>'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imgname = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('image'), $imgname);

        $data = Tipe::where('id', $id);
        $data->update([
            'nama' => $request->nama,
            'foto' => $imgname,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
            'informasi' => $request->informasi,
        ]);

        return redirect()->route('admin.listTipe');
    }


    //Kamar
    public function addKamar()
    {
        $tipeKamar = Tipe::all();
        return view('admin.kamar.kamar', compact('tipeKamar'));
    }

    public function kamarStore(Request $request)
    {
        Kamar::create ([
            'id_tipe' => $request->id_tipe,
            'nomor' => $request->nomor,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.listKamar');
    }

    public function listKamar()
    {
        $data = Kamar::all();
        return view('admin.kamar.listKamar', compact('data'));
    }

    public function editKamar($id)
    {
        $data = Kamar::find($id);
        $tipeKamar = Tipe::all();
        return view('admin.kamar.editKamar', compact('data', 'tipeKamar'));
    }

    public function hapusKamar($id)
    {
        Kamar::destroy($id);
        return redirect()->route('admin.listKamar');
    }

    public function updateKamar(Request $request, $id)
    {
        Kamar::where('id', $id)->update ([
            'id_tipe' => $request->id_tipe,
            'nomor' => $request->nomor,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.listKamar');
    }


    //Fasilitas
    public function addFasilitas()
    {
        return view('admin.fasilitas.fasilitas');
    }

    public function fasilitasStore(Request $request)
    {
        Fasilitas::create ([
           'namaFasilitas' => $request->labelFasilitas,
           'info' => $request->info,
        ]);

        return redirect()->route('admin.listFasilitas');
    }

    public function listFasilitas()
    {
        $data = Fasilitas::all();
        return view('admin.fasilitas.listFasilitas', compact('data'));
    }

    public function editFasilitas($id)
    {
        $data = fasilitas::find($id);
        return view('admin.fasilitas.editFasilitas', compact('data'));
    }

    public function hapusFasilitas($id)
    {
        Fasilitas::destroy($id);
        return redirect()->route('admin.listFasilitas');
    }

    public function updateFasilitas(Request $request, $id)
    {
        Fasilitas::where('id', $id)->update ([
           'namaFasilitas' => $request->labelFasilitas,
           'info' => $request->info,
        ]);

        return redirect()->route('admin.listFasilitas');
    }


    //Fasilitas Kamar
    public function addfasilitasKamar()
    {
        return view('admin.fasilitas_kmr.FasilitasKamar');
    }

    public function FasilitasKamarStore(Request $request)
    {
        Fasilitas_Kamar::create([
            'barang' =>$request->barang,
        ]);

        return redirect()->route('admin.listFasilitasKamar');
    }

    public function listFasilitasKamar()
    {
        $data = Fasilitas_Kamar::all();
        return view('admin.fasilitas_kmr.listFasilitasKamar', compact('data'));
    }

    public function editFasilitasKamar($id)
    {
        $data = Fasilitas_Kamar::find($id);
        return view('admin.fasilitas_kmr.editFasilitasKamar', compact('data'));
    }

    public function hapusFasilitasKamar($id)
    {
        $data = Fasilitas_Kamar::destroy($id);
        return redirect()->route('admin.listFasilitasKamar');
    }

    public function updateFasilitasKamar(Request $request, $id)
    {
        Fasilitas_Kamar::where('id', $id)->update ([
            'barang' => $request->barang
        ]);

        return redirect()->route('admin.listFasilitasKamar');
    }
}
