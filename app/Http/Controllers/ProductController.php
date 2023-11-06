<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();

        return view('product.create',compact('category','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::latest()->first();
        $kode = "NPC";
        $kodeTahun = date("Y");
        if($product == null){
            $codeProduct = "0001";
        }else{
            $codeProduct = substr($product->productCode, 7, 4)+1;
            $codeProduct = str_pad($codeProduct, 4, "0" , STR_PAD_LEFT);
        }

        $productCode = $kode . $kodeTahun . $codeProduct;
        
        

        $requestData = $request->validate([
            'productName' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required'
        ]);

        $requestData['stock'] = 0;
        $requestData['productCode'] = $productCode;

        Product::create($requestData);

        return redirect()->back()->with(['success' => 'Product was created']);





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
        $product = Product::findOrFail($id);

        $category = Category::all();

        $supplier = Supplier::all();

        return view('product.edit',compact('product','category','supplier'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'productName' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'stock' => 'required',
        ]);

        $data = Product::findOrFail($id);
        $data->productCode = $request->productCode;
        $data->productName = $request->productName;
        $data->category_id = $request->category_id;
        $data->supplier_id = $request->supplier_id;
        $data->stock = $request->stock;
        $data->save();

        return redirect()->route('product.index')->with(['success'=>'product was updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->back()->with(['success' => 'product was deleted']);
    }



    public function allProduct()
    {

        $data = Product::all();
        return view('product.allproduct',compact('data'));

    }


}
