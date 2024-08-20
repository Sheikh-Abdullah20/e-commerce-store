<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class userController extends Controller
{
    public function index(Request $request){
        $SelectedCategoryID = $request->category;
        $categories = Category::all();
        $products_In_Category = Category::with('products')->get();
        $products = Product::all();
        $id = Auth::user()->id;
        $user = User::find($id);
       
        return view('user.index',compact('categories','products_In_Category','products','user'));
        
    }

    public function categoryProducts($id){
        $auth_id = Auth::user()->id;
        $user = User::find($auth_id);
        $products_In_Category = Category::with('products')->whereHas('products', function ($query) use ($id) {
            $query->where('product_category_id',$id);
        })->get();
    // return $products_In_Category->first();
        return view('user.category_products',compact('products_In_Category','user'));
    }


    public function cart($id){
        $products = Product::limit(4)->get();
        $product = Product::find($id);
        // return $product;
        return view('user.cart',compact('product','products'));
    }


    public function search(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $SelectedCategoryID = $request->category;
        $searchQuery = $request->search;
        $categories = Category::all();
        $products_In_Category = Category::with('products')->get();
        $products = Product::when($SelectedCategoryID, function ($query) use ($SelectedCategoryID){
            $query->where('product_category_id', $SelectedCategoryID);
        })
        ->when($searchQuery, function ($query) use ($searchQuery){
            $query->where('product_name', 'like', '%' . $searchQuery . '%');
        })->get();
        return view('user.search',compact('categories','products_In_Category','products','SelectedCategoryID','searchQuery','user'));
    }



    public function account(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.myAccount',compact('user'));
    }

    public function updateAccount(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        if($user){

        if($request->hasFile('profile') && file_exists(public_path('storage/' . $user->profile))){
            $path  = public_path('storage/' . $user->profile);
            if(file_exists($path)){
                unlink($path);

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'profile' => $request->file('profile')->store('profile', 'public')
                ]);
                return redirect()->route('home')->with('success','profile Updated Successfully');

            }
     
        }else{
            if($request->hasFile('profile')){
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'profile' => $request->file('profile')->store('profile', 'public')
                ]);
                return redirect()->route('home')->with('success','profile Updated Successfully');
            }else{
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                return redirect()->route('home')->with('success','profile Updated Successfully');
            }
          
            }
            
        }else{
            return redirect()->route('home')->with('error','Something Went Wrong');
        }
    }


    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'current_password',
            'password' => 'required|min:8|confirmed',
        ]); 

        if(!Hash::check($request->current_password, Auth::user()->password)){
            return redirect()->back()->with('error','Current Password is not correct');
        }else{
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->update([
                'password' => $request->password
            ]);
            return redirect()->route('home')->with('success','Password Updated Successfully');
        }
    }

    // Startup Profile Checker
    public function profileCheck(Request $request){
        $request->validate([
            'profile' => 'required'
        ]);
        if($request->hasFile('profile')){
            $id = Auth::user()->id;
            $user = User::find($id);
            if($user){
               $update =  $user->update([
                    'profile' => $request->file('profile')->store('profile','public'),
                ]);
                if($update){
                    return redirect()->route('home')->with('success','Profile Has Been Added Successfully');
                }else{
                    return redirect()->route('home')->with('error','Something Went Wrong During Update');
                }
            }else{
                return redirect()->route('home')->with('error','Something Went Wrong');
            }
        }
    }

    public function subscriptionMail(Request $request){
        $request->validate([
            'subsriptionMail' => 'required|email'
        ]);
        $email = $request->subsriptionMail;
        $user = User::where('email',$email)->first();
        if($user){
            $subscription = Subscription::create([
                'email' => $request->subsriptionMail
            ]);
            if($subscription){
                $mail = Mail::to($email)->send(new SubscriptionMail);
                return redirect()->route('home')->with('success','Thanks for your subscription ' . Auth::user()->name);
            }else{
                return redirect()->route('home')->with('error','Something Went Wrong');
            }
        }else{
            return redirect()->route('home')->with('error','This Email is not registered Please Insert Registered Email Thanks..');
        }
    }



    public function orderplace(Request $request){
        $request->validate([
            'product_purchased_by' => 'required'
        ]);
        // return $request->all();
        $user_id = Auth::user()->id;
        $order = Order::create([
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'product_qty' => $request->product_qty,
            'product_purchased_by' => $request->product_purchased_by,
            'user_id' => $user_id
        ]);
        if($order){
            return redirect()->route('home')->with('success','Order Placed Successfully');
        }else{
            return redirect()->route('home')->with('error','Something Went Wrong During Placing An Order');
        }
    }



    public function myorder($id){
        $user = User::find($id);
        $orders = Order::with('product')->where('user_id',$id)->get();
        // foreach($orders as $order){
        //     $product_image = $order->product->product_image;
        //     return $product_image;
        // }
        return view('user.myOrders',compact('user','orders'));
    }
}
