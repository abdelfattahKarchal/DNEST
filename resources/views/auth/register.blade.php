


@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center" style="margin: 50px;">
        <div class="mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4 p-5" style="border: 1px solid #e5e5e5; background-color: #f4f4f4;">
            <!-- Login Form s-->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3 class="register-title text-center" style="">S'inscrire</h3>
                <p style="font-size: 14px;" class="mb-5 text-center">Nouveau ici! Inscrivez vous.</p>
                    <div class="row">
                        <div class="col-md-6 col-12 mb--20 form-group">
                            {{-- <label for="name">{{ __('Name') }}</label> --}}
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Prénom" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-md-6 col-12 mb--20 form-group">
                            {{-- <label for="lname">Last name</label> --}}
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"
                            name="lname" value="{{ old('lname') }}" placeholder="Nom" required autocomplete="lname" autofocus>

                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="col-md-12 col-12 mb--20 form-group">
                            {{-- <label for="phone">Phone</label> --}}
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" placeholder="Télèphone" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            {{-- <label for="email">Email Address</label> --}}
                            <input id="email" type="email" placeholder="Adresse E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            {{-- <label for="address">Address</label> --}}
                            <input id="address" type="address" placeholder="Adresse personnel" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            {{-- <label for="shipping_address">Shipping Address</label> --}}
                            <input id="shipping_address" type="shipping_address" placeholder="Adresse de livraison" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value="{{ old('shipping_address') }}"  autocomplete="shipping_address">

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            {{-- <label for="password">Password</label> --}}
                            <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            {{-- <label for="password_confirmation">Confirm Password</label> --}}
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmez le mot de passe" required autocomplete="new-password">

                        </div>

                        <div class="col-12 mt-4 mb-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn">S'inscrire</button>
                        </div>

                        <div class="col-md-12 text-center">
                            <div style="font-size: 14px;">
                                Vous avez déjà un compte ? <a href="{{ route('login') }}">
                                    Connectez-vous ici
                                </a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@endsection
