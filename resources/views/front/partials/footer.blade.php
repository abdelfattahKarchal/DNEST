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
                            <p>We are a team of designers and developers that create high quality jewelry.
                            </p>
                        </div>
                        {{-- begin footer --}}
                        <x-front.media></x-front.media>
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
                                        <h6>About Us</h6>
                                    </div>
                                    <div class="widgets-essential_stuff">
                                        <ul>
                                            <li class="hiraola-address"><i
                                                    class="ion-ios-location"></i><span>Address:</span> The Barn,
                                                Ullenhall, Henley
                                                in
                                                Arden B578 5CC, England</li>
                                            <li class="hiraola-phone"><i
                                                    class="ion-ios-telephone"></i><span>Call Us:</span> <a
                                                    href="tel://+123123321345">+123 321 345</a>
                                            </li>
                                            <li class="hiraola-email"><i
                                                    class="ion-android-mail"></i><span>Email:</span> <a
                                                    href="mailto://info@yourdomain.com">info@yourdomain.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="instagram-container footer-widgets_area">
                                    <div class="footer-widgets_title">
                                        <h6>Sign Up For Newslatter</h6>
                                    </div>
                                    <div class="widget-short_desc">
                                        <p>Subscribe to our newsletters now and stay up-to-date with new
                                            collections</p>
                                    </div>
                                    <div class="newsletter-form_wrap">
                                        <form
                                            action="javascript:void(0)"
                                            method="post">
                                            <div id="mc_embed_signup_scroll">
                                                <div id="mc-form" class="mc-form subscribe-form">
                                                    <input id="mc-email" class="newsletter-input form-control" type="email"
                                                        autocomplete="off" placeholder="Enter your email" />
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
                            <span>Copyright &copy; 2021 <a href="#">THE DNEST.</a> All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
