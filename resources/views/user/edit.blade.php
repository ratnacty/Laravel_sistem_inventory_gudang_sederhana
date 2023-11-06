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

                <form action="{{ route('user.update',$user->id) }}" method="post" class="mt-4">
                    @method("PATCH")
                    @csrf

                    <div class="col-md-6 mb-5 mx-auto">
                       
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}"  required
                               >
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"  required
                               >
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="level">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                @if (('level') == $user->level)
                                <option value="{{ $user->level }}"  selected >{{ $user->level }}</option>

                                @else
                                    <option value="staff">Staff</option>
                                    <option value="head staff">Head Staff</option>
                                    <option value="manager">Manager</option>
                                    <option value="admin">Admin</option>
                                @endif
                               
                               
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required
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