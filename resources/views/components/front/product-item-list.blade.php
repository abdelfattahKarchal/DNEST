<div class="single_product">
    <div class="product-img">
        <a href="{{ route('products.show', ['product' => $product->id]) }} ">
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
            <h6><a class="product-name"
                    href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
            </h6>
            <div class="row">
                <div class="price-box col-12">
                    <div class="row">
                        
                        @if ($product->new_price)
                    
                            <div class="col-6"><span class="new-price">${{ $product->new_price }}</span>
                            </div>
                            <div class="col-6"><span
                                class="old-price" style="color: #bababa;text-decoration: line-through;font-size: 14px;margin-left: 10px;">${{ $product->unit_price }}</span></div>
                           @else
                           <div class="col-6"><span
                            class="new-price">${{ $product->unit_price }}</span></div>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="product-short_desc">
                <p>{{ $product->name }}</p>
            </div>
        </div>
        <div class="add-actions">
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
                        
                        <li><a class="hiraola-add_cart" href="{{ route('orders.index') }}" data-toggle="tooltip"
                            data-placement="top" title="In your Cart">In your Cart</a></li>
                    @else
                        
                        <li><a  onclick="addToCard({{ $product->id }})" class="hiraola-add_cart" href="javascript:void(0)" data-toggle="tooltip"
                            data-placement="top" title="Add To Cart">Add To Cart</a></li>
                    @endif
                @else
                <li><a  onclick="addToCard({{ $product->id }})" class="hiraola-add_cart" href="javascript:void(0)" data-toggle="tooltip"
                    data-placement="top" title="Add To Cart">Add To Cart</a></li>
                @endif
                
                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a
                        href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                        title="Quick View"><i class="ion-eye"></i></a></li>
            </ul>
        </div>
    </div>
</div>