@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center mb-lg-1">
        <div class=" mt-2 col-sm-12 col-md-12 col-xs-12 col-lg-6">
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
                        <div class="col-md-8">
                            <div class="check-box">
                                <div class="forgotton-password_info">
                                <a href="{{ route('register.form') }}"> Register</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="forgotton-password_info">
                                <a href="#"> Forgotten password?</a>
                            </div>
                        </div>
                        
                        <div class="col-12 mt-4 mb-4 form-group">
                            <button type="submit" class="btn btn-primary form-control">
                               {{ __('Login') }}
                           </button>
                       </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
