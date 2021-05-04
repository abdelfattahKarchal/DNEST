@extends('layout.app')

@section('content')
    <div class="row d-flex justify-content-center mb-lg-1">
        <div class=" mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4">
            <!-- Login Form s-->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="mt-4 mb-4">
                    <h3 class="mb-4 register-title" style="">Reset password</h3>
                    <div class="row" style="padding: 0 0 0 8px;">

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="col-md-12 col-12 form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12 form-group">
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12 form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-12 mt-4 mb-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn" style="display: inline !important;">{{ __('Reset Password') }}</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
