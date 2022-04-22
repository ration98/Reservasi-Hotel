<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Auth;

class LandingpageController extends Controller
{
    public function index()
    {
        $tipe = Tipe::all();

        return view('landing', compact('tipe'));

    }
}
