@extends('layouts.main')
<base href="/public">
@section('heading')
    <h3>Edit Supplier</h3>
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

                <form action="{{ route('supplier.update',$supplier->id) }}" method="post" class="mt-4">
                    @method('PATCH')
                    @csrf

                    <div class="col-md-6 mb-5 mx-auto">
                        <div class="form-group mb-3">
                            <label for="supplierCode">Supplier Code</label>
                            <input type="text" class="form-control" id="basicInput" name="supplierCode" value="{{ $supplier->supplierCode }}"  readonly 
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="supplierName">Supplier Name</label>
                            <input type="text" class="form-control" id="basicInput" name="supplierName" value="{{ $supplier->supplierName }}" required
                               >
                        </div>
                        
                       
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="basicInput" name="address" value="{{ $supplier->address }}" required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="telephone">Telephone</label>
                            <input type="text" class="form-control" id="basicInput" name="telephone" value="{{ $supplier->telephone }}" required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="basicInput" name="email" value="{{ $supplier->email }}" required
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