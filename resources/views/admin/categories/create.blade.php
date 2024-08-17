@extends('admin.layout')

@section('title')
Create - Category
@endsection


@section('content')
<section class="content-main">
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-start">
            <h2 class="content-title card-title">Create - Category</h2>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="mb-1">Category</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-success mt-3" type="submit">Create Category</button>
            </form>
        </div>
    </div>

</section>
@endsection