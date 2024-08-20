@extends('admin.layout')

@section('title')
Orders
@endsection


@section('content')
<section class="content-main">
  <x-alert/>
    <div class="content-header ">
        <div class="col-md-6 d-flex justify-content-center">
            <h2 class="content-title card-title">Orders</h2>
        </div>
    </div>
  

    <div class="row">
        <div class="col-md-12">
          

            <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Order_id</th>
                    <th scope="col">Product_name</th>
                    <th scope="col">Product_price</th>
                    <th scope="col">Product_weight</th>
                    <th scope="col">Product_qty</th>
                    <th scope="col">Product_Purchased_by</th>
                    <th scope="col">Product_Purchased_user</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count = 0; @endphp
                  
                  @foreach ( $orders as $order )
        
                  @php $count++; @endphp
                  <tr>
                    <th scope="row">{{ $count }}</th>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->product_price }}</td>
                    <td>{{ $order->product_weight }}</td>
                    <td>{{ $order->product_qty }}</td>
                    <td>{{ $order->product_purchased_by }}</td>               
                    <td>{{ $order->user->name}}</td>
                    <td>{{ $order->status }}</td>
                   
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('orders.edit',$order->id) }}" class="btn btn-primary text-dark">Update</a>
                      <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" onclick="return confirm('Are You Sure You Want To Delete this order?')" class="btn btn-danger mx-3 w-100">Delete</button>
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