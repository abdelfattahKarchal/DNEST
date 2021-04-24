<div class="popup_wrapper" id="newsletter">
    <div class="test">
        <span id="newsletter-close" class="popup_off"><i class="ion-android-close"></i></span>
        <div class="subscribe_area text-center">
            <h2>Sign up for send newsletter?</h2>
            <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest
                lookbooks
                and
                exclusive offers.</p>
                <div style="display: none;" class="alert alert-danger errorsMessage"
                        role="alert">The email must be a valid email address.</div>
            <div class="subscribe-form-group">
                <form class="form-inline" action="javascript:void(0)">
                    <input class="form-control" autocomplete="on" type="email" name="newsletter_mail"
                        id="newsletter_mail" placeholder="Enter your email">
                    <button id="newsletter-subscribe" style="margin-top:0;" class="hiraola-login_btn" type="submit">subscribe</button>
                </form>
            </div>
            {{-- <div class="subscribe-bottom">
                <input type="checkbox" id="newsletter-permission">
                <label for="newsletter-permission">Don't show this popup again</label>
            </div> --}}
        </div>
    </div>
</div>

@section('js')

<script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>

@endsection





