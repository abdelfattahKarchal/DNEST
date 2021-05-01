@extends('layout.app')

@section('content')
    @php
    $sum = 0;
    @endphp
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                @if (session()->has('productsCardSession'))
                    <h2>Shopping cart ({{count(Session::get('productsCardSession'))}} item(s))</h2>
                @else
                    <h2>Shopping cart (0 item(s))</h2>
                @endif
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Cart</li>
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
                                <div style="border: 1px solid #e5e5e5; padding:30px;">
                                    @foreach (Session::get('productsCardSession') as $order_product)
                                        <div class="row">
                                            <div class="col-4 my-auto">
                                                <div class="row">
                                                    <div class="col-3 my-auto">
                                                        <a href="javascript:void(0)"><img class="img-fluid"
                                                                src="{{ $order_product->product->url_1() }}"
                                                                alt="{{ $order_product->product->name }}"></a>
                                                    </div>
                                                    <div class="col-7 my-auto">
                                                        <p>Name</p>
                                                        <h6 class="mb-3">{{ $order_product->product->name }}</h6>
                                                        <p class="text-danger">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 my-auto">
                                                <p>Material</p>
                                                <h6>{{ $order_product->material }}</h6>
                                            </div>
                                            <div class="col-2 my-auto">
                                                <p>Quantity</p>
                                                <div>
                                                    <select class="nice-select" style="border-radius: 0px !important;">
                                                        @for($i=1; $i<=15; $i++)
                                                            <option {{ $order_product->quantity == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                        @if($order_product->quantity > 15)
                                                            <option value="{{ $order_product->quantity }}" selected>{{ $order_product->quantity }}</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2 my-auto">
                                                <p>Price</p>
                                                <h6>{{ $order_product->price }} MAD</h6>
                                            </div>
                                            <div class="col-2 my-auto">
                                                <p>Total</p>
                                                <h6>{{ $order_product->quantity * $order_product->price }} MAD</h6>
                                            </div>
                                        </div>
                                        <hr/>
                                        @php
                                            $sum += ($order_product->quantity * $order_product->price)
                                        @endphp
                                    @endforeach
                                        <div class="row" >
                                            <div class="col-10">
                                            </div>
                                            <div class="col-2 my-auto">
                                                <p>Total TTC</p>
                                                <h6 class="mt-2">{{ $sum }} MAD</h6>
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 ml-auto text-right">
                                        <div class="cart-page-total">
                                            <a onclick="commandNow()" id="commadNow-btn" href="javascript:void(0)">Checkout</a>
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
                                    <a class="hiraola-btn" href="{{ url('/') }}">Shopping now</a>
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
