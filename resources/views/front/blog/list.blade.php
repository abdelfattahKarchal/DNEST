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
                            <x-front.blog-item :blog="$blog"> </x-front.blog-item>
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
                        <div class="col-12 mb-2 d-flex flex-row-reverse">
                            @if ($blogs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $blogs->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Blog Column Three Area End Here -->
@endsection
