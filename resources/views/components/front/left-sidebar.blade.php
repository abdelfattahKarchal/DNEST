    <div class="hiraola-sidebar-catagories_area">

        <div class="category-module hiraola-sidebar_categories">
            <div class="category-module_heading">
                <h5>Collections</h5>
            </div>
            <div class="module-body">
                <ul class="module-list_item">
                    @foreach ($collections as $collection)
                        @if ($collection->active == 1)
                            <li>
                                {{-- <a href="javascript:void(0)"
                                    class="text-uppercase font-weight-bold target">
                                    --}} <a href="#pageSubmenu-{{ $collection->id }}"
                                        data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle text-uppercase font-weight-bold target">
                                        {{ $collection->name }}
                                    </a>
                                    <ul class="collapse list-unstyled module-sub-list_item"
                                        id="pageSubmenu-{{ $collection->id }}">
                                        <li>
                                            @foreach ($collection->categories as $category)
                                                @if ($category->active == 1)
                                                    <a href="javascript:void(0)"
                                                        class="text-capitalize font-weight-bold active">
                                                        {{ $category->name }}
                                                    </a>
                                                    <ul class="module-sub-list_item">
                                                        <li>
                                                            @foreach ($category->subCategories as $subCategory)
                                                                @if ($subCategory->active == 1)
                                                                    @php
                                                                    $url = route('subcategory.products',
                                                                    $subCategory->id);
                                                                    @endphp
                                                                    <a class="subCategoryClick"
                                                                        data-subCategory="{{ route('subcategory.products', $subCategory->id) }}"
                                                                        href="{{ route('subcategory.products',$subCategory->id) }}">
                                                                        {{ $subCategory->name }}
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                            </li>
                        @endif

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
