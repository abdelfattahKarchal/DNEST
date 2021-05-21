<div class="popup_wrapper" id="newsletter">
    <div class="test">
        <span id="newsletter-close" class="popup_off"><i class="ion-android-close"></i></span>
        <div class="row subscribe_area text-center">
            <div class="col-6">
                <h2 class="mb-3">Inscrivez-vous aux newsletters?</h2>
                <p class="mb-5">Abonnez-vous maintenant à nos newsletters et restez au courant des nouvelles collections, des derniers lookbooks et des offres exclusives.
                </p>
                <div style="display: none;" class="alert alert-danger errorsMessage" role="alert">L'e-mail doit être une adresse valide.
                </div>
                <div class="newsletter-form_wrap">
                    <form
                        action="javascript:void(0)"
                        name="mc-embedded-subscribe-form" class="newsletters-form validate"
                        target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div id="mc-form" class="mc-form subscribe-form">
                                <input id="newsletter_mail" class="newsletter-input form-control" type="email"
                                    autocomplete="off" placeholder="Entrer votre Email" />
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





