<?php

namespace App\Http\Controllers;

use App\Product;
use App\Size;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function store(Request $request)
    {
        /* if (!$request->session()->has('productsCardSession')) {
            $request->session()->put('productsCardSession', []);
        } */
        $product = Product::with('sizes')->findOrFail($request->product_id);
        if (isset($request->size)) {
            $size = Size::findOrFail($request->size);
            $product->setRelation('sizes', $size);
        }
        $price = $product->new_price == 0 ? null : $product->new_price;
        $product->new_price = $price ?? $product->unit_price;
        
        $product->quantity = $request->quantity ?? 1;

        $request->session()->push('productsCardSession', $product);
        return $request->session()->get('productsCardSession');
    }
    public function delete($id)
    {
        $products = session()->pull('productsCardSession');
        foreach ($products as $productkey => $value) {
            if ($value->id == $id) {
                unset($products[$productkey]);
            }
        }
        //session()->forget('productsCardSession');
        session()->put('productsCardSession', $products);
    }

    public function updateQuantity(Request $request)
    {
        $products = session()->pull('productsCardSession');
        foreach ($products as $productkey => $value) {
            if ($value->id == $request->productId) {
                $value->quantity = $request->quantity;
            }
        }

        session()->put('productsCardSession', $products);
    }
}
