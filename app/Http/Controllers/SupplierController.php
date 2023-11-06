<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Supplier::all();

        return view('supplier.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $supplier = Supplier::latest()->first();
        $kodeHuruf = "NPS";
        $kodeTahun = date("Y");
        if($supplier == null){
            $codeSupplier = "0001";
        }else{
            $codeSupplier = substr($supplier->supplierCode, 7, 4)+1;
            $codeSupplier = str_pad($codeSupplier, 4 , "0" , STR_PAD_LEFT);
        }

        $Code = $kodeHuruf . $kodeTahun . $codeSupplier;


        $validasiData = $request->validate([
            'supplierName' => 'required',
            'address' => 'required|min:5',
            'telephone' => 'required',
            'email' => 'required|unique:suppliers'
        ]);

        $validasiData['supplierCode'] = $Code;

        Supplier::create($validasiData);

        return redirect()->back()->with(['success' => 'Supplier was added']);
        
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
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'supplierCode' => 'required',
            'supplierName' => 'required',
            'address' => 'required|min:5',
            'telephone' => 'required',
            'email' => 'required'
        ]);

        $data = Supplier::findOrFail($id);
        $data->supplierCode = $request->supplierCode;
        $data->supplierName = $request->supplierName;
        $data->address = $request->address;
        $data->telephone = $request->telephone;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('supplier.index')->with(['success' => 'Supplier was updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->back()->with(['success' => 'supplier was deleted']);
    }
}
