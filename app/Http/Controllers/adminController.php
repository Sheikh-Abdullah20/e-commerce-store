<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $categories = Category::all();
        // return $categories->count();
        return view('admin.index', compact('categories'));
    }
}
