@extends('layout.app')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Single Product Style</h2>
                <ul>
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->subCategory->category->collection->name}}</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">{{$product->subCategory->category->name}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->subCategory->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Begin Single Product Area -->
    <div class="sp-area sp-tab-style_left">
        <div class="container">
            <div class="sp-nav">
                {{--                <nav aria-label="breadcrumb">--}}
                {{--                    <ol class="breadcrumb" style="border-radius: 0px !important;">--}}
                {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                {{--                        <li class="breadcrumb-item"><a href="#">{{$product->subCategory->category->collection->name}}</a></li>--}}
                {{--                        <li class="breadcrumb-item"><a href="#">{{$product->subCategory->category->name}}</a></li>--}}
                {{--                        <li class="breadcrumb-item"><a href="#">{{$product->subCategory->name}}</a></li>--}}
                {{--                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>--}}
                {{--                    </ol>--}}
                {{--                </nav>--}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sp-img_area">
                            <div class="zoompro-border sp-large_img">
                                    <img class="zoompro" src="{{ count($product->images) ? $product->images[0]->urlLarge() : $product->url_1() }}"
                                         data-zoom-image="{{ count($product->images) ? $product->images[0]->urlLarge() : $product->url_1() }}"
                                         alt="{{ $product->name }}"/>
                            </div>
                            <div id="gallery" class="sp-img_slider-3">
                                    <a data-image="{{ $product->url_1() }}" data-zoom-image="{{ $product->url_1() }}">
                                        <img src="{{ $product->url_1() }}" alt="{{ $product->name }}">
                                    </a>
                                    <a data-image="{{ $product->url_2() }}" data-zoom-image="{{ $product->url_2() }}">
                                        <img src="{{ $product->url_2() }}" alt="{{ $product->name }}">
                                    </a>
                                @foreach($product->images as $image)
                                    <a data-image="{{ $image->urlLarge() }}" data-zoom-image="{{ $image->urlLarge() }}">
                                        <img src="{{ $image->urlSmall() }}" alt="{{ $product->name }}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-start flex-column">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h4><a href="#"> {{ $product->name }} </a></h4>
                            </div>

                            <div class="rating-box">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li class="silver-color"><i class="fa fa-star"></i></li>
                                    <li class="ml-2">(0 Reviews)</li>
                                    <li class="ml-2">(100 Orders)</li>
                                </ul>
                            </div>

                            <div class="sp-essential_stuff">
                                <h6>Collection : {{ $product->subCategory->category->collection->name }}</h6>

                                <h6>Disponibilité : IN STOCK</h6>

                                <hr/>

                                <div class="mt-4 new-price" style="font-size: 2rem">{{ $product->new_price }} MAD
                                </div>
                                <div class="mt-2 align-middle">
                                    <span class="new-price align-middle"
                                          style="color: #bababa;text-decoration: line-through;font-size: 1.3rem;">{{ $product->unit_price }} MAD</span>
                                    <span class="ml-2 badge badge-info align-middle">-{{ (int) ((($product->unit_price - $product->new_price) * 100) / $product->unit_price) }}%</span>
                                </div>

                                <hr/>

                            </div>

                            <div class="mt-4 sp-essential_stuff color-list_area">
                                <h6>Matière</h6>
                                <div class="color-list">
                                    <a href="javascript:void(0)" class="single-color active text-left" data-swatch-color="red">
                                        <span class="bg-gold_color"></span>
                                        <span class="color-text">Gold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color text-left" data-swatch-color="orange">
                                        <span class="bg-silver_color"></span>
                                        <span class="color-text">Silver (-50 MAD)</span>
                                    </a>
                                </div>
                            </div>

                            <div class="align-bottom" style="margin-top: 65px !important;">
                                <button id="add-to-cart" class="hiraola-login_btn" type="button" onclick="addToCard({{ $product->id }})">
                                    Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Area End Here -->

    <!-- Begin Single Product Tab Area -->
    <div class="hiraola-product-tab_area-2 sp-product-tab_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sp-product-tab_nav ">
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews">
                                        <span>Reviews
                                            (<span id="reviews-count">{{ count($product->reviews) }}</span>)
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content hiraola-tab_content">
                            <div id="description" class="tab-pane active show" role="tabpanel">
                                <div class="product-description">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="tab-pane active" id="tab-review">
                                    <form class="form-horizontal" id="form-review">
                                        <div id="review">
                                            <table class="table table-striped table-bordered">
                                                <tbody id="reviews-content">
                                                @forelse ($product->reviews as $review)
                                                    <tr>
                                                        <td style="width: 50%;">
                                                            <strong>{{ $review->user->name ?? '' }}</strong>
                                                        </td>
                                                        <td class="text-right">{{ $review->created_at->format('d/m/Y') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p>{{ $review->description }}</p>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    Be you first one commented this product
                                                @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                        <h2>Write a review</h2>
                                        <div class="form-group required second-child">
                                            <div class="col-sm-12 p-0">
                                                <label class="control-label">Share your opinion</label>
                                                <textarea class="review-textarea" name="con_message"
                                                          id="con_message"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group last-child required">
                                            <div class="hiraola-btn-ps_right cart-page">
                                                <a onclick="addReview({{ $product->id }})" id="add_review"
                                                   href="javascript:void(0)">Send</a>
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
    <!--Single Product Tab Area End Here -->

    <div class="hiraola-product_area hiraola-product_area-2 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="hiraola-section_title">
                        <h4>Special Offer</h4>
                    </div>


                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider-3">

                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Pendant, Made of White Pl...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£120.80</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-3.jpg" alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-4.jpg" alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Swirl 1 Medium Pendant La...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£120.80</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-5.jpg" alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-6.jpg" alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker-2">Sale</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Work Lamp Silver Proin he...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£135.20</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-7.jpg" alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-8.jpg" alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Work Lamp Silver Proin he...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£135.20</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-9.jpg" alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker-2">Sale</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Vitra Sunburst Clock pret...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£1199.60</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-9.jpg" alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                            <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Light Inverted Pendant Qu...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£110.00</span>
                                            <span class="old-price">£110.00</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        function addReview(product_id) {
            var description = $('#con_message').val();
            if (description) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ url('reviews') }}",
                    data: {
                        product_id: product_id,
                        description: description
                    },
                    success: function (data) {
                        if (data) {
                            var reviewsCount = parseInt($.trim($('#reviews-count').text()));
                            var longDateFormat = 'dd-MM-yyyy HH:mm:ss';
                            var date_review = jQuery.format.date(data.review.created_at, longDateFormat)
                            var reviewContent = '';
                            reviewContent = `
                                                        <tr>
                                                            <td style="width: 50%;">
                                                                <strong>` + data.user.name + `</strong></td>
                                                            <td class="text-right">` + date_review + `</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p>` + data.review.description + `</p>
                                                            </td>
                                                        </tr>
                                                        `;
                            $('#reviews-content').append(reviewContent);
                            $('#reviews-count').text(reviewsCount + 1);
                            $('#con_message').val('');
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Your review has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            window.location.href = "/loginForm";
                        }

                    }
                });
            }
        };

        /* add to card method */
        function addToCard(product_id) {

            var cardCount = parseInt($('.card-counter').text()[0]);
            var selectedSize = $('#selected_size').find(":selected").val();
            var selectedQantity = $('#quantity').val()
            if (product_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ url('carts/store') }}",
                    data: {
                        product_id: product_id,
                        size: selectedSize,
                        quantity: selectedQantity,
                    },
                    success: function (data) {
                        $("#block-addTocart").load(location.href + " #block-addTocart");
                    }
                });
            }
            $('.card-counter').text(cardCount + 1);

        }

    </script>

    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
