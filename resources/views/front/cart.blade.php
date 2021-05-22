@extends('layout.app')
@section('style')
    <style>
        .nice-select{
            border-radius: 0px !important;
        }

        .nice-select .list{
            border-radius: 0px !important;
        }
    </style>
@endsection

@section('content')
    @php
    $sum = 0;
    @endphp
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>PANIER</h2>
                <ul>
                    <li><a href="index.html">Acceuil</a></li>
                    <li class="active">Panier</li>
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
                        {{-- <div class="text-center" style="margin: 50px;">
                            <img class="mb-4" width="100px" src="{{asset("front/assets/images/order.png")}}" />
                            <h5 class="text-muted">Order was registered successfully</h5>
                            <ul class="mt-3">
                                <li>You will receive a confirmation email</li>
                                <li>Thank you for blablabla</li>
                            </ul>
                            <div class="mt-5 hiraola-btn-ps_center">
                                <a class="hiraola-btn" href="{{ url('/') }}">Shopping now</a>
                            </div>
                        </div> --}}
                    @else
                    @if (session()->has('productsCardSession') && count(Session::get('productsCardSession')))
                    <h4 class="mb-4 text-uppercase">DÉTAILS DU PANIER ({{count(Session::get('productsCardSession'))}} article(s))</h4>
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <div style="border: 1px solid #e5e5e5; padding:30px;">
                                    @foreach (Session::get('productsCardSession') as $order_product)
                                        <div class="row">
                                            {{-- <a href="javascript:void(0)" onclick="deleteProductCart({{ $order_product->product->id }}, '{{ $order_product->material }}')" class="text-danger">
                                                <i class="fa fa-trash mr-2"></i>Delete
                                            </a> --}}
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col-1 my-auto">
                                                        <a href="javascript:void(0)" onclick="deleteProductCart({{ $order_product->product->id }}, '{{ $order_product->material }}')" class="text-danger">
                                                            <i class="fa fa-trash mr-2"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-3 my-auto">
                                                        <a href="{{ route('products.show', ['product' => $order_product->product->id]) }}"><img class="img-fluid"
                                                                src="{{ $order_product->product->url_1() }}"
                                                                alt="{{ $order_product->product->name }}"></a>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>Désignation</p>
                                                        <div class="my-auto">
                                                           <a href="{{ route('products.show', ['product' => $order_product->product->id]) }}"> <strong class="mb-3">{{ $order_product->product->name }}</strong> </a> 
                                                            @if($order_product->size && $order_product->size > 0)
                                                                <p>Taille : {{ $order_product->size }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 text-center">
                                                <p>Matière</p>
                                                <strong class="my-auto">{{ $order_product->material }}</strong>
                                            </div>
                                            <div class="col-2 text-center">
                                                <p>Quantité</p>
                                                <div class="my-auto">
                                                    <select class="nice-select small ml-5" style="border-radius: 0px !important;" onchange="udpdateQte({{ $order_product->product->id }},'{{ $order_product->material }}')" name="quantity_selected_{{ $order_product->product->id }}_{{ $order_product->material }}" id="quantity_selected_{{ $order_product->product->id }}_{{ $order_product->material }}">
                                                        @for($i=1; $i<=10; $i++)
                                                            <option {{ $order_product->quantity == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                        @if($order_product->quantity > 10)
                                                            <option value="{{ $order_product->quantity }}" selected>{{ $order_product->quantity }}</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            
                                            <div class="col-2 text-center">
                                                <p>Prix</p>
                                                <div class="my-auto">{{ $order_product->price }} MAD</div>
                                            </div>
                                            <div class="col-2 text-center">
                                                <p>Sous Total</p>
                                                <div class="my-auto">{{ $order_product->quantity * $order_product->price }} MAD</div>
                                            </div>
                                        </div>

                                        @if (!$loop->last)
                                            <hr/>
                                        @endif

                                        @php
                                            $sum += ($order_product->quantity * $order_product->price)
                                        @endphp
                                    @endforeach
                                </div>

                                <div class="mt-4" style="padding: 30px;">
                                    <div class="row">
                                        <div class="col-md-4 offset-8">
                                                <div class="row" >
                                                    <h4 class="mb-4 text-uppercase">Total DU PANIER</h4>
                                                </div>
                                                <div class="row" style="border: 1px solid #e5e5e5;">
                                                    <div class="col-6 pt-2 pb-2" style="border-right: 1px solid #e5e5e5;">
                                                        Sous Total
                                                    </div>
                                                    <div class="col-6 my-auto text-center">
                                                        <strong><span class="amount">{{ $sum }} MAD</span></strong>
                                                    </div>
                                                </div>
                                                <div class="row" style="border-right: 1px solid #e5e5e5; border-left: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
                                                    <div class="col-6 pt-2 pb-2" style="border-right: 1px solid #e5e5e5;">
                                                        Total
                                                    </div>
                                                    <div class="col-6 my-auto text-center">
                                                        <strong><span class="amount">{{ $sum }} MAD</span></strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 p-0 mt-3">
                                                        <button type="button" onclick="window.location.href='{{url('/checkout')}}';" class="hiraola-login_btn">VÉRIFIER</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="text-center" style="margin: 50px;">
                                <img class="mb-4" width="100px" src="{{asset("front/assets/images/cart.png")}}" />
                                <h5 class="text-muted">Votre panier est vide.</h5>
                                <ul class="mt-3">
                                    <li>Explorez nos catégories et découvrez nos meilleures offres!</li>
                                </ul>
                                <div class="mt-5 hiraola-btn-ps_center">
                                    <a class="hiraola-btn" href="{{ url('/') }}">Acheter maintenant</a>
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
// change quantity value
function udpdateSize(product_id, material) {

    var size = $('#size_selected_'+product_id+'_'+material).val();

    if (size > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'carts/size/update',
            data: {
                'size': size,
                'productId': product_id,
                'material': material
            },
            success: function(data) {
                //location.reload();
            }
        });
    }
  }


    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
