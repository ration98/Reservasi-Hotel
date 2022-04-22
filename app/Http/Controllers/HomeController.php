<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       if(auth()->user()->level == 'Admin'){
           return redirect()->route('admin.home');
        }
       elseif(auth()->user()->level == 'Resepsionis'){
           return redirect()->route('resepsionis.home');
        }
       else
       {
           return redirect()->route('customer.home');
       }
    }
}
