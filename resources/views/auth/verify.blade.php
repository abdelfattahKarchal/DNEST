@extends('layout.app')

@section('content')

<div class="row d-flex justify-content-center" style="margin: 50px;">
    <div class=" mt-2 col-sm-12 col-md-10 col-xs-12 col-lg-4 p-5" style="border: 1px solid #e5e5e5; background-color: #f4f4f4;">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <!-- Login Form s-->
        <form  class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
                <h3 class="register-title text-center" style="">Email verification</h3>
                <p style="font-size: 14px;" class="mb-5 text-center"></p>
                <div class="row">

                    <div class="col-12 mb--20 form-group">
                        {{ __('Avant de continuer, veuillez vérifier votre e-mail.') }}
                    </div>

                        <div class="col-12 mt-4 form-group">
                            <button type="submit" class="hiraola-login_btn">Renvoyer le lien de vérification</button>
                        </div>
                </div>
        </form>
    </div>
</div>

@endsection
