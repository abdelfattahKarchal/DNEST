@extends('layout.app')

@section('content')
    <div class="row d-flex justify-content-center" style="margin: 50px;">
        <div class=" mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4 p-5" style="border: 1px solid #e5e5e5; background-color: #f4f4f4;">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form s-->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h3 class="register-title text-center" style="">Reset password</h3>
                <p style="font-size: 14px;" class="mb-5 text-center">Forgot your password ? we will handle it for you.</p>
                    <div class="row">
                        <div class="col-md-12 col-12 form-group">
                            {{-- <label for="email">{{ __('E-Mail Address') }}</label> --}}
                            <input id="email" placeholder="E-Mail address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn" style="display: inline !important;">Send reset link</button>
                        </div>
                    </div>
            </form>
    </div>
</div>
@endsection
