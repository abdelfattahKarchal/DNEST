@extends('layout.app')

@section('content')
    <div class="row d-flex justify-content-center" style="margin: 50px;">
        <div class=" mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4 p-5" style="border: 1px solid #e5e5e5; background-color: #f4f4f4;">
            <!-- Login Form s-->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <h3 class="register-title text-center" style="">Reset password</h3>
                <p style="font-size: 14px;" class="mb-5 text-center">Keep your password secret.</p>
                    <div class="row">

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="col-md-12 col-12 form-group">
                            {{-- <label for="email">{{ __('E-Mail Address') }}</label> --}}

                            <div>
                                <input id="email" placeholder="E-Mail address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12 form-group">
                            {{-- <label for="password">{{ __('Password') }}</label> --}}

                            <div>
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12 form-group">
                            {{-- <label for="password-confirm">{{ __('Confirm Password') }}</label> --}}
                            <div>
                                <input id="password-confirm" type="password" placeholder="Confirm password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-12 mt-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn">Reset Password</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>
@endsection
