@extends('admin.layout')

@section('title')
Categories
@endsection


@section('content')
<section class="content-main">
  <x-alert/>
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-center">
            <h2 class="content-title card-title">Categories</h2>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
           <a  href="{{ route('categories.create') }}" class="btn btn-secondary">Create Category</a>

        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
          

            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category - Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count = 0; @endphp
                  
                  @foreach ( $categories as $category )
                  @php $count++; @endphp
                  <tr>
                    <th scope="row">{{ $count }}</th>
                    <td>{{ $category->category_name }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary text-dark">Update</a>
                      <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
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