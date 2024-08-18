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

        <div class="col-md-6 d-flex justify-content-end">
            <figure class="text-lg-center">
                <img class="img-lg mb-3 img-avatar" id="img" src="{{ asset('images/Add_image2.jpg') }}" alt="User Photo"  style="object-fit:cover; height:200px;"/>
                <figcaption>
                    <button id="upload_button" class="btn btn-light rounded font-md"> <i class="icons material-icons md-backup font-md"></i> Upload </button>
                </figcaption>
            </figure>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="mb-1">Category</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control d-none" name="image"  id="file" onchange="document.querySelector('#img').src=window.URL.createObjectURL(this.files[0])" >
                    @error('image')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-success mt-3" type="submit">Create Category</button>
            </form>
        </div>
    </div>

</section>
@endsection

@section('scripts')
    <script>
        document.getElementById('upload_button').addEventListener('click', function(e){
            console.log('clicked');
            // e.preventDefault();
            document.getElementById('file').click();
        })
    </script>
@endsection