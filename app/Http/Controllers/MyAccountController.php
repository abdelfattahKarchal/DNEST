<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('front.login.login');
        }
        $my_orders = Order::where('user_id', Auth::user()->id)
        ->with('products')
        ->orderBy('id', 'desc')
        ->get();
        return view('front.myaccount', [
            'my_orders' => $my_orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => 'required',
            'phone' => 'required',
            'old_password' => 'nullable',
            'new_password' => 'bail|nullable|min:8|different:old_password',
            'confirmation_password' => 'nullable|same:new_password',
        ]);
        // check email if exist
        $user = User::findOrFail($id);
        if ($user->email != $request->email) {
            $user_email = User::where('email',$request->email)->first();

            if ($user_email) {
                return response()->json(array(
                    'code'      =>  401,
                    'message'   =>  'email already exist'
                ), 401);
            }else{
                $user->email = $request->email;
            }
        }
        if ($request->old_password || $request->new_password) {
            if (!Hash::check($request->old_password, Auth::user()->password)) {
                return response()->json(array(
                    'code'      =>  401,
                    'message'   =>  'current password is incorrect'
                ), 401);
            }else{
                $user->password = Hash::make($request->new_password);
            }
        }
        
        if ($request->shipping_address) {
            $user->shipping_address = $request->shipping_address;
        }
        $user->address = $request->address;
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        return $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Change address.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /*  public function address(Request $request, $id)
    {
        $request->validate([
            'address' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->address = $request->address;
        if ($request->shipping_address) {
            $user->shipping_address = $request->shipping_address;
        }

        return $user->save();
    } */
}
