
{{-- @dd($newProducts) --}}
<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>New Products</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    <!-- Begin new products Slide Item -->
                    @foreach ($newProducts as $newProduct)
                    <div class="slide-item">
                        <div class="single_product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    {{-- <img class="primary-img" src="{{asset('front/assets/images/product/small/1-1.jpg')}}"
                                         alt="Hiraola's Product Image">
                                    <img class="secondary-img" src="{{asset('front/assets/images/product/small/1-2.jpg')}}" alt="Hiraola's Product Image"> --}}

                                    <img class="primary-img" src="{{ $newProduct->path_small_1 }}"
                                    alt="Hiraola's Product Image">
                               <img class="secondary-img" src="{{ $newProduct->path_small_2 }}" alt="Hiraola's Product Image">
                                </a>
                                <span class="sticker">New</span>
                                <div class="add-actions" style="bottom :0px !important;">
                                    <ul>
                                        <!--<li class="quick-view-btn" data-toggle="modal"-->
                                        <!--data-target="#exampleModalCenter">-->
                                        <!--<button class="btn-quickView" data-toggle="tooltip" data-placement="top"-->
                                        <!--title="Quick Viewc">-->
                                        <!--<i class="ion-eye"></i>-->
                                        <!--</button>-->
                                        <!--</li>-->

                                        <li>
                                            <a class="hiraola-add_cart" href="cart.html"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Add To Cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                        </li>
                                        <li class="quick-view-btn" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            <a href="javascript:void(0)"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               title="Quick View">
                                                <i class="ion-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="hiraola-product_content">
                                <div class="product-desc_info " style="margin-top: 10px;">
                                    <h6><a class="product-name" href="single-product.html"> {{ $newProduct->name }} </a></h6>
                                </div>
                                <div class="product-desc_info text-center">
                                    <div class="price-box text-center">
                                        <span class="new-price">${{ $newProduct->unit_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End new products Slide Item -->



                </div>
            </div>
        </div>
    </div>
</div>
