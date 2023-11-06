<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductIn;
use App\Models\ProductOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class Laporan_OUT_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        return view('laporan.laporanOUT.index');
    }

    public function filterDataOUT(Request $request)
    {
        $product = Product::all();
        $supplier = Supplier::all();
      $productOUT = ProductOut::orderBy('created_at','desc')->when(
        $request->tgl_awal && $request->tgl_akhir,
        function(Builder $builder) use ($request){
            $builder->whereBetween(
                DB::raw('DATE(dateOUT)'),
                [
                    $request->tgl_awal,
                    $request->tgl_akhir
                ]
                );
        }
      )->paginate(10);
     

      return view('laporan.laporanOUT.index',compact('productOUT','request','product','supplier'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
