<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class,'product_category_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'product_id');
    }
}
