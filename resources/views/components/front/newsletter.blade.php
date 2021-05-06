<div class="popup_wrapper" id="newsletter">
    <div class="test">
        <span id="newsletter-close" class="popup_off"><i class="ion-android-close"></i></span>
        <div class="row subscribe_area text-center">
            <div class="col-6">
                <h2 class="mb-3">Sign up for send newsletter?</h2>
                <p class="mb-5">Subscribe to our newsletters now and stay up-to-date with new collections, the latest
                    lookbooks
                    and
                    exclusive offers.
                </p>
                <div style="display: none;" class="alert alert-danger errorsMessage" role="alert">The email must be a valid email address.
                </div>
                <div class="newsletter-form_wrap">
                    <form
                        action="javascript:void(0)"
                        name="mc-embedded-subscribe-form" class="newsletters-form validate"
                        target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div id="mc-form" class="mc-form subscribe-form">
                                <input id="newsletter_mail" class="newsletter-input form-control" type="email"
                                    autocomplete="off" placeholder="Enter your email" />
                                <button class="newsletter-btn" type="submit" id="newsletter-subscribe">
                                    <i class="ion-android-mail" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

<script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>

@endsection





