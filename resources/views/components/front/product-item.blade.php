@if ($product->active == 1)
   <div class="single_product">
    <div class="product-img">
        <a href="{{ route('products.show', ['product' => $product->id]) }}">
            <!--   size of image is 438*438   -->
            {{-- <img class="primary-img"
                src="{{ asset('front/assets/images/product/small/1-1.jpg') }}" alt="{{ $product->name }}">
            --}}
            {{-- <img class="secondary-img"
                src="{{ asset('front/assets/images/product/small/1-2.jpg') }}" alt="Hiraola's Product Image">
            --}}
            <img class="primary-img" src="{{ $product->url_1() }}" alt="{{ $product->name }}">
            <img class="secondary-img" src="{{ $product->url_2() }}" alt="{{ $product->name }}">
            {{-- <img class="primary-img" src="{{ $product->path_small_1 }}" alt="{{ $product->name }}">
            <img class="secondary-img" src="{{ $product->path_small_2 }}" alt="{{ $product->name }}"> --}}
        </a>
        @if ($isNew)
            <span class="sticker">New</span>
        @endif
    </div>
    <div class="hiraola-product_content">
        <div class="product-desc_info">
            <h6><a class="product-name" href="{{ route('products.show', ['product' => $product->id]) }}">

                    {{ Str::limit($product->name, 16, $end = '...') }}
                </a>
            </h6>
            <div class="row">
                <div class="price-box col-12">
                    <div class="row">
                        @php
                        $status_price = 'new-price';
                        @endphp
                        @if ($product->new_price > 0)
                            @php
                            $status_price = 'old-price';
                            @endphp
                            <div class="col-6"><span class="new-price">{{ $product->new_price }} MAD</span>
                            </div>
                        @endif
                        @if ($product->price)
                            <div class="col-6 text-right">
                                <span class="{{ $status_price }}">{{ $product->price }} MAD
                                </span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif

