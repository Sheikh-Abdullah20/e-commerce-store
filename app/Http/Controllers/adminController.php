<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        // return $categories->count();
        return view('admin.index', compact('categories','products'));
    }
}
