<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        //dd('dddd');
        if('customer' === Auth::user()->role->label){
            return redirect()->route('index');
        }
        $this->authorize('admin.dashboard');
        return view('backoffice.index');
    }
}
