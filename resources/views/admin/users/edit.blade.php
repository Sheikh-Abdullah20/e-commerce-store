@extends('admin.layout')

@section('title')
Edit-user
@endsection


@section('content')
<section class="content-main">
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-start">
            <h2 class="content-title card-title">Edit - user</h2>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('users.update',$user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control " placeholder='Name' name="name" id="name" value="{{ $user->name }}">
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " placeholder='Email' name="email" id="email" value="{{$user->email}}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control " placeholder='password' name="password" id="password" >
                    @error('password')
                         <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="Current_Role">Current Role</label>
                    <input type="text" class="form-control" placeholder='password' id="Current_Role" value="{{ $user->roles->pluck('name')->implode('') }}" readonly>
                </div>

            
                <div class="mb-3">
                    <label for="role">Change_Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                

                <button class="btn btn-success mt-3" type="submit">Create user</button>
            </form>
        </div>
    </div>

</section>
@endsection