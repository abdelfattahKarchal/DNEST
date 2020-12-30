<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Collection;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* public function index()
    {
        return view('home');
    } */
    public function index()
    {
        if (!session()->has('productsCardSession')) {
            session()->put('productsCardSession', []);
        }

        if (!session()->has('newsletter')) {
            session()->put('newsletter', 'newsletter');
        }

        $newProducts = Product::lastProducts()->take(10)->get();
        $newCollections = Collection::where('active',1)->orderBy('created_at','desc')->get()->take(5);
        $latestBlogs = Blog::lastBlogs()->take(10)->get();
        return view('front.index',[
            'newCollections' => $newCollections,
            'newProducts' => $newProducts,
            'latestBlogs' => $latestBlogs
        ]);
    }
}
