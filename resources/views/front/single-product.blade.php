@extends('layout.app')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ $product->name }}</h2>
                <ul>
                    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $product->subCategory->category->collection->name }}</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">{{ $product->subCategory->category->name }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $product->subCategory->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Begin Single Product Area -->
    <div class="sp-area sp-tab-style_left">
        <div class="container">
            <div id="message-error" class="alert alert-danger" role="alert" style="display: none;">
                Erreur lors de l'ajout du produit
            </div>
            <div id="message-success" class="alert alert-success" role="alert" style="display: none;">
                Le produit ajouté avec succès
            </div>
            <div class="sp-nav">
                {{-- <nav aria-label="breadcrumb"> --}}
                {{-- <ol class="breadcrumb" style="border-radius: 0px !important;"> --}}
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="#">{{$product->subCategory->category->collection->name}}</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="#">{{$product->subCategory->category->name}}</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="#">{{$product->subCategory->name}}</a></li> --}}
                {{-- <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li> --}}
                {{-- </ol> --}}
                {{-- </nav> --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sp-img_area" id="img-gold">
                            <div class="zoompro-border sp-large_img">
                                @foreach ($product->images as $image)

                                    <img class="zoompro" src="{{ $image->urlLarge() }}"
                                        data-zoom-image="{{ $image->urlLarge() }}" alt="{{ $product->name }}" />
                                @break

                                @endforeach

                            </div>
                            <div id="gallery" class="sp-img_slider-3">
                                @foreach ($product->images as $image)
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
                                    @for ($i = 0; $i < $reviews_notes; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                    @for ($i = $reviews_notes; $i < 5; $i++)
                                        <li class="silver-color"><i class="fa fa-star"></i></li>
                                    @endfor

                                    <li class="ml-2">({{ count($product->reviews) }} Vues)</li>
                                    <li class="ml-2">({{ $order_product_count }} Commandes)</li>
                                </ul>
                            </div>
                            <div class="sp-essential_stuff">
                                <h6>Collection : {{ $product->subCategory->category->collection->name }}</h6>

                                <h6>Disponibilité : En stock</h6>

                                <hr />
                                @php
                                    $newPrice = $product->material_type == 'gold' ? $product->new_price : $product->new_price_silver;
                                    $oldPrice = $product->material_type == 'gold' ? $product->price : $product->price_silver;
                                @endphp
                                <div class="mt-4 new-price" style="font-size: 2rem">{{ $newPrice }} MAD
                                </div>
                                <div class="mt-2 align-middle">
                                    <span class="new-price align-middle"
                                        style="color: #bababa;text-decoration: line-through;font-size: 1.3rem;">{{ $oldPrice }}
                                        MAD</span>
                                    <span
                                        class="ml-2 badge badge-info align-middle">-{{ (int) ((($oldPrice - $newPrice) * 100) / $oldPrice) }}%</span>
                                </div>

                                <hr />

                            </div>

                            <div class="mt-4 sp-essential_stuff color-list_area">

                                <h6>Matière</h6>

                                <div class="color-list">
                                    @if ($product->material_type == 'all')
                                        <a id="gold" href='javascript:void(0)'
                                            class="single-color text-left {{ $material == 'gold' ? 'active' : '' }}"
                                            data-pid="{{ $product->id }}" data-swatch-color="red">
                                            <span class="bg-gold_color"></span>
                                            <span
                                                class="color-text">Or&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </a>
                                        <a id="silver" href="javascript:void(0)"
                                            class="single-color text-left {{ $material == 'silver' ? 'active' : '' }}"
                                            data-pid="{{ $product->id }}" data-swatch-color="orange">
                                            <span class="bg-silver_color"></span>
                                            <span
                                                class="color-text">Argent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </a>
                                    @endif
                                    @if ($product->material_type == 'gold')
                                        <a id="gold" href='javascript:void(0)'
                                            class="single-color text-left {{ $material == 'gold' ? 'active' : '' }}"
                                            data-pid="{{ $product->id }}" data-swatch-color="red">
                                            <span class="bg-gold_color"></span>
                                            <span
                                                class="color-text">Or&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </a>
                                    @endif

                                    @if ($product->material_type == 'silver')
                                        <a id="silver" href="javascript:void(0)"
                                            class="single-color text-left {{ $material == 'silver' ? 'active' : '' }}"
                                            data-pid="{{ $product->id }}" data-swatch-color="orange">
                                            <span class="bg-silver_color"></span>
                                            <span
                                                class="color-text">Argent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </a>
                                    @endif

                                </div>

                                @if ($product->has_size)
                                    <h6>Taille</h6>
                                    <select class="nice-select small" style="border-radius: 0px !important;"
                                        id="selected_size" name="selected_size">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->US }}">{{ $size->US }}</option>
                                        @endforeach
                                    </select>
                                @endif

                            </div>

                            <div class="align-bottom" style="margin-top: 65px !important;">
                                <button id="add-to-cart" class="hiraola-login_btn" type="button"
                                    onclick="addToCard({{ $product->id }})">
                                    Ajouter au panier
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
                                @if ($product->has_size)
                                    <li><a data-toggle="tab" href="#taille"><span>Taille</span></a>
                                @endif
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews">
                                        <span>Vues
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
                            @if ($product->has_size)
                                <div id="taille" class="tab-pane" role="tabpanel">
                                    <div class="product-description">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tailles Américaines</th>
                                                    <th scope="col">Tailles Européennes</th>
                                                    <th scope="col">MM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sizes as $size)
                                                    <tr>
                                                        <td>{{ $size->US }}</td>
                                                        <td>{{ $size->EU }}</td>
                                                        <td>{{ $size->MM }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            @endif
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="tab-pane active" id="tab-review">
                                    <form action="{{ url('reviews') }}" method="POST" class="form-horizontal"
                                        id="form-review">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div id="review">
                                            <table class="table table-striped">
                                                <tbody id="reviews-content">
                                                    @foreach ($product->reviews as $key => $review)
                                                        <tr>
                                                            <h5 class="{{ $key != 0 ? 'mt-4' : '' }}">
                                                                <strong>{{ $review->user->name ?? '' }}</strong>
                                                            </h5>
                                                            <p>{{ $review->created_at->format('d/m/Y') }} -
                                                                <span>
                                                                    @for ($i = 0; $i < $review->note; $i++)
                                                                        <i class="fa fa-star" style="color: #EBB805"></i>
                                                                    @endfor
                                                                    @for ($i = $review->note; $i < 5; $i++)
                                                                        <i class="fa fa-star" style="color: #bababa"></i>
                                                                    @endfor
                                                                </span>
                                                            </p>
                                                            <p class="mt-1">{{ $review->description }}</p>
                                                            <hr />
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @if (Auth::check())
                                            <h2>Ajouter un commentaire</h2>
                                            <div class="form-group required second-child">
                                                <div class="col-sm-12 p-0">
                                                    <label class="control-label">Donnez votre avis</label>
                                                    <textarea class="review-textarea" name="description" id="description"
                                                        required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group last-child required">
                                                <div class="col-sm-12 p-0">
                                                    <div class="your-opinion">
                                                        <label>Niveau de satisfaction</label>
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
                                                <div class="col-12 ml-auto col-md-2 mt-4 mb-4 form-group">
                                                    <button id="add-to-cart" type="submit" class="hiraola-login_btn"
                                                        style="display: inline !important;">Envoyer</button>
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

    <!-- Begin best sellers -->
    <div class="hiraola-product_area hiraola-product_area-2 mb-5">
        <x-front.special-product :specialProducts="$specialProducts"></x-front.special-product>
    </div>
    <!-- end best sellers -->

@endsection

@section('js')
    <script>
        /* add to card method */
        function addToCard(product_id) {

            var cardCount = parseInt($('.card-counter').text()[0]);
            var selectedSize = $('#selected_size').val();
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
                    success: function(data) {
                        $('.card-counter').text(data.length);
                        $("#block-addTocart").load(location.href + " #block-addTocart");
                        $('#message-success').show();
                        setTimeout(function() {
                            $('#message-success').hide();
                        }, 5000);
                    },
                    error: function(params) {
                        $('#message-error').show();
                    }
                });
            }
        }



        $('#gold').click(function(e) {
            e.preventDefault();
            var product_id = $('#gold').data('pid');
            window.location.href = "/products/" + product_id + "/material/gold";

        });

        $('#silver').click(function(e) {
            e.preventDefault();
            var product_id = $('#silver').data('pid');
            window.location.href = "/products/" + product_id + "/material/silver";

        });

    </script>

    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-dateFormat.js') }}"></script>
@endsection
