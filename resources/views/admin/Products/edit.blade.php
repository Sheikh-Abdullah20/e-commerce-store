@extends('admin.layout')

@section('title')
Edit - Product
@endsection


@section('content')
<section class="content-main">
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-start">
            <h2 class="content-title card-title">Edit - Product</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <figure class="text-lg-center">
                @isset($product->product_image)
                <img class="img-lg mb-3 img-avatar" id="img" src="{{ asset('storage/'. $product->product_image) }}" alt="User Photo" />
                @else
                <img class="img-lg mb-3 img-avatar" id="img" src="{{ asset('images/Add_image2.jpg') }}" alt="User Photo" />
                @endisset
                <figcaption>
                    <button id="upload_button" class="btn btn-light rounded font-md"> <i class="icons material-icons md-backup font-md"></i> Upload </button>
                </figcaption>
            </figure>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control " name="name" id="name" value="{{ $product->product_name }}">
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1">Product Details</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $product->product_description }}</textarea>
                    @error('descripiton')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="price`">Product Price</label>
                    <input type="number" class="form-control " name="price" id="price" value="{{ $product->product_price }}" >
                    @error('price')
                         <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                    
                <div class="mb-3">
                    <label for="current_category`">Current Category</label>
                    <input type="text" class="form-control " id="current_category" value="{{ $hasCategory }}"  readonly>
                </div>

                <div class="mb-3">
                    <label for="category">Categories</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" hidden onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])"  name="product_image" id="file">
                    
                    @error('product_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-success mb-5" type="submit">Update Product</button>
            </form>
        </div>
    </div>

</section>
@endsection

@section('scripts')
        <script>
            document.getElementById('upload_button').addEventListener('click',function(e){
                console.log('clicked')
                e.preventDefault();
                document.getElementById('file').click();
            });  
        </script>
@endsection