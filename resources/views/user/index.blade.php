@extends('layouts.main')
@section('heading')
    <h3>Users Page</h3>
@endsection
@section('content')
    
<section class="section">
    <div class="card ">
        <div class="card-header">
            <a href="{{ route('user.create') }}" class="card-title btn btn-primary">Add New </a>
         
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
                        <th>Name</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($user as $row)
                        
                   
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->level }}</td>
                    
                        
                        <td class="the-icon d-flex">
                            <div>
                                <a href="{{ route('user.edit',$row->id) }}" class="btn icon icon-left btn-outline-warning"> <span class="fa-fw select-all fas"></span></a>

                            </div>
                          
                            <div class="mx-3">
                                <form action="{{ route('user.destroy',$row->id) }}" method="post">
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