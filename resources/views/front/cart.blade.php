@extends('layout.app')

@section('content')
    @php
    $sum = 0;
    @endphp
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Single Product Style</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Single Product Tab Style Left</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Begin DENEST Cart Area -->
    <div class="hiraola-cart-area" id="cartDiv">
        <div class="container">
            <div class="row">
                <div class="col-12" >
                    @if (session()->has('status'))
                        <div class="alert alert-info" role="alert">
                            <strong>Info : </strong> {{ session()->get('status') }}
                        </div>
                    @else
                    {{-- {{ dd(Session::get('productsCardSession')) }} --}}
                        @if (session()->has('productsCardSession') && count(Session::get('productsCardSession')))
                            <form action="javascript:void(0)">
                                @csrf
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="hiraola-product-remove">Remove</th>
                                                <th class="hiraola-product-thumbnail">Images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="hiraola-product-price">Price</th>
                                                <th class="hiraola-product-quantity">Quantity</th>
                                                <th class="hiraola-product-quantity">Material</th>
                                                <th class="hiraola-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach (Session::get('productsCardSession') as $order_product)
                                                <tr>
                                                    {{-- javascript:void(0)
                                                    --}}
                                                    <td class="hiraola-product-remove"><a
                                                            onclick="deleteProductCart({{ $order_product->product->id }}, '{{ $order_product->material }}')"
                                                            href="javascript:void(0)"><i class="fa fa-trash"
                                                                title="Remove"></i></a></td>
                                                    <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img
                                                                width="90px" height="115px"
                                                                src="{{ $order_product->product->url_1() }}"
                                                                alt="{{ $order_product->product->name }}"></a></td>
                                                    <td class="hiraola-product-name"><a
                                                            href="javascript:void(0)">{{ $order_product->product->name }}</a>
                                                    </td>
                                                    <td class="hiraola-product-price"><span
                                                            class="amount">{{ $order_product->price }} MAD</span>
                                                    </td>
                                                    <td class="hiraola-product-price"><span
                                                        class="amount">{{ $order_product->material }}</span>
                                                </td>
                                                    <td class="quantity">
                                                        <div class="form-group row d-flex justify-content-center">
                                                            <div class="col-sm-6">
                                                                <input onchange="updateQuantity({{ $order_product->product->id }}, this)"
                                                                    class="form-control quantite"
                                                                    data-id="{{ $order_product->product->id }}" type="number" min="1"
                                                                    value="{{ $order_product->quantity }}">
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
                                                            class="amount">${{ $order_product->quantity * $order_product->price }}</span>
                                                    </td>
                                                    @php
                                                    $sum += ($order_product->quantity * $order_product->price)
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
                                            <a onclick="commandNow()" id="commadNow-btn" href="javascript:void(0)">Command now</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="col-lg-12 text-center">
                                <img style="margin-top: 50px;" src="{{asset("front/assets/images/test.png")}}" />
                                <h5 class="text-muted">Your cart is empty.</h5>
                                <ul class="mt-3">
                                    <li>Explorez nos catégories et découvrez nos meilleures offres!</li>
                                </ul>
                                <div class="mt-5 hiraola-btn-ps_center">
                                    <a class="hiraola-btn" href="{{ url('/') }}">Commencez vos achats</a>
                                </div>
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
        function deleteProductCart(idProduct, material) {
            var cardCount = parseInt($('.card-counter').text()[0]);
            $.ajax({
                type: 'GET',
                url: 'carts/' + idProduct + '/'+ material +'/delete',
                success: function(data) {
                    $("#cartDiv").load(location.href + " #cartDiv");
                    $('.card-counter').text(cardCount -1);
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
function commandNow () {
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
                                $('.card-counter').text(0);
                                $("#cartDiv").load(location.href + " #cartDiv");
                            }else{
                                window.location.href = "/loginForm";
                            }
                        }
                    });
                    //Swal.fire('Saved!', '', 'success')
                }
            });
 }


    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
