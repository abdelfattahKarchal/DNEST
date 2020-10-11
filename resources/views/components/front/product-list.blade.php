{{-- @dd($products) --}}

<div class="shop-product-wrap grid gridview-3 row" id="listoFproduct">

    @isset($products)
        @foreach ($products as $product)
            <div class="col-lg-4">
                <div class="slide-item">
                    <div class="single_product">
                        <div class="product-img">
                            <a href="{{route('products.show',['product'=> $product->id])}}">
                                <!--   size of image is 438*438   -->
                                {{-- <img class="primary-img"
                                    src="{{ asset('front/assets/images/product/small/1-1.jpg') }}"
                                    alt="{{ $product->name }}"> --}}
                                {{-- <img class="secondary-img"
                                    src="{{ asset('front/assets/images/product/small/1-2.jpg') }}"
                                    alt="Hiraola's Product Image"> --}}
                                <img class="primary-img" src="{{ $product->path_small_1 }}" alt="{{ $product->name }}">
                                <img class="secondary-img" src="{{ $product->path_small_2 }}" alt="{{ $product->name }}">
                            </a>
                            <div class="add-actions">
                                <ul>
                                    <li>
                                        <a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip"
                                            data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a
                                            href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                            title="Quick View"><i class="ion-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiraola-product_content">
                            <div class="product-desc_info">
                                <h6><a class="product-name" href="{{route('products.show',['product'=> $product->id])}}"> {{ $product->name }} </a></h6>
                                <div class="price-box">
                                    <span class="new-price">${{ $product->unit_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-slide_item">
                    <div class="single_product">
                        <div class="product-img">
                            <a href="{{route('products.show',['product'=> $product->id])}} ">
                                {{-- <img class="primary-img"
                                    src="{{ asset('front/assets/images/product/small/1-1.jpg') }}"
                                    alt="Hiraola's Product Image">
                                <img class="secondary-img" src="{{ asset('front/assets/images/product/small/1-2.jpg') }}"
                                    alt="Hiraola's Product Image"> --}}
                                <img class="primary-img" src="{{ $product->path_small_1 }}" alt="{{ $product->name }}">
                                <img class="secondary-img" src="{{ $product->path_small_2 }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="hiraola-product_content">
                            <div class="product-desc_info">
                                <h6><a class="product-name" href="{{route('products.show',['product'=> $product->id])}}">{{ $product->name }}</a></h6>
                                <div class="price-box">
                                    <span class="new-price">${{ $product->unit_price }}</span>
                                </div>
                                <div class="product-short_desc">
                                    <p>{{ $product->name }}</p>
                                </div>
                            </div>
                            <div class="add-actions">
                                <ul>
                                    <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip"
                                            data-placement="top" title="Add To Cart">Add To Cart</a></li>
                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a
                                            href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                            title="Quick View"><i class="ion-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach($products as $product)
    @endisset

</div>
<h2 id="noProduct" class="text-center text-muted mt-4">No products with this name. try again !</h2>

@section('js')
    <script>
        $(function() {
            $('#noProduct').hide();
            $('#listoFproduct').show()
            $('#pagination').show()
            /* -------add content to list items of products------*/
            function productsToAppend(products) {
                var productContent = '';
                products.forEach(product => {
                    productContent += `
                                            <div class="col-lg-4">
                                                <div class="slide-item">
                                                    <div class="single_product">
                                                        <div class="product-img">
                                                            <a href="{{url('products/`+product.id+`')}}">
                                                                <img class="primary-img" src="` + product.path_small_1 +
                        `" alt="` +
                        product
                        .name + `">
                                                                <img class="secondary-img" src="` + product.path_small_2 +
                        `" alt="` +
                        product
                        .name + `">
                                                            </a>
                                                            <div class="add-actions">
                                                                <ul>
                                                                    <li>
                                                                        <a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip"
                                                                            data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                                    </li>
                                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a
                                                                            href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                                                            title="Quick View"><i class="ion-eye"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="hiraola-product_content">
                                                            <div class="product-desc_info">
                                                                <h6><a class="product-name" href="{{url('products/`+product.id+`')}}"> ` +
                        product
                        .name + ` </a></h6>
                                                                <div class="price-box">
                                                                    <span class="new-price">$` + product.unit_price + `</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-slide_item">
                                                    <div class="single_product">
                                                        <div class="product-img">
                                                            <a href="{{url('products/`+product.id+`')}}">

                                                                <img class="primary-img" src="` + product.path_small_1 + `"
                                                                    alt="` + product.name + `">
                                                                <img class="secondary-img" src="` + product.path_small_2 + `"
                                                                    alt="` + product.name + `">
                                                            </a>
                                                        </div>
                                                        <div class="hiraola-product_content">
                                                            <div class="product-desc_info">
                                                                <h6><a class="product-name" href="{{url('products/`+product.id+`')}}">` +
                        product
                        .name + `</a></h6>
                                                                <div class="price-box">
                                                                    <span class="new-price">$` + product.unit_price + `</span>
                                                                </div>
                                                                <div class="product-short_desc">
                                                                    <p>` + product.name + `</p>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul>
                                                                    <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip"
                                                                            data-placement="top" title="Add To Cart">Add To Cart</a></li>
                                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a
                                                                            href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                                                            title="Quick View"><i class="ion-eye"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;

                });

                return productContent;
            }
            $('.subCategoryClick').click(function() {
                $('#listoFproduct').show()
                $('#pagination').show()
                $('#noProduct').hide();
                // var id = $(this).attr('data-subCategory');
                var url_subcategory = $(this).attr('data-subCategory');

                $.ajax({
                    type: 'GET',
                    url: url_subcategory,

                    success: function(data) {
                        var productContent = '';
                        productContent = productsToAppend(data.products)

                        if (productContent && typeof productContent !== undefined) {
                            $('#listoFproduct').empty();
                            $('#listoFproduct').append(productContent);
                        }
                    }
                });
            });


            /*------------------Search product---------------------------*/
            $('#product_search').on('input', function() {
                var search_value = $.trim($('#product_search').val())
                if (search_value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{url('products/search')}}",
                        data: {
                            name: search_value
                        },
                        success: function(data) {
                            if (data && Object.keys(data).length) {
                                productsContent = productsToAppend(data);
                                if (productsContent && typeof productsContent !== undefined) {
                                    $('#noProduct').hide();
                                    $('#listoFproduct').show()
                                    $('#pagination').show()
                                    $('#listoFproduct').empty();
                                    $('#listoFproduct').append(productsContent);
                                }
                            }else{
                                $('#listoFproduct').hide()
                                $('#pagination').hide()
                                $('#noProduct').show();
                            }
                        }
                    });
                }
            });
        });

    </script>
@endsection
