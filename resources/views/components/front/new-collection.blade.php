<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>Collections</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    <!-- Begin new products Slide Item -->
                    @foreach ($newCollections as $newCollection)
                    <div class="slide-item">
                        <x-front.collection-item :collection="$newCollection"> </x-front.collection-item>
                    </div>
                    @endforeach
                    <!-- End new products Slide Item -->
                </div>
            </div>
        </div>
    </div>
</div>
