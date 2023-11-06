@extends('layouts.main')
@section('heading')
    <h3>Product Page</h3>
@endsection
@section('content')
    
<section class="section">
    <div class="card ">
        <div class="card-header">
            <h5 class="card-title">All Product</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-light-primary color-primary alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
            </div>
            @endif

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Stock</th>
                       
                    </tr>
                </thead>
                <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($data as $row)
                        
                   
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->productCode }}</td>
                        <td>{{ $row->productName }}</td>
                        <td>{{ $row->Category->categoryName }}</td>
                        <td>{{ $row->Supplier->supplierName }}</td>
                        <td>{{ $row->stock }}</td>


                        
                    </tr>

                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection