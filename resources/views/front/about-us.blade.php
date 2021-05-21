@extends('layout.app')
@section('content')
    <!-- Begin Hiraola's About Us Area -->
    <div class="about-us-area" style="padding-bottom: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 d-flex align-items-center">
                    <div class="overview-content">
                        <h2>A propos <span>THE D-Nest</span></h2>
                        <p class="short_desc">Un savoir-faire antique, l’excellence de l’artisanat Marocaine combinée au désigne et au raffinemet moderne.
                            <br> THE D-Nest à pour mission de concevoir des bijoux qui correspondent parfaitement à vos attentes, c’est pour cette raison que nous travaillons étroitement avec notre communauté afin d’imaginer et de co-créer avec elle de vrais compagnons de succès.</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="overview-img text-center img-hover_effect">
                        <a href="#">
                            <!--size 960*625-->
                            <img class="img-full" src="{{ asset('front/assets/images/about-us/about.jpg')}}" alt="Hiraola's About Us Image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's About Us Area End Here -->

    <!-- Begin Hiraola's Team Area -->
    {{-- <div class="team-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title-2">
                        <h4>Our Team</h4>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member">
                        <div class="team-thumb img-hover_effect">
                            <a href="#">
                                <!--size 370*460-->
                                <img src="{{ asset('front/assets/images/about-us/team/1.jpg')}}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Timothy Beck</h3>
                            <p>IT Expert</p>
                            <a href="#">info@example.com</a>
                            <div class="hiraola-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank"
                                            title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member">
                        <div class="team-thumb img-hover_effect">
                            <a href="#">
                                <img src="{{ asset('front/assets/images/about-us/team/2.jpg')}}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Sarah Sanchez</h3>
                            <p>Web Designer</p>
                            <a href="#">info@example.com</a>
                            <div class="hiraola-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank"
                                            title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member">
                        <div class="team-thumb img-hover_effect">
                            <a href="#">
                                <img src="{{ asset('front/assets/images/about-us/team/3.jpg')}}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Edwin Adams</h3>
                            <p>Content Writer</p>
                            <a href="javascript:void(0)">info@example.com</a>
                            <div class="hiraola-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank"
                                            title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member">
                        <div class="team-thumb img-hover_effect">
                            <a href="#">
                                <img src="{{ asset('front/assets/images/about-us/team/4.jpg')}}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Anny Adams</h3>
                            <p>Marketing officer</p>
                            <a href="#">info@example.com</a>
                            <div class="hiraola-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank"
                                            title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->
            </div>
        </div>
    </div> --}}
    <!-- Hiraola's Team Area End Here -->
@endsection
