@extends('layout.app')

@section('content')
@php
    $sum = 0;
    @endphp
        <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Checkout</h2>
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
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="javascript:void(0)">
                            <div class="checkbox-form">
                                <h4 class="text-uppercase">Billing Details</h4>
                                <hr/>
                                <div class="mt-4 row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>City <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h4 class="text-uppercase">Your order</h4>
                            <hr/>
                            <div class="mt-4 your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="padding:12px;" class="cart-product-name text-left"><strong>Product</strong></th>
                                            <th style="padding:12px;" class="cart-product-total"><strong>Total</strong></th>
                                        </tr>
                                    </thead>
                                    @foreach (Session::get('productsCardSession') as $order_product)
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="cart-product-name text-left">{{$order_product->product->name}}<strong class="product-quantity">
                                                × {{$order_product->quantity}}</strong></td>
                                                <td class="cart-product-total text-center"><span class="amount">{{$order_product->price}} MAD</span></td>
                                            </tr>
                                        </tbody>

                                        @php
                                            $sum += ($order_product->quantity * $order_product->price)
                                        @endphp

                                    @endforeach
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td class="text-center"><span class="amount">{{$sum}} MAD</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td class="text-center"><strong><span class="amount">{{$sum}} MAD</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Checkout Area End Here -->

@endsection