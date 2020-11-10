@extends('layouts.app')
@section('content')
    <!-- Begin Hiraola's Blog Column Three Area -->
    <div class="hiraola-blog_area hiraola-blog_area-2 grid-view_area blog-column-three_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row blog-item_wrap">

                        @forelse ($blogs as $blog)
                            <div class="col-lg-4">
                                <div class="blog-item">
                                    <div class="blog-img img-hover_effect">
                                            {{-- <img
                                                src="{{ asset('front/assets/images/blog/1.jpg') }}" alt="Hiraola's Blog Image">
                                            --}} 
                                            @if ($blog->media->label == 'image')
                                            <a href="blog-details-right-sidebar.html">
                                                <img src="{{ asset($blog->path) }}"
                                                alt="{{ $blog->title }}">
                                            </a>
                                            @else
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe  src="{{ $blog->path }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            </div>
                                            @endif
                                            
                                        
                                        <div class="blog-meta-2">
                                            <div class="blog-time_schedule">
                                                <span class="day">{{ $blog->created_at->format('d') }}</span>
                                                <span class="month">{{ $blog->created_at->format('F') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-heading">
                                            <h5>
                                                <a href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a>
                                            </h5>
                                        </div>
                                        <div class="blog-short_desc">
                                            {{ Str::limit($blog->description1, 120 ,$end='...')  }}
                                        </div>
                                        <div class="hiraola-read-more_area">
                                            <a href="{{ route('blogs.show',['blog'=>$blog->id]) }}" class="hiraola-read_more">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                           list of blogs is empty
                        @endforelse
                        {{-- <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="blog-img img-hover_effect">
                                    <a href="blog-details-right-sidebar.html">
                                        <img src="{{ asset('front/assets/images/blog/1.jpg') }}" alt="Hiraola's Blog Image">
                                    </a>
                                    <div class="blog-meta-2">
                                        <div class="blog-time_schedule">
                                            <span class="day">25</span>
                                            <span class="month">April</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-heading">
                                        <h5>
                                            <a href="blog-details-right-sidebar.html">Blog Image Post</a>
                                        </h5>
                                    </div>
                                    <div class="blog-short_desc">

                                    </div>
                                    <div class="hiraola-read-more_area">
                                        <a href="blog-details-right-sidebar.html" class="hiraola-read_more">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        {{-- <div class="col-lg-4">
                            <div class="hiraola-single-blog_slider">
                                <div class="blog-item">
                                    <div class="blog-img img-hover_effect">
                                        <a href="blog-details-right-sidebar.html">
                                            <img src="{{ asset('front/assets/images/blog/2.jpg') }}"
                                                alt="Hiraola's Blog Image">
                                        </a>
                                        <div class="blog-meta-2">
                                            <div class="blog-time_schedule">
                                                <span class="day">25</span>
                                                <span class="month">April</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-heading">
                                            <h5>
                                                <a href="blog-details-right-sidebar.html">Blog First Gallery Post</a>
                                            </h5>
                                        </div>
                                       <div class="blog-short_desc">
                                                        <p>Aenean vestibulum pretium enim, non commodo urna volutpat vitae. Pellentesque vel
                                                            lacus
                                                            eget est d...
                                                        </p>
                                                    </div>
                                        <div class="hiraola-read-more_area">
                                            <a href="blog-details-right-sidebar.html" class="hiraola-read_more">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hiraola-paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul class="hiraola-pagination-box">
                                            <li class="active"><a href="javascript:void(0)">1</a></li>
                                            <li><a href="javascript:void(0)">2</a></li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a class="Next" href="javascript:void(0)"><i
                                                        class="ion-ios-arrow-right"></i></a>
                                            </li>
                                            <li><a class="Next" href="javascript:void(0)">>|</a></li>
                                        </ul>
                                    </div>
                                    <!--<div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product-select-box">
                                                        <div class="product-short">
                                                            <p>Show</p>
                                                            <select class="myniceselect nice-select">
                                                                <option value="5">5</option>
                                                                <option value="10">10</option>
                                                                <option value="15">15</option>
                                                                <option value="20">20</option>
                                                                <option value="25">25</option>
                                                            </select>
                                                            <span>Per Page</span>
                                                        </div>
                                                    </div>
                                                </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Blog Column Three Area End Here -->
@endsection
