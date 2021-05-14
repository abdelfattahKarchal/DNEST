<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backoffice.users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new User());
        $roles = Role::all();
        return view('backoffice.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'confirm' => 'bail|required',
            'email' => 'required|email|unique:users',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $this->authorize('create', new User());
        $role = Role::findOrFail($request->role);
       
       $user = User::create([
            'name' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'role_id' => $role->id,
            'password' =>  Hash::make($request->password),
            'active' => 1
        ]);
        session()->flash('status','User add successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', new User());
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('backoffice.users.edit', [
            'roles' => $roles,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', new User());
        $user = User::findOrFail($id);
        $request->validate([
            'confirm' => 'bail|required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'old_password' => 'nullable',
            'new_password' => 'bail|nullable|min:8|different:old_password',
            'confirmation_password' => 'nullable|same:new_password',
        ]);
        
        
        
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->role_id = $request->role;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        

        $user->save();

        session()->flash('status', 'Sub category was updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', new User());
        $user = User::findOrFail($id);
       
        $user->delete();
        session()->flash('status', 'User was deleted !');
        return true;
    }
}
