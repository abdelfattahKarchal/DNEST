<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::lastProducts()->take(10)->get();
        $newCollections = Collection::orderBy('created_at','desc')->get()->take(5);
        return view('front.index',[
            'newCollections' => $newCollections,
            'newProducts' => $newProducts
        ]);
    }
}
