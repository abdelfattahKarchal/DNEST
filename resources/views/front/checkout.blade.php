@extends('layout.app')

@section('content')
@php
    $sum = 0;
    @endphp
        <!-- Begin Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Confirmation</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Acceuil</a></li>
                        <li class="active">confirmation</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
       <!-- Begin Checkout Area -->
    <div class="checkout-area">
        <div class="container">
            @if (session()->has('status'))
                <div class="text-center" style="margin: 50px;">
                    <img class="mb-4" width="100px" src="{{asset("front/assets/images/order.png")}}" />
                    <h5 class="text-muted">La commande a été enregistrée avec succès</h5>
                    <ul class="mt-3">
                        <li>Vous recevrez un email de votre visite</li>
                        <li>Merci de votre confiance à très bientôt</li>
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
                                        <h3>DÉTAILS DE LA FACTURATION</h3>
                                        <div class="mt-4 row">
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label for="first_name">Prénom <span style="color:red;">(*)</span></label>
                                                    <input name="first_name" type="text"
                                                        class="form-control @error('first_name') is-invalid @enderror"
                                                        value="{{ old('first_name') ?? (Auth()->user()->name ?? '') }}">
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Nom <span style="color:red;">(*)</span></label>
                                                    <input 
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" type="text"
                                                    value="{{ old('last_name') ?? (Auth()->user()->lname ?? '') }}">
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Adresse <span style="color:red;">(*)</span></label>
                                                    <input 
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" type="text"
                                                    value="{{ old('address') ?? (Auth()->user()->address ?? '')}}">
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <input name="address_2" placeholder="Appartement, suite, unité etc. (facultatif)"
                                                        type="text">
                                                </div>
                                            </div>
                                           {{--  <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>City <span style="color:red;">(*)</span></label>
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
                                                    <label>Postcode / Zip <span style="color:red;">(*)</span></label>
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
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Email <span style="color:red;">(*)</span></label>
                                                    <input
                                                    class="form-control @error('email') is-invalid @enderror"  
                                                    name="email" placeholder="" type="email"
                                                    value="{{ old('email') ?? (Auth()->user()->email ?? '') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Télèphone <span style="color:red;">(*)</span></label>
                                                    <input
                                                    class="form-control @error('phone') is-invalid @enderror"  
                                                    name="phone" type="text"
                                                    value="{{ old('phone') ?? (Auth()->user()->phone ?? '') }}">
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
                                        <h3>VOTRE COMMANDE</h3>
                                        <div class="your-order-table table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="padding:12px;" class="cart-product-name text-left"><strong>Article</strong></th>
                                                        <th style="padding:12px;" class="cart-product-total"><strong>Prix</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Session::get('productsCardSession') as $order_product)
                                                        <tr class="cart_item">
                                                            <td class="cart-product-name text-left">
                                                                {{ $order_product->product->name }}<strong
                                                                    class="product-quantity">
                                                                    × {{ $order_product->quantity }}</strong>
                                                                    @if($order_product->size) 
                                                                       <br>
                                                                            Taille : {{ $order_product->size}}
                                                                    @endif
                                                                    <br>
                                                                            Matière : {{ $order_product->material}} 
                                                                </td>
                                                            <td class="cart-product-total text-center"><span
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
                                                        <th>Sous-total du panier</th>
                                                        <td class="text-center"><span class="amount">{{$sum}} MAD</span></td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Total de la commande</th>
                                                        <td class="text-center"><strong><span class="amount">{{$sum}} MAD</span></strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="payment-method">
                                            <div class="payment-accordion">
                                                <div class="order-button-payment">
                                                    <input value="Passer la commande" type="submit">
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
    <!-- Checkout Area End Here -->

@endsection