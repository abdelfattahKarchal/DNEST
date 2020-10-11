@extends('layouts.app')

@section('content')
    <!-- Begin Hiraola's Cart Area -->
    <div class="hiraola-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="hiraola-product-remove">remove</th>
                                        <th class="hiraola-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="hiraola-product-price">Unit Price</th>
                                        <th class="hiraola-product-quantity">Quantity</th>
                                        <th class="hiraola-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (Cache::get('productsCardCache') as $product)
                                    <tr>
                                        <td class="hiraola-product-remove"><a href="javascript:void(0)"><i
                                                    class="fa fa-trash" title="Remove"></i></a></td>
                                        <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img
                                            width="90px"
                                            height="115px"
                                                    src="{{ $product->path_small_1}}"
                                                    alt="Hiraola's Cart Thumbnail"></a></td>
                                        <td class="hiraola-product-name"><a href="javascript:void(0)">{{$product->name}}</a>
                                        </td>
                                        <td class="hiraola-product-price"><span class="amount">${{$product->new_price ?? $product->unit_price}}</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$product->quantity}}" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                    <td class="product-subtotal"><span class="amount">${{$product->quantity * $product->new_price}}</span></td>
                                    </tr>
                                    @empty
                                    <span class="text-muted"> Add product in your cart</span>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>

                                        <li>Total <span>$118.60</span></li>
                                    </ul>
                                    <a href="javascript:void(0)">Command Now</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Cart Area End Here -->
@endsection
