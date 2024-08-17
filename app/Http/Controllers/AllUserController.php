<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AllUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = Auth::user()->email;
        $users = User::where('email','!=', $email)->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($user){
            $user->assignRole($request->role);
            return redirect()->route('users.index')->with('success','User Created Successfully');
        }else{
            return redirect()->route('users.index')->with('error','User Not Created');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
    
        $user = User::find($id);
        // return $user->roles->pluck('name')->implode('');
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   
        $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
        ]);

        $user = User::find($id);
        if($user){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if($request->filled('password')){
                $user->update([
                    'password' => $request->password
                ]);
            }
            if($request->filled('role')){
                $user->syncRoles($request->role);
            }
            return redirect()->route('users.index')->with('success','User has Been Updated Successfully'); 
        }else{
            return redirect()->route('users.index')->with('error','User Not Updated'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->route('users.index')->with('delete','User Deleted  Successfully');
        }else{      
            return redirect()->route('users.index')->with('error','User Not Deleted');
        }
    }
}
