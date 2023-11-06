<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;

use App\Models\ProductIn;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{

    public function viewPDF()
    {

        $data = Product::all();
        $pdf= Pdf::loadview('product.viewPDF',['data'=>$data]);
        return $pdf->download('Product.pdf');

    }


    public function laporanIN_PDF(Request $request)
    {
        
        $product = Product::all();
        $supplier = Supplier::all();
        $user = Auth::user()->id;
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
      )->get();

   
      $pdf= Pdf::loadview('laporan.laporanIN.exportPDF',[
        'productIN'=>$productIN,
        'product' => $product,
        'supplier' => $supplier,
        'user' => $user,
        'request' =>$request,
        
      ]);
      return $pdf->download('Laporan_IN.pdf');
             

    }



    // public function exportExcel()
    // {
    //     $data = Product::all();
    //     // return Excel::download(new Barang_KeluarExport($tgl_awal , $tgl_akhir, $total_harga, $total_quantity), 'Barangkeluar.xlsx');

    // }



}
