<div class="col-lg-3 order-2 order-lg-1">
    <div class="hiraola-sidebar-catagories_area">

        <div class="category-module hiraola-sidebar_categories">
            <div class="category-module_heading">
                <h5>Collections</h5>
            </div>
            <div class="module-body">
                <ul class="module-list_item">
                    @foreach ($collections as $collection)
                        <li>
                            {{-- <a href="javascript:void(0)"
                                class="text-uppercase font-weight-bold target">
                                --}} <a href="#pageSubmenu-{{ $collection->id }}"
                                    data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle text-uppercase font-weight-bold target">
                                    {{ $collection->name }} ({{ $collection->categories->count() }})
                                </a>
                                <ul class="collapse list-unstyled module-sub-list_item"
                                    id="pageSubmenu-{{ $collection->id }}">
                                    <li>
                                        @foreach ($collection->categories as $category)
                                            <a href="javascript:void(0)"
                                                class="text-capitalize font-weight-bold active">
                                                {{ $category->name }} ({{ $category->subCategories->count() }}) </a>
                                            <ul class="module-sub-list_item">
                                                <li>
                                                    @foreach ($category->subCategories as $subCategory)
                                                        <a class="subCategoryClick" {{--
                                                            data-subCategory="{{ $subCategory->id }}"
                                                            --}}
                                                            data-subCategory="{{ route('subcategory.products', $subCategory->id) }}"
                                                            href="javascript:void(0)"> {{ $subCategory->name }}
                                                            ({{ $subCategory->products->count() }})</a>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar-banner_area">
        <div class="banner-item img-hover_effect">
            <a href="javascript:void(0)">
                <img src="{{ asset('front/assets/images/banner/1_1.jpg') }}" alt="Hiraola's Shop Banner Image">
            </a>
        </div>
    </div>
</div>
