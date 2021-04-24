<div class="latest-blog_area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>New collections</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="latest-blog_slider">
                    @foreach ($newCollections as $newCollection)
                        <div class="blog-slide_item">
                            <div class="blog-item">
                                <div class="blog-img img-hover_effect">
                                    <a href="{{ url('collections/' . $newCollection->id . '/products') }}">
                                        <img class="primary-img"
                                             src="{{ $newCollection->url_1() }}"
                                             alt="Collection image">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-heading">
                                        <h5>
                                            <a href="{{ url('collections/' . $newCollection->id . '/products') }}">{{ $newCollection->name }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
