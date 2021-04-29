<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ServerBag;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'productsBySubCategoryId', 'search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', new Product());
        $products = Product::with('subCategory', 'subCategory.category', 'subCategory.category.collection')->get();
        /*  foreach ($products as $product) {
            if($product->subCategory->category ==null)
           dump($product->subCategory->id);
        }
        die(); */
        //dd($products[0]->subCategory->category->name);
        return view('backoffice.products.list', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Product());
        $subcategories = SubCategory::all();
        return view('backoffice.products.create',[
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', new Product());
        $hasFile1 = $request->hasFile('image1');
        $hasFile2 = $request->hasFile('image2');
        if ($hasFile1) {
            $file1 = $request->file('image1');
           $file1_name= $file1->store('products');
           // dump($file1->store('collections'));
        }

        if ($hasFile2) {
            $file2 = $request->file('image2');
            $file2_name = $file2->store('products');
            //dump($file2->store('collections'));
        }
        $product = Product::create([
            'name' => $request->name,
            'sub_category_id' => $request->subcategory,
            'price' => $request->price,
            'new_price' => $request->new_price,
            'quantity' => $request->quantity,
            'path_small_1' => $file1_name,
            'path_small_2' => $file2_name,
            'description' => $request->description,
        ]);
        session()->flash('status','Product add successfully');
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
        //$product = Product::findOrFail($id);
        $product = Product::where('active',1)->with(['images'=> function($q){
            $q->where('active', '=', 1);
            $q->where('material', '=', 'gold');
        }])->findOrFail($id);
        return view('front.single-product', [
            'product' => $product,
            'material' => 'gold'
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
        $this->authorize('update', new Product());
        $product = Product::with('subCategory', 'subCategory.category', 'subCategory.category.collection')->findOrFail($id);

        $subcategories = SubCategory::all();
        return view('backoffice.products.edit', [
            'product' => $product,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->authorize('update', new Product());
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->quantity = $request->quantity;

        $product->sub_category_id = $request->subcategory;
        $product->description = $request->description;

        $hasFile1 = $request->hasFile('image1');
        $hasFile2 = $request->hasFile('image2');
        if ($hasFile1) {
            $file1 = $request->file('image1');

            if ($product->path_small_1) {
                Storage::delete($product->path_small_1);
            }
            $product->path_small_1= $file1->store('products');
        }


        if ($hasFile2) {
            $file2 = $request->file('image2');

            if ($product->path_small_2) {
                Storage::delete($product->path_small_2);
            }
            $product->path_small_2 = $file2->store('products');
        }
        $product->save();
        session()->flash('status', 'Product was updated successfully');
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
        $this->authorize('delete', new Product());
        $product = Product::findOrFail($id);

        $product->delete();
        session()->flash('status', 'Product was deleted !');
        return true;
    }

    public function productsBySubCategoryId($id)
    {
        $subCategory = SubCategory::with('products')->find($id);
        $products = $subCategory->products()->where('active', 1);
        return view('front.shop-left-sidebar',[
            'products' => $products->paginate(Config::get('constants.options.option_product_pagination', 10)),
            'sessionProducts' => session()->get('productsCardSession'),
            'collection_name' => $subCategory->category->collection->name
        ]);
    }

    public function search(SearchRequest $request)
    {
        $products = Product::where('name', 'like', '%' . $request->product_name . '%')
            ->where('active',1)
            ->get();
            return view('front.shop-left-sidebar',[
                'products' => $products,
                'sessionProducts' => session()->get('productsCardSession'),
                'productName' => $request->product_name,
                'collection_name' => $request->collection_name
            ]);
    }

    public function active(Request $request, $id)
    {
        $this->authorize('active', new Product());
        $product = Product::findOrFail($id);

        $product->active = $request->active== 'true' ? 1 : 0;
        $product->save();
    }

    public function imagesByProductId($id)
    {
        $this->authorize('imagesByProductId', new Product());
        $product = Product::with('images')->findOrFail($id);
        return view('backoffice.products.images.list',[
            'product' => $product
        ]);
    }
}
