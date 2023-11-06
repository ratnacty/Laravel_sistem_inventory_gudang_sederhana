@extends('layouts.main')
<base href="/public">
@section('heading')
    <h3>Create New Supplier</h3>
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

                <form action="{{ route('supplier.store') }}" method="post" class="mt-4">
                    @csrf

                    <div class="col-md-6 mb-5 mx-auto">
                       
                     
                        <div class="form-group mb-3">
                            <label for="supplierName">Supplier Name</label>
                            <input type="text" class="form-control" id="basicInput" name="supplierName" placeholder="create name here.." autofocus  required
                               >
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="basicInput" name="address" placeholder="NewYork City.." required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="telephone">Telephone</label>
                            <input type="number" class="form-control" id="basicInput" name="telephone" placeholder="09287637900.." required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="basicInput" name="email" placeholder="email@gmail.com" required
                               >
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