<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    public function __construct()
    {
        return $this->middleware('Resepsionis');
    }

    public function index()
    {
        return view('resepsionis.home');
    }
}
