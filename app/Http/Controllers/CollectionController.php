<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests\StoreCollection;
use App\Http\Requests\UpdateCollectionRequest;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // a extarnaliser vers view composer
        $collections = Collection::with(['categories', 'categories.subCategories', 'categories.subCategories.products'])->get();
        return view('front.shop-left-sidebar', [
            //'collections' => $collections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.collections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollection $request)
    {
        $hasFile1 = $request->hasFile('image1');
        $hasFile2 = $request->hasFile('image2');
        if ($hasFile1) {
            $file1 = $request->file('image1');
            $file1_name = $file1->store('collections');
            // dump($file1->store('collections'));
        }

        if ($hasFile2) {
            $file2 = $request->file('image2');
            $file2_name = $file2->store('collections');
            //dump($file2->store('collections'));
        }
        Collection::create([
            'name' => $request->name,
            'image1' => $file1_name,
            'image2' => $file2_name ?? null,
            'description' => $request->description,
        ]);

        session()->flash('status', 'collection add successfully');
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
        $collection = Collection::with('categories', 'categories.subCategories')->findOrFail($id);
        return $collection;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        return view('backoffice.collections.edit', [
            'collection' => $collection
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectionRequest $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->name = $request->name;

        $collection->description = $request->description;
        $hasFile1 = $request->hasFile('image1');
        $hasFile2 = $request->hasFile('image2');
        if ($hasFile1) {
            if ($collection->image1) {
                Storage::delete($collection->image1);
            }
            $file1 = $request->file('image1');
            $file1_name = $file1->store('collections');
            $collection->image1 = $file1_name;
        }

        if ($hasFile2) {
            if ($collection->image2) {
                Storage::delete($collection->image2);
            }
            $file2 = $request->file('image2');
            $file2_name = $file2->store('collections');
            $collection->image2 = $file2_name;
        }
        $collection->save();

        session()->flash('status', 'collection updated successfully');
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

        $collection = Collection::findOrFail($id);

        $collection->delete();
        session()->flash('status', 'collection was deleted !');
        return true;
    }


    public function productsByCollectionId($id)
    {
        $collection = Collection::find($id);
        return view(
            'front.shop-left-sidebar',
            [
                'products' => $collection->categories[0]->subCategories[0]->products,
                // 'collections' => Collection::all()
            ]
        );
    }

    public function active(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->active = $request->active == 'true' ? 1 : 0;
        $collection->save();
    }
}
