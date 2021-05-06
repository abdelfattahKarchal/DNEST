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
            <div id="message-error" class="alert alert-danger" role="alert" style="display: none;">
                Error in adding product !
              </div>
              <div id="message-success" class="alert alert-success" role="alert" style="display: none;">
                The product added succefully check your cart for more details !
              </div>
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
                        <div class="sp-img_area" id="img-gold">
                            <div class="zoompro-border sp-large_img">
                                @foreach ($product->images as $image)

                                        <img class="zoompro" src="{{ $image->urlLarge() }}"
                                        data-zoom-image="{{ $image->urlLarge() }}"
                                        alt="{{ $product->name }}"/>
                                        @break

                                @endforeach

                            </div>
                            <div id="gallery" class="sp-img_slider-3">
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
                                    @for($i = 0; $i < $reviews_notes; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                    @for($i = $reviews_notes; $i < 5; $i++)
                                        <li class="silver-color"><i class="fa fa-star"></i></li>
                                    @endfor

                                    <li class="ml-2">({{ count($product->reviews)}} Reviews)</li>
                                    <li class="ml-2">({{ $order_product_count }} Orders)</li>
                                </ul>
                            </div>
                            <div class="sp-essential_stuff">
                                <h6>Collection : {{ $product->subCategory->category->collection->name }}</h6>

                                <h6>Disponibilité : IN STOCK</h6>

                                <hr/>
                                @php
                                    $newPrice = $material == 'gold' ? $product->new_price : $product->new_price_silver;
                                    $oldPrice = $material == 'gold' ? $product->price : $product->price_silver;
                                @endphp
                                <div class="mt-4 new-price" style="font-size: 2rem">{{ $newPrice }} MAD
                                </div>
                                <div class="mt-2 align-middle">
                                    <span class="new-price align-middle"
                                          style="color: #bababa;text-decoration: line-through;font-size: 1.3rem;">{{ $oldPrice }} MAD</span>
                                    <span class="ml-2 badge badge-info align-middle">-{{ (int) ((($oldPrice - $newPrice) * 100) / $oldPrice) }}%</span>
                                </div>

                                <hr/>

                            </div>

                            <div class="mt-4 sp-essential_stuff color-list_area">

                                <h6>Matière</h6>

                                <div class="color-list">
                                    <a id="gold" href='javascript:void(0)' class="single-color text-left {{ $material =='gold' ? 'active' : '' }}" data-pid="{{ $product->id }}" data-swatch-color="red">
                                        <span class="bg-gold_color"></span>
                                        <span class="color-text">Gold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </a>
                                    <a id="silver" href="javascript:void(0)" class="single-color text-left {{ $material =='silver' ? 'active' : '' }}" data-pid="{{ $product->id }}" data-swatch-color="orange">
                                        <span class="bg-silver_color"></span>
                                        <span class="color-text">Silver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
                                    <form action="{{ url('reviews') }}" method="POST" class="form-horizontal" id="form-review">
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div id="review">
                                            <table class="table table-striped">
                                                <tbody id="reviews-content">
                                                @foreach ($product->reviews as $key=>$review)
                                                    <tr>
                                                        <h5 class="{{$key != 0 ? 'mt-4' : ''}}"><strong>{{ $review->user->name ?? '' }}</strong></h5>
                                                        <p>{{ $review->created_at->format('d/m/Y') }} -
                                                            <span>
                                                                @for ($i=0; $i < $review->note; $i++)
                                                                    <i class="fa fa-star" style="color: #EBB805"></i>
                                                                @endfor
                                                                @for ($i = $review->note; $i < 5; $i++)
                                                                    <i class="fa fa-star" style="color: #bababa"></i>
                                                                @endfor
                                                            </span>
                                                        </p>
                                                        <p class="mt-1">{{ $review->description }}</p>
                                                        <hr/>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                     @if (Auth::check())
                                     <h2>Write a review</h2>
                                     <div class="form-group required second-child">
                                         <div class="col-sm-12 p-0">
                                             <label class="control-label">Share your opinion</label>
                                             <textarea class="review-textarea" name="description"
                                                       id="description" required></textarea>
                                         </div>
                                     </div>
                                     <div class="form-group last-child required">
                                         <div class="col-sm-12 p-0">
                                             <div class="your-opinion">
                                                 <label>Your Rating</label>
                                                 <span>
                                                 <select id="note" name="note" class="star-rating">
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>
                                                 </select>
                                             </span>
                                             </div>
                                         </div>
                                         <div class="hiraola-btn-ps_right cart-page">
                                             <button id="add-to-cart" class="hiraola-login_btn" type="submit">
                                                 Send
                                             </button>
                                            {{--  <a  id="add_review"
                                                href="javascript:void(0)">Send</a> --}}
                                         </div>
                                     </div>
                                     @endif
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

        /* add to card method */
        function addToCard(product_id) {

            var cardCount = parseInt($('.card-counter').text()[0]);
            var selectedSize = $('#selected_size').find(":selected").val();
            var selectedQantity = $('#quantity').val();
            var selectedMatiere = 'gold';
            if ($('#silver').hasClass('active')) {
                selectedMatiere = "silver";
            }

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
                        material: selectedMatiere
                    },
                    success: function (data) {
                        $('.card-counter').text(data.length);
                        $("#block-addTocart").load(location.href + " #block-addTocart");
                        $('#message-success').show();
                        setTimeout(function() {
                            $('#message-success').hide();
                        }, 5000);
                    },
                    error: function (params) {
                        $('#message-error').show();
                    }
                });
            }
        }



$('#gold').click(function (e) {
    e.preventDefault();
    var product_id = $('#gold').data('pid');
    window.location.href = "/products/"+ product_id +"/material/gold";

});

$('#silver').click(function (e) {
    e.preventDefault();
    var product_id = $('#silver').data('pid');
    window.location.href = "/products/"+ product_id +"/material/silver";

});



    </script>

    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
