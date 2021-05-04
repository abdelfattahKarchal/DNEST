@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center mb-lg-1">
        <div class=" mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4">
            <!-- Login Form s-->
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-4 mb-4">
                    <h3 class="mb-4 register-title" style="">Login</h3>
                    <div class="row">
                        <div class="col-md-12 col-12 form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" placeholder="Email Address"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb--20 form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" placeholder="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <div class="check-box">
                                <div class="forgotton-password_info">
                                <a href="{{ route('register') }}"> Register</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-5 text-md-right">
                            @if (Route::has('password.request'))
                                <div class="forgotton-password_info">
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif

                        </div>

                        <div class="col-12 mt-4 mb-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn" style="display: inline !important;">{{ __('Login') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
