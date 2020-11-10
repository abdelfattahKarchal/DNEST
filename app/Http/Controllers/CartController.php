<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
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
