<div class="hiraola-footer_area">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widgets_info">

                        <div class="footer-widgets_logo text-center p-2">
                            <a href="#">
                                <img
                                    src="{{ asset('front/assets/images/logo/logo1_1.png') }}"
                                    alt="THE NEST Footer Logo">
                            </a>
                        </div>

                        <div class="widget-short_desc">
                            {{-- <p>We are a team of designers and developers that create high quality jewelry.
                            </p> --}}
                        </div>
                        {{-- begin footer --}}
                        <x-front.media :contacts="$contacts"></x-front.media>
                        {{-- end footer --}}
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-widgets_area">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="footer-widgets_title">
                                    <h6>Collections</h6>
                                </div>
                                <div class="footer-widgets">
                                    <ul>
                                        @foreach ($collections as $collection)
                                        @if ($collection->active == 1)
                                        <li><a href="{{ url('collections/' . $collection->id . '/products') }}">{{ $collection->name }}</a></li>
                                        @endif

                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="footer-widgets_info">
                                    <div class="footer-widgets_title">
                                        <h6>Contactez-nous</h6>
                                    </div>
                                    <div class="widgets-essential_stuff">
                                        <ul>
                                            
                                            <li class="hiraola-phone"><i
                                                    class="ion-ios-telephone"></i><span>Télèphone:</span> <a
                                                    href="tel://{{ $contacts[0]->phone }}">{{ $contacts[0]->phone }}</a>
                                            </li>
                                            
                                            <li class="hiraola-email"><i
                                                    class="ion-android-mail"></i><span>Email:</span> <a
                                                    href="mailto://{{ $contacts[0]->email }}">{{ $contacts[0]->email }}</a>
                                            </li>

                                            <li class="hiraola-address"><i
                                                class="ion-ios-location"></i><span>Adresse:</span> 
                                                {{ $contacts[0]->address }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="instagram-container footer-widgets_area">
                                    <div class="footer-widgets_title">
                                        <h6> NEWSLETTERS</h6>
                                    </div>
                                    <div class="widget-short_desc">
                                        <p>Abonnez-vous et restez au courant des nouvelles collections</p>
                                    </div>
                                    <div class="newsletter-form_wrap">
                                        <form
                                            action="javascript:void(0)"
                                            method="post">
                                            <div id="mc_embed_signup_scroll">
                                                <div id="mc-form" class="mc-form subscribe-form">
                                                    <input id="mc-email" class="newsletter-input form-control" type="email"
                                                        autocomplete="off" placeholder="Email" />
                                                    <button class="newsletter-btn" id="mc-submit">
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
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="footer-bottom_nav">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright align-middle">
                            <span>Copyright &copy; 2021 <a href="#">THE DNEST.</a> Tous les droits sont réservés.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
