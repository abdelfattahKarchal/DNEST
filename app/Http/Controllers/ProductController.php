<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $product = Product::findOrFail($id);
        return view('front.single-product',[
            'product' => $product
        ]);
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
        //
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

    public function productsBySubCategoryId($id)
    {
        ///if(isset($id)){

       // }

        $subCategory = SubCategory::findOrFail($id);
       // dd($subCategory);
       // dd($subCategory->products()->paginate(2));
        // a extarnaliser vers view composer
        $collections = Collection::with(['categories','categories.subCategories','categories.subCategories.products'])->get();

            return [
                'products'=>$subCategory->products,
                //'collections'=>$collections,
            ];

        /* return view('front.shop-left-sidebar',[
            'products' => $subCategory->products()->paginate(4),
            'collections'=> $collections
        ]); */
    }

    public function search(Request $request)
    {
        $products = DB::table('products')
                    ->where('name','like','%'.$request->name.'%')
                    ->get();
       return $products;
    }

}
