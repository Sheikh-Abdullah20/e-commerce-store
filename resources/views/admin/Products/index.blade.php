@extends('admin.layout')

@section('title')
Products
@endsection


@section('content')
<section class="content-main">
  <x-alert/>
  <div class="content-header">
      <div>
          <h2 class="content-title card-title">Products</h2>
      </div>
      <div>
          <a href="{{ route('products.create') }}" class="btn btn-primary text-dark btn-sm rounded">Create new</a>
      </div>
  </div>
  <div class="card mb-4">
      <header class="card-header">
          <div class="row gx-3">
              <div class="col-lg-4 col-md-6 me-auto">
                <form action="{{ route('products.index') }}" method="GET" class="d-flex" >
                  <input type="text" placeholder="Search..." name="search" class="form-control" />
                  <button class="btn btn-primary text-dark mx-2" type="submit">Search</button>
                </form>
              </div>
              <div class="col-lg-2 col-6 col-md-3">

                <form method="GET" action="{{ route('products.index') }}">
                  @csrf
                  <select id="categoryFilter" name="category_id" class="form-select">
                      <option value="">All categories</option>
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                              {{ $category->category_name }}
                          </option>
                      @endforeach
                  </select>
              </form>
              
              </div>
          </div>
      </header>
   
      <div class="card-body">
        @if($products->isEmpty())
        <div class="alert alert-warning">
          @if($searchQuery)
            No Product Found matching Your Search {{ $searchQuery }}
          @endif
        </div>

        @else
        <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
              @foreach ($products as $product)
              <div class="col">
                <div class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="{{ asset('storage/'. $product->product_image)}}" alt="Product" /> </a>
                    <div class="info-wrap">
                        <a href="#" class="title text-truncate">{{ $product->product_name }}</a>
                        <div class="price mb-2">${{ $product->product_price }}</div>
                        <div class="d-flex">
                          <a href="{{ route('products.edit',$product) }}" class="btn btn-sm font-sm btn-success text-dark rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                          <form action="{{ route('products.destroy',$product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type=submit onclick="return confirm('Are You Sure You Want To Delete This Product?')" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Delete </button>
                          </form>
                        </div>
                       
                       
                    </div>
                </div>
                <!-- card-product  end// -->
            </div>
            @endforeach


          </div>
          <!-- row.// -->
      </div>
      @endif
  </div>
  <!-- card end// -->
  <div class="pagination-area mt-30 mb-50">
    {{ $products->links() }}
  </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets2/js/jquery.js') }}"></script>
  <script>
    $(document).ready(function() {
    $('#categoryFilter').change(function() {
        $(this).closest('form').submit();
    });
});

  </script>
@endsection