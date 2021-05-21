<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function store(Request $request)
    {
        $orderProductList = [];
        $orderProduct = new OrderProduct();

        $orderProduct->product = Product::with('sizes')->findOrFail($request->product_id);
        $orderProduct->material = $request->material;
       
        if ($request->size > 0) {
            $orderProduct->size = $request->size;
        }
        
        if ($request->material == 'gold') {
            $orderProduct->price = $orderProduct->product->new_price;
        }else {
            $orderProduct->price = $orderProduct->product->new_price_silver;
        }

        $orderProductList = $request->session()->get('productsCardSession');
        $isExist = false;
        if ($orderProductList) {
            foreach ($orderProductList as &$item) {
                if ($orderProduct->product->id == $item->product->id && $orderProduct->material == $item->material ) {
                    $item->quantity += 1;
                    $isExist = true;
                    break;
                }
            }
        }
        if (!$isExist) {
            $orderProduct->quantity = 1;
            $orderProductList[] = $orderProduct;
        }

         $request->session()->put('productsCardSession',$orderProductList);

        return $orderProductList;
    }
    
    public function delete($id, $material)
    {
        $order_products = session()->pull('productsCardSession');
        
        foreach ($order_products as $key=>$item) {
            if ($item->product->id == $id && $item->material == $material) {
                unset($order_products[$key]);
            break;
            }
        }
        session()->put('productsCardSession', $order_products);
    }

    public function updateQuantity(Request $request)
    {
        $orders_products = session()->pull('productsCardSession');
        foreach ($orders_products as &$item) {
            if ($item->product->id == $request->productId && $request->material == $item->material) {
                $item->quantity = $request->quantity;
            break;
            }
        }

        session()->put('productsCardSession', $orders_products);
    }

    public function updateSize(Request $request)
    {
        $orders_products = session()->pull('productsCardSession');
        foreach ($orders_products as &$item) {
            if ($item->product->id == $request->productId && $request->material == $item->material) {
                $item->size = $request->size;
            break;
            }
        }

        session()->put('productsCardSession', $orders_products);
    }
}
