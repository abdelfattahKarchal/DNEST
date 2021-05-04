


@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center mb-lg-1">
        <div class=" mt-2 col-sm-12 col-md-12 col-xs-12 col-lg-6">
            <!-- Login Form s-->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-4 mb-4">
                    <h3 class="mb-4 register-title" style="">Register</h3>
                    <div class="row" style="padding: 0 0 0 8px;">
                        <div class="col-md-6 col-12 mb--20 form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-md-6 col-12 mb--20 form-group">
                            <label for="lname">Last name</label>
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"
                            name="lname" value="{{ old('lname') }}" placeholder="Last name" required autocomplete="lname" autofocus>

                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="col-md-12 col-12 mb--20 form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="address">Address</label>
                            <input id="address" type="address" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="shipping_address">Shipping Address</label>
                            <input id="shipping_address" type="shipping_address" placeholder="Shipping Address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value="{{ old('shipping_address') }}"  autocomplete="shipping_address">

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">

                        </div>

                        <div class="col-12 mt-4 mb-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn" style="display: inline !important;">{{ __('Register') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
