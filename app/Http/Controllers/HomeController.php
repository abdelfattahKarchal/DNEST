<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Collection;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if (!session()->has('showNewsletter')) {
            session()->put('showNewsletter', true);
        }

        $newProducts = Product::lastProducts()->take(10)->get();
        $newCollections = Collection::where('active',1)->orderBy('created_at','desc')->get()->take(5);
        $latestBlogs = Blog::lastBlogs()->take(10)->get();

        $bestProduct = DB::table('order_product')
        ->select(array('products.id', DB::raw('COUNT(*) as best')))
        ->join('products', 'products.id', '=', 'order_product.product_id')
        ->groupBy('products.id')
        ->orderBy('best', 'desc')
        ->limit(10)
        ->get();
        $best_products = [];
        foreach($bestProduct as $item){
            $best_products[] = Product::find($item->id);
        }

        return view('front.index',[
            'newCollections' => $newCollections,
            'newProducts' => $newProducts,
            'latestBlogs' => $latestBlogs,
            'best_products' => $best_products
        ]);
    }
}
