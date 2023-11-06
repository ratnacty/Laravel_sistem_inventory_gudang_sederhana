<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product_OUT_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $q = DB::table('product_outs')->select(DB::raw('MAX(RIGHT(nomorOUT,3))as kode'));
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

        $data = ProductOut::orderBy('created_at','DESC')->get();


        return view('transaksi.product_OUT.index',compact('data','product','supplier','user','kd'));
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
            
            if($quantity > $stok_awal)
            {
            
               return redirect()->back()->with('error', 'Transaksi failed! Request quantity more than stock'); 
            }
    
            elseif($quantity <= 0){
                return redirect()->back()->with('error', 'Transaksi failed! Request Quantity is not valid');  
            }
            else{
                $product->stock -= $request->quantity;
                $product->save();
            }


         
            ProductOut::create([
                'nomorOUT' => $request->nomorOUT,
                'product_id'  => $request->product_id,
                'supplier_id'  => $request->supplier_id,
                'quantity' => $request->quantity, 
                'dateOUT' => date('y-m-d')
            ]);
           
           return redirect()->back()->with('success', 'Transaksi OUT was successful!'); 
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
        $data = ProductOut::findOrFail($id);
        $data->delete();

        return redirect()->back()->with(['success'=>'Transaksi was deleted']);
    }
}
