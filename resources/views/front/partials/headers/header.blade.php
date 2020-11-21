<header class="header-main_area header-main_area-3">
    <div class="header-middle_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-middle_wrap">
                        <div class="header-contact_area">
                            <div class="contact-box border_right">
                                <span>Support phone 1</span>
                                <p><a href="callto://+123123321345"> (+123) 123 321 345</a></p>
                            </div>
                            <div class="contact-box">
                                <span>Support phone 2</span>
                                <p><a href="callto://+123123321345">(+123) 123 321 345</a></p>
                            </div>
                        </div>
                        <div class="header-logo">
                            <a href="index-33.html">
                                <!--<img src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/menu/logo/4.png" alt="Hiraola's Header Logo">-->
                                <img src="{{ asset('front/assets/images/logo/logo1.png') }}" alt="THE NEST LOGO"
                                    style="width: 150px;">
                            </a>
                        </div>
                        <div class="header-right_area">
                            <div class="header-contact_area">
                                <div class="contact-box border_right">
                                    <span>Support mail 1</span>
                                    <p><a href="mailto:abdelfattah59@gmail.com">fashe@example.com </a></p>
                                </div>
                                <div class="contact-box">
                                    <span>Support mail 2</span>
                                    <p><a href="mailto:abdelfattah59@gmail.com">fashe@example.com </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.partials.headers.header-principal')
    @include('front.partials.headers.header-scroll')
    @include('front.partials.headers.header-mobile')
</header>