@extends('layouts.main')
@section('heading')
    <h3>Product Page</h3>
@endsection
@section('content')
    
<section class="section">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <a href="{{ route('product.create') }}" class="card-title btn btn-primary">Add New </a>
            <div>
                <a href="{{ route('viewPDF') }}" class="btn btn-outline-primary">download PDF</a>
                {{-- <a href="{{ route('exportExcel') }}" class="btn btn-outline-success">Excel</a> --}}
            </div>
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
                    <tr class="bg-secondary text-white">
                        <th>No</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Stock</th>
                        <th>Action</th>
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
                        
                        <td class="the-icon d-flex">
                            <div>
                                <a href="{{ route('product.edit',$row->id) }}" class="btn icon icon-left btn-outline-warning"> <span class="fa-fw select-all fas"></span></a>

                            </div>
                          
                            <div class="mx-3">
                                <form action="{{ route('product.destroy',$row->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
    
                                        <button type="submit" class="btn icon icon-left btn-outline-danger" onclick="return confirm('Are You Sure want to Delete This ?')">
                                            <span class="fa-fw select-all fas"></span>
                                        </button>
                                  
    
                                </form>
                            </div>

                        </td>


                        
                    </tr>

                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection