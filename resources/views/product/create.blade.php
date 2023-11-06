@extends('layouts.main')
<base href="/public">
@section('heading')
    <h3>Create New Product</h3>
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

                <form action="{{ route('product.store') }}" method="post" class="mt-4">
                    @csrf

                    <div class="col-md-6 mb-5 mx-auto">
                       
                        <div class="form-group mb-3">
                            <label for="basicInput">Product Name</label>
                            <input type="text" class="form-control" id="basicInput" name="productName" required
                               >
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <select class="form-select" id="basicSelect" name="category_id" required>
                                <option selected disabled>Choose one</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->categoryName }}</option>
                                @endforeach
                               
                            </select>
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="">Supplier</label>
                            <select class="form-select" id="basicSelect" name="supplier_id" required>
                                <option selected disabled>Choose one</option>
                                @foreach ($supplier as $row)
                                    <option value="{{ $row->id }}">{{ $row->supplierName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                   

                </form>
                   
            </div>
        </div>
    </div>
</section>

@endsection