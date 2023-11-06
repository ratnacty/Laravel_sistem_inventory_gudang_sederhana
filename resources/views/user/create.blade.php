@extends('layouts.main')
<base href="/public">
@section('heading')
    <h3>Create New User</h3>
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

                <form action="{{ route('user.store') }}" method="post" class="mt-4">
                    @csrf

                    <div class="col-md-6 mb-5 mx-auto">
                       
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="create username" required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com" required
                               >
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="level">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                <option selected >Choose one</option>
                                <option value="staff">Staff</option>
                                <option value="head staff">Head Staff</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                               
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="password" required
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