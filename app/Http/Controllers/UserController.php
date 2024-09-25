<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('admin');
        return view('users.index',[
            'users'=> User::paginate(5),
            'title'=>'Users'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(User $user)
    {
        //
        Gate::authorize('admin');
        return view('users.show',[
            'title'=>'Detail User',
          'user'=>  $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        Gate::authorize('admin');
        return view('users.edit',[
            'title'=>'Edit User',
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        Gate::authorize('admin');
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'role'=>'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5'
        ]);
        $validatedData['password']= Hash::make($validatedData['password']);
        User::where('id',$user->id)->update($validatedData);
        return redirect('/users')->with('success','User has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
