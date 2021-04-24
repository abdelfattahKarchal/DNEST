@extends('layout.app')
@section('content')
    <!-- Begin Content Wrapper Area -->
    <div class="hiraola-content_wrapper">
        <div class="container">
            <div class="row">
                {{-- begin left sidebar --}}
                <div class="col-lg-3 order-2 order-lg-1">
                    <x-front.left-sidebar :collections="$collections"></x-front.left-sidebar>
                </div>
                {{-- end left sidebar --}}

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="text-center align-middle">
                            <h5 class="mt-2 mb-2">{{ $collection_name ?? '' }}</h5>
                        </div>

                        <div class="product-item-selection_area">
                            <div class="product-short">
                                <x-front.errors></x-front.errors>
                                <form action="{{ url('search/product') }}" method="GET" class="form-inline">
                                    <input class="form-control" type="text" name="product_name" id="product_name"
                                        placeholder="Product name">
                                    <button style="margin-top:0; width: auto; padding-left: 15px; padding-right: 15px;" class="hiraola-login_btn" type="submit"> <i
                                            class="ion-ios-search-strong text-white"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- begin list of product --}}
                    <div class="shop-product-wrap grid gridview-3 row" id="listoFproduct">

                        @isset($products)
                            @forelse($products as $product)
                                <div class="col-lg-4">
                                    <div class="slide-item">
                                        <x-front.product-item :product=" $product">
                                        </x-front.product-item>
                                    </div>
                                    <div class="list-slide_item">
                                        <x-front.product-item-list :product=" $product">
                                        </x-front.product-item-list>
                                    </div>
                                </div>
                            @empty
                                <h2  class="text-center text-muted mt-4">No products with this name. try again !</h2>
                            @endforelse ($products as $product)
                        @endisset

                    </div>


                    <div class="row">
                        <div class="col-12 mb-2 d-flex flex-row-reverse">
                            @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $products->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper Area End Here -->

    <!-- Begin  Modal show product -->
    {{-- <x-front.modal-show-product></x-front.modal-show-product>
    --}}
    <!-- end Modal show product -->

@endsection

@section('js')
<script>


    /* add to card method */
    function addToCard(product_id) {
        var cardCount = parseInt($('.card-counter').text()[0]);
        if (product_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ url('carts/store') }}",
                data: {
                    product_id: product_id,
                },
                success: function(data) {
                    location.reload();

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

    /*-------------------Find products by subcategory----------------------------------*/

</script>
<script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
@endsection
