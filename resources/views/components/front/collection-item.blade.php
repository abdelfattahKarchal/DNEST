@if ($collection->active == 1)
   <div class="single_product">
    <div class="product-img img-hover_effect">
        <a href="{{ route('products.show', ['product' => $collection->id]) }}">
            <a href="{{ url('collections/' . $collection->id . '/products') }}">
                <img class="primary-img"
                     src="{{ $collection->url_1() }}"
                     alt="Collection image">
            </a>
        </a>
        
    </div>
    <div class="hiraola-product_content">
        <div class="product-desc_info text-center">
            <h6>
                <a href="{{ url('collections/' . $collection->id . '/products') }}">{{ $collection->name }}</a>
            </h6>
        </div>
    </div>
</div>
@endif

