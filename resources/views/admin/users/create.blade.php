@extends('admin.layout')

@section('title')
Create-user
@endsection


@section('content')
<section class="content-main">
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-start">
            <h2 class="content-title card-title">Create - user</h2>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control " placeholder='Name' name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " placeholder='Email' name="email" id="email" value="{{ old('email') }}">
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
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control " placeholder='password' name="password_confirmation" id="password_confirmation" >
                    @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select">
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