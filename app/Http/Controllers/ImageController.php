<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateImageRequest;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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
        $this->authorize('create', new Image());
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

        $image = Image::create([
            'path_small' => $file1_name,
            'path_large' => $file2_name,
            'product_id' => $request->product_id
        ]);
        
        $image->save();
        session()->flash('status', 'Image was saved successfully');
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
        $this->authorize('update', new Image());
        $image = Image::findOrFail($id);

        return view('backoffice.products.images.edit',[
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, $id)
    {
        $this->authorize('update', new Image());
        $image = Image::findOrFail($id);
        $hasFile1 = $request->hasFile('image1');
        $hasFile2 = $request->hasFile('image2');
        if ($hasFile1) {
            $file1 = $request->file('image1');

            if ($image->path_small) {
                Storage::delete($image->path_small);
            }
            $image->path_small= $file1->store('products');
        }
        if ($hasFile2) {
            $file2 = $request->file('image2');
            
            if ($image->path_large) {
                Storage::delete($image->path_large);
            }
            $image->path_large = $file2->store('products');
        }
        $image->save();
        session()->flash('status', 'Image was updated successfully');
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
        $this->authorize('delete', new Image());
        $image = Image::findOrFail($id);
       
        $image->delete();
        session()->flash('status', 'Image was deleted !');
        return true;
    }

    public function formImageToProduct($id)
    {
        $this->authorize('formImageToProduct', new Image());
        $product = Product::findOrFail($id);
        return view('backoffice.products.images.create',[
            'product_id' => $product->id
        ]);
    }
    public function active(Request $request, $id)
    { 
        $this->authorize('active', new Image());
        $image = Image::findOrFail($id);
        
        $image->active = $request->active== 'true' ? 1 : 0;
        $image->save();
    }
}
