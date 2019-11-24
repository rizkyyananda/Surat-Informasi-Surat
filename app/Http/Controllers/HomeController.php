<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\SuratMasuk;
use App\suratkeluar;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratmasuk = SuratMasuk::get();
        $suratkeluar = Suratkeluar::get();
        return view('home' , compact('suratmasuk'), compact('suratkeluar'));
    }
}
