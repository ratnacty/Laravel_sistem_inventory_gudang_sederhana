@extends('layouts.main')
@section('heading')
    <h3>Category Page</h3>
@endsection
@section('content')
    
<section class="section">
    <div class="card ">
        <div class="card-header mx-auto">

            <form action="{{ route('category.store') }}" method="post" class="card-title mt-4">
                @csrf

                <div class="col-md d-flex">

                    <div class="form-group">
                        <input type="text" class="form-control" id="basicInput" name="categoryName" placeholder="create here.." autofocus required>

                    </div>
                    <div class="form-group mx-3">
                        <button type="submit" class="btn btn-primary">Add New</button>
                    </div>

                </div>
            </form>
         
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
                        <th>Category Name</th>
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
                        <td>{{ $row->categoryName }}</td>
                      
                        
                        <td class="the-icon">                          
                            <form action="{{ route('category.destroy',$row->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn icon icon-left btn-outline-danger" onclick="return confirm('Are You sure want to delete this category?')">
                                    <span class="fa-fw select-all fas"></span>
                                </button>

                            </form>
                          
                            
                        </td>
                    </tr>

                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection