<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreSubCategoryRequest;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories  = SubCategory::with('category')->has('category')->get();

        /* if (Category::all()->contains('id', 1)){
            echo 'ok';
        }
        //dump(array_values((array)Category::all()));
        die(); */
        //dd($subcategories);
        return view('backoffice.subcategories.list',[
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backoffice.subcategories.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $category = Category::findOrFail($request->category);
       
       $subcategory = SubCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $category->id,
            'active' => 0
        ]);
        session()->flash('status','Sub category add successfully');
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
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('backoffice.subcategories.edit', [
            'subcategory' => $subcategory,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubCategoryRequest $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->description = $request->description;

        $subcategory->save();

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
        $subcategory = SubCategory::findOrFail($id);
       
        $subcategory->delete();
        session()->flash('status', 'Sub category was deleted !');
        return true;
    }

    public function active(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->active = $request->active== 'true' ? 1 : 0;
        $subcategory->save();
    }
}
