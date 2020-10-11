<div class="hiraola-product-tab_area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-tab">
                    <div class="hiraola-tab_title">
                        <h4>New Collections</h4>
                    </div>
                    <!--<ul class="nav product-menu">-->
                    <!--<li><a class="active" data-toggle="tab" href="#necklaces"><span>Necklaces</span></a></li>-->
                    <!--<li><a data-toggle="tab" href="#earrings"><span>Earrings</span></a></li>-->
                    <!--<li><a data-toggle="tab" href="#bracelet"><span>Bracelet</span></a></li>-->
                    <!--<li><a data-toggle="tab" href="#anklet"><span>Anklet</span></a></li>-->
                    <!--</ul>-->
                </div>
                <div class="tab-content hiraola-tab_content">
                    <div id="necklaces" class="tab-pane active show" role="tabpanel">
                        <div class="hiraola-product-tab_slider-2">
                            <!-- Begin  Slide new collections -->
                            @foreach ($newCollections as $newCollection)
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="shop-left-sidebar.html">
                                            <img class="primary-img" style="height: 287px;"
                                                {{-- src="{{ asset('front/assets/images/product/collections/sahara.jpg') }}" --}}
                                                src="{{$newCollection->image1 }}"
                                                alt="Collection image">
                                            <img class="secondary-img"
                                                {{-- src="{{ asset('front/assets/images/product/medium-size/1-8.jpg') }}" --}}
                                                src="{{$newCollection->image2 }}"
                                                alt="Collection image">
                                        </a>

                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info text-center">
                                            <h6 class="mt-2"><a class="product-name"
                                                    href="shop-left-sidebar.html">{{$newCollection->name}}</a></h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End slide new collections -->


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
