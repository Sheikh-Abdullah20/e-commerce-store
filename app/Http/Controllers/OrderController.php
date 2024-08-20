<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request->all();
        $order = Order::find($id);
        if($order){
            if($request->has('status')){
                $order->update([
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    'product_weight' => $request->product_weight,
                    'product_qty' => $request->product_qty,
                    'product_purchased_by' => $request->product_purchased_by,
                    'status' => $request->status,
    
                ]);
                return redirect()->route('orders.index')->with('success','Order updated successfully');
            }else{
                $order->update([
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    'product_weight' => $request->product_weight,
                    'product_qty' => $request->product_qty,
                    'product_purchased_by' => $request->product_purchased_by,
    
                ]);
                return redirect()->route('orders.index')->with('success','Order updated successfully');
            }
         
        }else{
            return redirect()->route('orders.index')->with('error','Order not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if($order){
            $order->delete();
            return redirect()->route('orders.index')->with('delete','Order deleted successfully');
        }else{
            return redirect()->route('orders.index')->with('error','Order not found');
        }
    }
}
