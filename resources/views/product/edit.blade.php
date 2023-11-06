@extends('layouts.main')
<base href="/public">
@section('heading')
    <h3>Edit Product</h3>
@endsection


@section('content')
    


<section class="section">
    <div class="card mx-auto">

        <div class="card-body">
            <div class=" row ">

                @if(session('success'))
                <div class="alert alert-light-primary color-primary alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
                </div>
                @endif

                <form action="{{ route('product.update',$product->id) }}" method="post" class="mt-4">
                    @method('PATCH')
                    @csrf

                    <div class="col-md-6 mb-5 mx-auto">
                        <div class="form-group mb-3">
                            <label for="basicInput">Product Code</label>
                            <input type="text" class="form-control" id="basicInput" name="productCode" value="{{ $product->productCode }}"  readonly 
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="basicInput">Product Name</label>
                            <input type="text" class="form-control" id="basicInput" name="productName" value="{{ $product->productName }}" required
                               >
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <select class="form-select" id="basicSelect" name="category_id" required>
                                {{-- <option value="{{ $product->category_id}}" selected>{{ $product->category->categoryName }}</option> --}}
                                @foreach ($category as $item)
                            
                                    @if ($product->category_id == $item->id)

                                        <option value="{{ $item->id}}" selected >{{ $item->categoryName }}</option>
                                        
                                    @else

                                        <option value="{{ $item->id }}">{{ $item->categoryName }}</option>
 
                                    @endif
                                @endforeach
                               
                            </select>
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="">Supplier</label>
                            <select class="form-select" id="basicSelect" name="supplier_id" required>
                                {{-- <option value="{{ $supplier->id }}" selected>{{ $supplier->supplierName }}</option> --}}
                                @foreach ($supplier as $row)
                               
                                @if ($product->supplier_id == $row->id)

                                    <option value="{{ $row->id}}" selected >{{ $row->supplierName }}</option>
                                    
                                @else

                                    <option value="{{ $row->id}}">{{ $row->supplierName }}</option>

                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="basicInput">Stock</label>
                            <input type="text" class="form-control" id="basicInput" name="stock" value="{{ $product->stock }}" required
                               >
                        </div>

                        <div class="form-group mt-4">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                   

                </form>
                   
            </div>
        </div>
    </div>
</section>

@endsection