@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center" style="margin: 50px;">
        <div class="mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4 p-5" style="border: 1px solid #e5e5e5; background-color: #f4f4f4;">
            <!-- Login Form s-->
            <form class="contact-form"  method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="register-title text-center" style="">Sign In</h3>
                <p style="font-size: 14px;" class="mb-5 text-center">Welcome back! Please sign in to your account.</p>
                    <div class="row">
                        <div class="col-md-12 col-12 form-group">
                            {{-- <label for="email">E-Mail address</label> --}}
                            <input id="email" type="email" placeholder="E-Mail address"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb--20 form-group">
                            {{-- <label for="password">Password</label> --}}
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 text-center">
                            @if (Route::has('password.request'))
                                <div class="forgotton-password_info">
                                    <a style="font-size: 14px;" href="{{ route('password.request') }}">
                                        Forgot your Password ?
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="col-12 mt-4 mb-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn">Sign In</button>
                        </div>

                        <div class="col-md-12 text-center">
                            <div style="font-size: 14px;">
                                New here ? <a href="{{ route('register') }}">
                                    Sign Up instead
                                </a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@endsection
