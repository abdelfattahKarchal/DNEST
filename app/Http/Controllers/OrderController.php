<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Order;
use App\Product;
use App\Size;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->only(['listNotConfirmed', 'listConfirmed', 'listInprogress', 'listCanceled', 'show', 'edit', 'update', 'destroy', 'updateStatut']);
    }



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
        $this->authorize('listNotConfirmed', new Order());
        $orders = Order::whereHas('status', function($q){
            $q->where('label','not confirmed');
        })->get();
        return view('backoffice.orders.notconfirmed.list',[
            'orders' => $orders
        ]);
    }
    public function listConfirmed()
    {
        $this->authorize('listConfirmed', new Order());
        $orders = Order::whereHas('status', function($q){
            $q->where('label','confirmed');
        })->get();
        return view('backoffice.orders.confirmed.list',[
            'orders' => $orders
        ]);
    }
    public function listInprogress()
    {
        $this->authorize('listInprogress', new Order());
        $orders = Order::whereHas('status', function($q){
            $q->where('label','in progress');
        })->get();
        return view('backoffice.orders.inprogress.list',[
            'orders' => $orders
        ]);
    }
    public function listCanceled()
    {
        $this->authorize('listCanceled', new Order());
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
        if (!Auth::check()) {
            $request->session()->put('url.intended', url('/checkout'));
            return redirect()->to('/login');
        }
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        $statut = Status::where('label', 'not confirmed')->first();
        $orders_products = session()->get('productsCardSession');
        $order = new Order();
        $order->total_price  = 0;
        foreach ($orders_products as $key => $value) {
            $order->total_price  += ($value->price * $value->quantity);
        }
        $order->user_id = Auth::user()->id;
        $order->shipping_address = $request->address;
        $order->fname = $request->first_name;
        $order->lname = $request->last_name;
        $order->city = $request->city;
        $order->postcode = $request->postcode;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->status_id = $statut->id;
        if ($request->address_2) {
            $order->shipping_address_2 = $request->address_2;
        }
        $order->save();
        //$productsIds_array  = [];

        foreach ($orders_products as $key => $value) {
            $order->products()->attach($value->product->id, ['price' => $value->price, 'quantity' => $value->quantity, 'material' => $value->material]);
            //array_push($productsIds_array, $value->id);
        }

        Mail::to('abdelfattah59@gmail.com')->send(new OrderConfirmationMail($order));

        // $order->products()->attach($productsIds_array);
        session()->forget('productsCardSession');
        session()->flash('status', 'order was commanded, your order is added successfully, you will be contacted by our support');
        
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
        $this->authorize('create', new Order());
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
        $this->authorize('update', new Order());
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
        $this->authorize('update', new Order());
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
        $this->authorize('delete', new Order());
        $order = Order::findOrFail($id);
       
        $order->delete();
        session()->flash('status', 'Order was deleted !');
        return true;
    }

    public function updateStatut(Request $request, $id)
    {
        $this->authorize('updateStatut', new Order());
        $order = Order::findOrFail($id);
        $status = Status::where('label',$request->status)->firstOrFail();
        
        $order->status_id = $status->id;
        $order->save();
        session()->flash('status','Order was updated to '. $status->label);
    }
}
