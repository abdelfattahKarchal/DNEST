@extends('layouts.app')
@section('content')
    <!-- Begin Single Product Area -->
    <div class="sp-area">
        <div class="container">
            <div class="sp-nav">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="sp-img_area">
                            <div class="zoompro-border">
                                <!--<img class="zoompro" src="assets/images/single-product/large-size/1.jpg"
                                                                                        data-zoom-image="assets/images/single-product/large-size/1.jpg"
                                                                                         alt="Hiraola's Product Image" />-->
                                @if (count($product->images))
                                    <img class="zoompro" src="{{ $product->images[0]->path_small ?? null }}"
                                        data-zoom-image="{{ $product->images[0]->path_large ?? null }}"
                                        alt="{{ $product->name }}" />
                                @endif

                            </div>
                            <div id="gallery" class="sp-img_slider">
                                @forelse ($product->images as $image)
                                    <!--<a class="active" data-image="assets/images/single-product/large-size/1.jpg" data-zoom-image="assets/images/single-product/large-size/1.jpg">-->
                                    <a class="{{ $product->images[0]->id == $image->id ? 'active' : '' }}"
                                        data-image="{{ $image->path_large }}" data-zoom-image="{{ $image->path_large }}">
                                        <!--<img src="assets/images/single-product/small-size/1.jpg" alt="Hiraola's Product Image">-->
                                        <img src="{{ $image->path_small }}" alt="{{ $product->name }}">
                                    </a>
                                @empty
                                    No images for this product
                                @endforelse


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="#"> {{ $product->name }} </a></h5>
                            </div>
                            <span class="reference">Reference: demo_1</span>

                            <div class="sp-essential_stuff">
                                <ul>
                                    <li>Price: <a href="javascript:void(0)">
                                            @if ($product->new_price)
                                                <span class="new-price">${{ $product->new_price }}</span>
                                                <del> <span class="new-price"
                                                        style="color: #bababa;text-decoration: line-through;font-size: 14px;margin-left: 10px;">${{ $product->unit_price }}</span></del>
                                            @else
                                                <span class="new-price">${{ $product->unit_price }}</span>
                                            @endif






                                    </li>
                                    <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                    <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                    <li>Reward Points: <a href="javascript:void(0)">600</a></li>
                                    <li>Availability: <a href="javascript:void(0)">
                                            {{ $product->quantity > 0 ? 'In Stock' : 'rupture' }} </a></li>
                                </ul>
                            </div>
                            {{-- @if (count($product->sizes))
                                <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select" id="selected_size">
                                        @foreach ($product->sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option>


                                        @endforeach ($collection as $item)
                                    </select>
                                </div>
                            @endif --}}
                            @if ($product->quantity > 0)
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input name="quantity" id="quantity" type="number" class="cart-plus-minus-box"
                                            value="1">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                            @endif

                            <div class="qty-btn_area" id="block-addTocart">
                                <ul>
                                    @if (Session::has('productsCardSession'))
                                        @php
                                        $isExist = false;
                                        @endphp
                                        @foreach (Session::get('productsCardSession') as $key => $value)
                                            @if ($product->id === $value->id)
                                                @php
                                                $isExist = true;
                                                break;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($isExist)
                                            <li>Already in cart <a
                                                    style="border: none; display: inline;padding: 0; color: blue"
                                                    href="{{ route('cart') }}"> click here to check it</a> </li>
                                        @else
                                            <li><a onclick="addToCard({{ $product->id }})" class="qty-cart_btn"
                                                    href="javascript:void(0)">Add To Cart</a></li>
                                        @endif
                                    @else
                                        <li><a onclick="addToCard({{ $product->id }})" class="qty-cart_btn"
                                                href="javascript:void(0)">Add To Cart</a></li>
                                    @endif

                                </ul>

                            </div>
                            <x-front.media></x-front.media>
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
                                                            <td class="text-right">{{ $review->created_at }}</td>
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
                                        <div class="form-group required">
                                            {{-- <div class="col-sm-12 p-0">
                                                <label>Your Email <span class="required">*</span></label>
                                                <input class="review-input" type="email" name="con_email" id="con_email"
                                                    required>
                                            </div> --}}
                                        </div>
                                        <div class="form-group required second-child">
                                            <div class="col-sm-12 p-0">
                                                <label class="control-label">Share your opinion</label>
                                                <textarea class="review-textarea" name="con_message"
                                                    id="con_message"></textarea>
                                                <div class="help-block"><span class="text-danger">Note:</span> HTML is not
                                                    translated!</div>
                                            </div>
                                        </div>
                                        <div class="form-group last-child required">
                                            <div class="hiraola-btn-ps_right">
                                                <a onclick="addReview({{ $product->id }})" id="add_review"
                                                    href="javascript:void(0)" class="hiraola-btn hiraola-btn_dark">Send</a>
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
                    success: function(data) {
                        var reviewsCount = parseInt($.trim($('#reviews-count').text()));
                        var longDateFormat = 'dd/MM/yyyy HH:mm:ss';
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
                    success: function(data) {
                        $("#block-addTocart").load(location.href + " #block-addTocart");
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Your product has been saved in cart',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            }
            $('.card-counter').text(cardCount + 1);

        }

    </script>

    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
