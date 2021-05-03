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
                            <form action="{{ route('orders.store') }}" method="POST">
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
                                                        <a href="javascript:void(0)" onclick="deleteProductCart({{ $order_product->product->id }}, '{{ $order_product->material }}')" class="text-danger">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
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
                                                    <select onchange="udpdateQte({{ $order_product->product->id }},'{{ $order_product->material }}')" name="quantity_selected_{{ $order_product->product->id }}_{{ $order_product->material }}" id="quantity_selected_{{ $order_product->product->id }}_{{ $order_product->material }}" class="nice-select" style="border-radius: 0px !important;">
                                                        @for($i=1; $i<=10; $i++)
                                                            <option {{ $order_product->quantity == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                        @if($order_product->quantity > 10)
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
                                    <div class="col-md-2 ml-auto text-right">
                                        <div class="cart-page-total">
                                            <button type="submit" id="commadNow-btn" class="hiraola-login_btn">Checkout</button>
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
            $.ajax({
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'carts/' + idProduct + '/material/'+ material +'/delete',
                success: function(data) {
                    location.reload();
                }
            });
        }


// change quantity value
function udpdateQte(product_id, material) {

    var quantity = $('#quantity_selected_'+product_id+'_'+material).val();
    
    if (quantity > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'carts/quantity/update',
            data: {
                'quantity': quantity,
                'productId': product_id,
                'material': material
            },
            success: function(data) {
                location.reload();
            }
        });
    }
  }
  
      
    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
