<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    
    public function index()
    {
        $this->authorize('admin.dashboard');
        return view('backoffice.index');
    }
}
