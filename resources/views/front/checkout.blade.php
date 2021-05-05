@extends('layout.app')

@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Other</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Checkout Area -->
    <div class="checkout-area">
        <div class="container">
            @if (session()->has('status'))
                <div class="text-center" style="margin: 50px;">
                    <img class="mb-4" width="100px" src="{{asset("front/assets/images/order.png")}}" />
                    <h5 class="text-muted">Order was registered successfully</h5>
                    <ul class="mt-3">
                        <li>You will receive a confirmation email</li>
                        <li>Thank you for blablabla</li>
                    </ul>
                    <div class="mt-5 hiraola-btn-ps_center">
                        <a class="hiraola-btn" href="{{ url('/') }}">Shopping now</a>
                    </div>
                </div>
                @else
                    @if(session()->has('productsCardSession') && count(Session::get('productsCardSession')))
                    @php
                        $sum = 0;
                    @endphp
                        <form id="checkout-data" action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="checkbox-form">
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    {{-- <label>First Name <span class="required">*</span></label> --}}
                                                    <input name="first_name" placeholder="First name" type="text"
                                                        class="form-control @error('first_name') is-invalid @enderror"
                                                        value="{{ old('first_name') }}">
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    {{-- <label>Last Name <span class="required">*</span></label> --}}
                                                    <input 
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" placeholder="Last name" type="text"
                                                    value="{{ old('last_name') }}">
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input 
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" placeholder="Street address" type="text"
                                                    value="{{ old('address') }}">
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <input name="address_2" placeholder="Apartment, suite, unit etc. (optional)"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>City <span class="required">*</span></label>
                                                    <input
                                                    class="form-control @error('city') is-invalid @enderror" 
                                                    name="city" placeholder="" type="text"
                                                    value="{{ old('city') }}">
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Postcode / Zip <span class="required">*</span></label>
                                                    <input
                                                    class="form-control @error('postcode') is-invalid @enderror" 
                                                    name="postcode" placeholder="" type="text"
                                                    value="{{ old('postcode') }}">
                                                    @error('postcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input
                                                    class="form-control @error('email') is-invalid @enderror"  
                                                    name="email" placeholder="" type="email"
                                                    value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Phone <span class="required">*</span></label>
                                                    <input
                                                    class="form-control @error('phone') is-invalid @enderror"  
                                                    name="phone" type="text"
                                                    value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="your-order">
                                        <h3>Your order</h3>
                                        <div class="your-order-table table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="cart-product-name">Product</th>
                                                        <th class="cart-product-total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Session::get('productsCardSession') as $order_product)
                                                        <tr class="cart_item">
                                                            <td class="cart-product-name">
                                                                {{ $order_product->product->name }}<strong
                                                                    class="product-quantity">
                                                                    × {{ $order_product->quantity }}</strong></td>
                                                            <td class="cart-product-total"><span
                                                                    class="amount">{{ $order_product->quantity * $order_product->price }}
                                                                    MAD</span></td>
                                                        </tr>
                                                        @php
                                                            $sum += $order_product->quantity * $order_product->price;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Cart Subtotal</th>
                                                        <td><span class="amount">{{ $sum }} MAD</span></td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Order Total TTC</th>
                                                        <td><strong><span class="amount">{{ $sum }} MAD</span></strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="payment-method">
                                            <div class="payment-accordion">
                                                <div id="accordion">
                                                    <div class="card">
                                                        <div class="card-header" id="#payment-1">
                                                            <h5 class="panel-title">
                                                                <a href="javascript:void(0)" class="" data-toggle="collapse"
                                                                    data-target="#collapseOne" aria-expanded="true"
                                                                    aria-controls="collapseOne">
                                                                    Direct Bank Transfer.
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>Make your payment directly into our bank account. Please use your
                                                                    Order
                                                                    ID as the payment
                                                                    reference. Your order won’t be shipped until the funds have
                                                                    cleared in
                                                                    our account.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="#payment-2">
                                                            <h5 class="panel-title">
                                                                <a href="javascript:void(0)" class="collapsed"
                                                                    data-toggle="collapse" data-target="#collapseTwo"
                                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                                    Cheque Payment
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>Make your payment directly into our bank account. Please use your
                                                                    Order
                                                                    ID as the payment
                                                                    reference. Your order won’t be shipped until the funds have
                                                                    cleared in
                                                                    our account.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="#payment-3">
                                                            <h5 class="panel-title">
                                                                <a href="javascript:void(0)" class="collapsed"
                                                                    data-toggle="collapse" data-target="#collapseThree"
                                                                    aria-expanded="false" aria-controls="collapseThree">
                                                                    PayPal
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>Make your payment directly into our bank account. Please use your
                                                                    Order
                                                                    ID as the payment
                                                                    reference. Your order won’t be shipped until the funds have
                                                                    cleared in
                                                                    our account.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-button-payment">
                                                    <input value="Place order" type="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="text-center" style="margin: 50px;">
                            <img class="mb-4" width="100px" src="{{asset("front/assets/images/cart.png")}}" />
                            <h5 class="text-muted">Your cart is empty.</h5>
                            <ul class="mt-3">
                                <li>Explorez nos catégories et découvrez nos meilleures offres!</li>
                            </ul>
                            <div class="mt-5 hiraola-btn-ps_center">
                                <a class="hiraola-btn" href="{{ url('/') }}">Shopping now</a>
                            </div>
                        </div>
                    @endif
             @endif
        </div>
    </div>
    <!-- Hiraola's Checkout Area End Here -->

@endsection
