<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    public function index(){
       $user = User::first();
    //    $auth = Auth::user();

    //    // Get the roles for the logged-in user
    //    $roles = $auth->roles->pluck('name');
       
    //    // Return the roles
    //    return $roles;
        return view('user.index');
    }
}
