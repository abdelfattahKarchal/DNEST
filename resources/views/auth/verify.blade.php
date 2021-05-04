@extends('layout.app')

@section('content')

<div class="row d-flex justify-content-center mb-lg-1">
    <div class=" mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <!-- Login Form s-->
        <form  class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="mt-4 mb-4">
                <h3 class="mb-4 register-title" style="">Verify Your Email Address</h3>
                <div class="row">

                    <div class="col-12 mb--20 form-group">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                    </div>

                        <div class="col-12 mt-4 mb-4 form-group text-right">
                            <button type="submit" class="hiraola-login_btn" style="display: inline !important;">{{ __('click here to request another') }}</button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
