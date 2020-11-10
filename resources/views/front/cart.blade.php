@extends('layouts.app')

@section('content')
    @php
    $sum = 0;
    @endphp
    <!-- Begin DENEST Cart Area -->
    <div class="hiraola-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12" id="cartDiv">
                    @if (session()->has('status'))
                        <div class="alert alert-info" role="alert">
                            <strong>Info : </strong> {{ session()->get('status') }}
                        </div>
                    @else
                        @if (session()->has('productsCardSession') && count(Session::get('productsCardSession')))
                            <form action="javascript:void(0)">
                                @csrf
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
                                            @foreach (Session::get('productsCardSession') as $product)
                                                <tr>
                                                    {{-- javascript:void(0)
                                                    --}}
                                                    <td class="hiraola-product-remove"><a
                                                            onclick="deleteProductCart({{ $product->id }})"
                                                            href="javascript:void(0)"><i class="fa fa-trash"
                                                                title="Remove"></i></a></td>
                                                    <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img
                                                                width="90px" height="115px"
                                                                src="{{ $product->path_small_1 }}"
                                                                alt="{{ $product->name }}"></a></td>
                                                    <td class="hiraola-product-name"><a
                                                            href="javascript:void(0)">{{ $product->name }}</a>
                                                    </td>
                                                    <td class="hiraola-product-price"><span
                                                            class="amount">${{ $product->new_price ?? $product->unit_price }}</span>
                                                    </td>
                                                    <td class="quantity">
                                                        <div class="form-group row d-flex justify-content-center">
                                                            <div class="col-sm-6">
                                                                <input onchange="updateQuantity({{ $product->id }}, this)"
                                                                    class="form-control quantite"
                                                                    data-id="{{ $product->id }}" type="number" min="1"
                                                                    value="{{ $product->quantity }}">
                                                            </div>
                                                        </div>

                                                        {{-- <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" data-id="{{ $product->id }}"
                                                                name="qte-{{ $product->id }}"
                                                                value="{{ $product->quantity }}" type="number">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                            </div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>

                                                        </div> --}}
                                                    </td>
                                                    <td class="product-subtotal"><span
                                                            class="amount">${{ $product->quantity * ($product->new_price ?? $product->unit_price) }}</span>
                                                    </td>
                                                    @php
                                                    $sum += ($product->quantity * ($product->new_price ??
                                                    $product->unit_price))
                                                    @endphp

                                                </tr>
                                            @endforeach (Session::get('productsCardSession') as $product)
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                                    placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon"
                                                    type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>

                                                <li>Total <span>${{ $sum }}</span></li>
                                            </ul>
                                            <a id="commadNow-btn" href="javascript:void(0)">Command now</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="text-center">
                                <h1 class="text-muted"> Add products in your cart</h1>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- DNEST Cart Area End Here -->
@endsection
@section('js')
    <script>
        function deleteProductCart(idProduct) {
            $.ajax({
                type: 'GET',
                url: 'carts/' + idProduct + '/delete',
                success: function(data) {
                    $("#cartDiv").load(location.href + " #cartDiv");
                }
            });
        }

        // change quantity value
        function updateQuantity(productId, obj) {

            var quantity = obj.value;
            if (quantity > 0) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: 'carts/quantity/update',
                    data: {
                        'quantity': quantity,
                        'productId': productId
                    },
                    success: function(data) {
                        $("#cartDiv").load(location.href + " #cartDiv");
                    }
                });
            }

        }

        // add command 

        $('#commadNow-btn').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'do you really want to place this order ?',
                showCancelButton: true,
                confirmButtonText: `Save`,
                confirmButtonColor: '#a5dc86',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route('orders.store') }}",
                        success: function(data) {
                            if (data) {
                                $("#cartDiv").load(location.href + " #cartDiv");
                            }
                        }
                    });
                    //Swal.fire('Saved!', '', 'success')
                }
            });
            //confirm("do you really want to place this order ?");
        });

    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
