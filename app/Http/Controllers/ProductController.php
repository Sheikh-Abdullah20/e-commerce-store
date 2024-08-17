<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->category_id;
        $searchQuery = $request->search;
        // return $selectedCategoryId;
        $products = Product::when($selectedCategoryId, function ($query) use ($selectedCategoryId) {
            return $query->where('product_category_id', $selectedCategoryId);
        })
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('product_name', 'like', '%' . $searchQuery . '%');
        })->paginate(10);
    
        return view('admin.Products.index', compact('categories', 'products', 'selectedCategoryId','searchQuery'));
    }
    


    public function create()
    {
        $categories = Category::all();
        return view('admin.Products.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:20',
            'price' => 'required',
            'category' => 'required',
            'product_image' => 'required|mimes:jpg,jpeg,png'
        ]);
        $product = Product::create([
            'product_name' => $request->name,
            'product_description' => $request->description,
            'product_price' => $request->price,
            'product_category_id' => $request->category,
            'product_image' => $request->file('product_image')->store('product_image','public'),
        ]);

        if($product){
            return redirect()->route('products.index')->with('success','Product has been successfully Added');
        }else{
            return redirect()->route('products.index')->with('error','Product Not Added');
        }
    }


    // public function show(string $id)
    // {
    //     //
    // }


    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $hasCategory = $product->category->category_name;
        // return $hasCategory;
        return view('admin.Products.edit',compact('product','categories','hasCategory'));
    }


    public function update(Request $request, string $id)
    {   
        $product = Product::find($id);
        if($request->product_image){
            if($product->product_image && file_exists(public_path('storage/'.$product->product_image))){
                $path = public_path('storage/'.$product->product_image);
                if(file_exists($path)){
                    unlink($path);
                }
            }
        }
       

        if($product){
           $update =  $product->update([
                'product_name' => $request->name,
                'product_description' => $request->description,
                'product_price' => $request->price,
                'product_category_id' => $request->category,
            ]);
            if($request->product_image){
                $product->update([
                    'product_image' => $request->file('product_image')->store('product_image','public')
                ]);
            }

            if($update){
                return redirect()->route('products.index')->with('success','Product updated successfully');
            }else{
                return redirect()->route('products.index')->with('error','Product Not Updated');
            }
        }
    }


    public function destroy(string $id)
    {
        $product = Product::find($id);
        if($product){
          if($product->product_image && file_exists(public_path('storage/'. $product->product_image))){
            $path = public_path('storage/'.$product->product_image);
            if(file_exists($path)){
                unlink($path);
            }
        }
            $product->delete();
            return redirect()->route('products.index')->with('delete','Product has been successfully deleted');
        } else{
            return redirect()->route('products.index')->with('error','Product Not Found');
        }
    }
}
