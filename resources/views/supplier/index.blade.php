@extends('layouts.main')
@section('heading')
    <h3>Supplier Page</h3>
@endsection
@section('content')
    
<section class="section">
    <div class="card mb-5">
        <div class="card-header">
            <a href="{{ route('supplier.create') }}" class="card-title btn btn-primary">Add New </a>
         
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
                        <th>Supplier Code</th>
                        <th>Supplier Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Email</th>
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
                        <td>{{ $row->supplierCode }}</td>
                        <td>{{ $row->supplierName }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->telephone }}</td>
                        <td>{{ $row->email }}</td>
                        
                        <td class=" d-flex">
                            <div>
                                <a href="{{ route('supplier.edit',$row->id) }}" class="btn icon icon-left btn-outline-warning"> <span class="fa-fw select-all fas"></span></a>

                            </div>
                          
                            <div class="mx-2">
                                <form action="{{ route('supplier.destroy',$row->id) }}" method="post">
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