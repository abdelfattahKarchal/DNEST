@extends('layouts.app')
@section('content')
    <!-- Begin Hiraola's Content Wrapper Area -->
    <div class="hiraola-content_wrapper">
        <div class="container">
            <div class="row">
                {{-- begin left sidebar --}}
                <x-front.left-sidebar :collections="$collections"></x-front.left-sidebar>
                {{-- end left sidebar --}}

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="product-view-mode">
                            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top"
                                title="Grid View"><i class="fa fa-th"></i></a>
                            <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top"
                                title="List View"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="product-item-selection_area">
                            <div class="product-short">
                                <label class="select-label">Search:</label>
                                <input class="form-control" type="text" name="product_search" id="product_search" placeholder="Search your product...">
                                <button class="btn" style="background-color: #9b82bd" type="submit"> <i
                                        class="ion-ios-search-strong text-white"></i></button>
                            </div>
                        </div>
                    </div>
                    {{-- begin list of product --}}
                    <x-front.product-list
                        :products=" $products ?? $collections[3]->categories[0]->subCategories[0]->products">
                    </x-front.product-list>

                    <div class="row" id="pagination">
                        <div class="col-lg-12">
                            <div class="hiraola-paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul class="hiraola-pagination-box">
                                            <li class="active"><a href="javascript:void(0)">1</a></li>
                                            <li><a href="javascript:void(0)">2</a></li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a class="Next" href="javascript:void(0)"><i
                                                        class="ion-ios-arrow-right"></i></a></li>
                                            <li><a class="Next" href="javascript:void(0)">>|</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="product-select-box">
                                            <div class="product-short">
                                                <p>Showing 1 to 12 of 18 (2 Pages)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Content Wrapper Area End Here -->

    <!-- Begin  Modal show product -->
    <x-front.modal-show-product></x-front.modal-show-product>
    <!-- end Modal show product -->

@endsection
