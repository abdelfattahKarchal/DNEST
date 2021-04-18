<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collection;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->authorize('index', new Category());
        $categories = Category::all();
        return view('backoffice.categories.list',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Category());
        return view('backoffice.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', new Category());
        $collection = Collection::findOrFail($request->collection);
       
       $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'collection_id' => $collection->id,
            'active' => 0
        ]);
        session()->flash('status','category add successfully');
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
        $this->authorize('update', new Category());
        $category = Category::findOrFail($id);
        return view('backoffice.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $this->authorize('update', new Category());
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->collection_id = $request->collection;
        $category->description = $request->description;

        $category->save();

        session()->flash('status', 'Category was updated successfully');
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
        $this->authorize('delete', new Category());
        $category = Category::findOrFail($id);
       
        $category->delete();
        session()->flash('status', 'category was deleted !');
        return true;
    }

    public function active(Request $request, $id)
    {
        $this->authorize('active', new Collection());
        $category = Category::findOrFail($id);
        $category->active = $request->active== 'true' ? 1 : 0;
        $category->save();
    }
}
