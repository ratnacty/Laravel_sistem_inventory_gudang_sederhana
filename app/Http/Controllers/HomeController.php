<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductIn;
use App\Models\ProductOut;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $productIn = ProductIn::count();
        $productOut = ProductOut::count();


        $transaksiIN   = ProductIn::count();
        $transaksiOUT  = ProductOut::count();



    
    $masuk_jan      = ProductIn::whereMonth('dateIN', '01')->count();
    $masuk_feb      = ProductIn::whereMonth('dateIN', '02')->count();
    $masuk_mar      = ProductIn::whereMonth('dateIN', '03')->count();
    $masuk_apr      = ProductIn::whereMonth('dateIN', '04')->count();
    $masuk_mei      = ProductIn::whereMonth('dateIN', '05')->count();
    $masuk_jun      = ProductIn::whereMonth('dateIN', '06')->count();
    $masuk_jul      = ProductIn::whereMonth('dateIN', '07')->count();
    $masuk_agu      = ProductIn::whereMonth('dateIN', '08')->count();
    $masuk_sep      = ProductIn::whereMonth('dateIN', '09')->count();
    $masuk_okt      = ProductIn::whereMonth('dateIN', '10')->count();
    $masuk_nov      = ProductIn::whereMonth('dateIN', '11')->count();
    $masuk_des      = ProductIn::whereMonth('dateIN', '12')->count();


    $keluar_jan      = ProductOut::whereMonth('dateOUT', '01')->count();
    $keluar_feb      = ProductOut::whereMonth('dateOUT', '02')->count();
    $keluar_mar      = ProductOut::whereMonth('dateOUT', '03')->count();
    $keluar_apr      = ProductOut::whereMonth('dateOUT', '04')->count();
    $keluar_mei      = ProductOut::whereMonth('dateOUT', '05')->count();
    $keluar_jun      = ProductOut::whereMonth('dateOUT', '06')->count();
    $keluar_jul      = ProductOut::whereMonth('dateOUT', '07')->count();
    $keluar_agu      = ProductOut::whereMonth('dateOUT', '08')->count();
    $keluar_sep      = ProductOut::whereMonth('dateOUT', '09')->count();
    $keluar_okt      = ProductOut::whereMonth('dateOUT', '10')->count();
    $keluar_nov      = ProductOut::whereMonth('dateOUT', '11')->count();
    $keluar_des      = ProductOut::whereMonth('dateOUT', '12')->count();





        return view('dashboard',compact('user','product','productIn','productOut',
        'masuk_jan',
        'masuk_feb',
        'masuk_mar',
        'masuk_apr',
        'masuk_mei',
        'masuk_jun',
        'masuk_jul',
        'masuk_agu',
        'masuk_sep',
        'masuk_okt',
        'masuk_nov',
        'masuk_des',

        'keluar_jan',
        'keluar_feb',
        'keluar_mar',
        'keluar_apr',
        'keluar_mei',
        'keluar_jun',
        'keluar_jul',
        'keluar_agu',
        'keluar_sep',
        'keluar_okt',
        'keluar_nov',
        'keluar_des'

    ));
    }
}
