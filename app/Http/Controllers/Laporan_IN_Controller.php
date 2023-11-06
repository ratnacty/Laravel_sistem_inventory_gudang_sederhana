<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductIn;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class Laporan_IN_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('laporan.laporanIN.index');

       
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


    public function filterData(Request $request)
    {
        $product = Product::all();
        $supplier = Supplier::all();
      $productIN = ProductIn::orderBy('created_at','desc')->when(
        $request->tgl_awal && $request->tgl_akhir,
        function(Builder $builder) use ($request){
            $builder->whereBetween(
                DB::raw('DATE(dateIN)'),
                [
                    $request->tgl_awal,
                    $request->tgl_akhir
                ]
                );
        }
      )->paginate(10);
     

      return view('laporan.laporanIN.index',compact('productIN','request','product'));
        

      
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       
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
