<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Product_IN_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $q = DB::table('product_ins')->select(DB::raw('MAX(RIGHT(nomorIN,3))as kode'));
        $kd ="";
        if($q->count()>0) 
        {
         foreach($q->get() as $k)
          {
             $tmp = ((int)$k->kode)+1;
             $kd = sprintf("%03s", $tmp);
          }
        }
 
        else
        {
         $kd = "001";
        }
       
        $product = Product::all();
        $supplier = Supplier::all();
        $user = User::all();

        $data = ProductIn::orderBy('created_at','DESC')->get();


        return view('transaksi.product_IN.index',compact('data','product','supplier','user','kd'));
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
        $request->validate([
            'quantity' =>'required',
            'supplier_id'=>'required',
            'product_id'=>'required',],
            [
            'quantity.required'=>'quantity tidak boleh kosong',
            'supplier_id.required'=>'supplier tidak boleh kosong',
            'product_id.required'=>'product tidak boleh kosong',
            ]);
          

        $quantity = $request->quantity;
        $product = Product::find($request->product_id);
        if($product){
            echo $product;
        }
        $stok_awal = $product->stock;
        
        if($quantity <= 0){
            return redirect('/dashboard/barangmasuk')->with('error', 'Transaksi failed! Jumlah Barang tidak boleh 0 atau kurang'); 
        }
           else { if ($quantity > 0 )
            $product->stock = $stok_awal + $quantity;
            $product->save();}
        
        
        $user = Auth::user()->id;
        ProductIn::create([
            'nomorIN' => $request->nomorIN,
            'product_id'  => $request->product_id,
            'supplier_id'  => $request->supplier_id,
            'quantity' => $request->quantity, 
            'user_id' => $user,
            'dateIN' => date('y-m-d')
        ]);

        return redirect()->back()->with(['success' => 'transaksi was successfull']);
       
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
        $data = ProductIn::findOrFail($id);
        $data->delete();

        return redirect()->back()->with(['success'=>'Transaksi was deleted']);
    }

    public function getProduct(Request $request)
    {
        $product = Product::find($request->product_id);
        if($product){
            echo $product;
        }

    }
}

