<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Order;
use App\Product;
use App\Size;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{

    public $productList;

    public function __construct()
    {
        /* $this->productList =  Cache::remember('productsCardCache', now()->addSeconds(5), function () {
            return [];
        }); */
    }





  /*   public function cache(Request $request)
    {
        if (!$request->session()->has('productsCardSession')) {
            $request->session()->put('productsCardSession', []);
        }
        $product = Product::with('sizes')->findOrFail($request->product_id);
        if (isset($request->size)) {
            $size = Size::findOrFail($request->size);
            $product->setRelation('sizes', $size);
        }

        $product->quantity = $request->quantity;

        $request->session()->push('productsCardSession', $product);
    } */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.cart');
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

    public function listNotConfirmed()
    {
        $orders = Order::whereHas('status', function($q){
            $q->where('label','not confirmed');
        })->get();
        return view('backoffice.orders.notconfirmed.list',[
            'orders' => $orders
        ]);
    }
    public function listConfirmed()
    {
        $orders = Order::whereHas('status', function($q){
            $q->where('label','confirmed');
        })->get();
        return view('backoffice.orders.confirmed.list',[
            'orders' => $orders
        ]);
    }
    public function listInprogress()
    {
        $orders = Order::whereHas('status', function($q){
            $q->where('label','in progress');
        })->get();
        return view('backoffice.orders.inprogress.list',[
            'orders' => $orders
        ]);
    }
    public function listCanceled()
    {
        $orders = Order::whereHas('status', function($q){
            $q->where('label','canceled');
        })->get();
        return view('backoffice.orders.canceled.list',[
            'orders' => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statut = Status::where('label', 'not confirmed')->first();
        $products = session()->get('productsCardSession');
        $order = new Order();
        $total_price = 0;
        foreach ($products as $key => $value) {
            $total_price += (($value->new_price ?? $value->unit_price) * $value->quantity);
        }
        $order->total_price = $total_price;
        $order->user_id = 1;
        $order->shipping_address = "Meknes";
        $order->status_id = $statut->id;
        $order->save();
        //$productsIds_array  = [];

        foreach ($products as $key => $value) {
            $order->products()->attach($value->id, ['price' => $value->new_price ?? $value->unit_price, 'quantity' => $value->quantity]);
            //array_push($productsIds_array, $value->id);
        }

        // $order->products()->attach($productsIds_array);
        session()->forget('productsCardSession');
        session()->flash('status', 'product was commanded, your order is added successfully, you will be contacted by our support');
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        //dd($order->products);
        return view('backoffice.orders.partials.show',[
            'order' => $order
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
        $order = Order::findOrFail($id);
        return view('backoffice.orders.partials.edit', [
            'order' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->shipping_address = $request->shipping_address;
        $order->total_price = $request->total_price;

        $order->save();

        session()->flash('status', 'Order was updated successfully');
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
        $order = Order::findOrFail($id);
       
        $order->delete();
        session()->flash('status', 'Order was deleted !');
        return true;
    }

    public function updateStatut(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = Status::where('label',$request->status)->firstOrFail();
        
        $order->status_id = $status->id;
        $order->save();
        session()->flash('status','Order was updated to '. $status->label);
    }
}
