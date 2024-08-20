@extends('admin.layout')

@section('title')
Edit - Order
@endsection


@section('content')
<section class="content-main">
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-start">
            <h2 class="content-title card-title">Edit - Order</h2>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('orders.update',$order) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="Product_Name">Product_Name</label>
                    <input type="text" class="form-control "  name="product_name" id="product_name" value="{{ $order->product_name }}">
                    @error('Product_Name')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product_price">product_price</label>
                    <input type="text" class="form-control "  name="product_price" id="product_price" value="{{ $order->product_price }}">
                    @error('product_price')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product_weight">product_Weight</label>
                    <input type="text" class="form-control "  name="product_weight" id="product_weight" value="{{ $order->product_weight }}">
                    @error('product_weight')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product_qty">Product_Qty</label>
                    <input type="text" class="form-control "  name="product_qty" id="product_qty" value="{{ $order->product_qty }}">
                    @error('product_qty')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product_purchased_by">Product_Purchased_By</label>
                    <input type="text" class="form-control "  name="product_purchased_by" id="product_purchased_by" value="{{ $order->product_purchased_by }}">
                    @error('product_purchased_by')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status">Current Status</label>
                    <input type="text" class="form-control" value="{{ $order->status }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="status">Change Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="" selected disabled>Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                    @error('status')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                   <button class="btn btn-success mt-3" type="submit">Update Order</button>
            </form>
        </div>
    </div>

</section>
@endsection