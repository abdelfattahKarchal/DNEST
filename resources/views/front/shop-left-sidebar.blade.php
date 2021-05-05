@extends('layout.app')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Single Product Style</h2>
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">{{ $collection_name ?? '' }}</li>
                </ul>
            </div>
        </div>
    </div>
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
                        <div class="my-auto">
                            <h5 class="mb-0">{{ $collection_name ?? '' }}</h5>
                        </div>

                        <div class="product-item-selection_area">

                            <div class="newsletter-form_wrap">
                                <form action="{{ url('search/product') }}" method="GET" class="form-inline">
                                    <input type="hidden" name="collection_name" value="{{$collection_name}}" />
                                    <div id="mc_embed_signup_scroll">
                                        <div id="mc-form" class="mc-form subscribe-form">
                                            <input type="text" name="product_name" id="product_name"
                                            placeholder="Cherchez un produit" class="newsletter-input form-control"/>
                                            <button class="newsletter-btn" type="submit" id="mc-submit">
                                                <i class="ion-ios-search-strong text-white" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- begin list of product --}}

                        @if($products && !$products->isEmpty())
                            <div class="shop-product-wrap grid gridview-3 row" id="listoFproduct">
                            @foreach($products as $product)
                                <div class="col-lg-4">
                                    <div class="slide-item">
                                        <x-front.product-item :product=" $product" :isNew="false">
                                        </x-front.product-item>
                                    </div>
                                    <div class="list-slide_item">
                                        <x-front.product-item-list :product=" $product" :isNew="false">
                                        </x-front.product-item-list>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        @else
                            <div class="text-center" style="margin: 50px;">
                                <img class="mb-4" width="100px" src="{{asset("front/assets/images/search.png")}}" />
                                <h5 class="text-muted">No result for "{{$productName}}".</h5>
                                <ul class="mt-3">
                                    <li>- Vérifiez que vous n'avez pas fait de faute de frappe : "Lirves" au lieu de "Livres"</li>
                                    <li>- Essayez avec un autre mot clé ou synonyme</li>
                                    <li>- Essayez d'effectuer une recherche plus générale, vous pourrez ensuite filtrer les résultats obtenus</li>
                                </ul>
                                <div class="mt-5 hiraola-btn-ps_center">
                                    <a class="hiraola-btn" href="{{ URL::previous() }}">Retour en arrière</a>
                                </div>
                            </div>
                        @endif

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
