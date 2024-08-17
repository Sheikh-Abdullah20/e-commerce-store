@extends('admin.layout')

@section('title')
Users
@endsection


@section('content')
<section class="content-main">
  <x-alert/>
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-center">
            <h2 class="content-title card-title">Users</h2>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
           <a  href="{{ route('users.create') }}" class="btn btn-secondary">Create User</a>

        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
          

            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count = 0; @endphp
                  
                  @foreach ( $users as $user )
                  @php $count++; @endphp
                  <tr>
                    <th scope="row">{{ $count }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->pluck('name')->implode('') }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary text-dark">Update</a>
                      <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger mx-3 w-100">Delete</button>
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