
<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>VOUS AIMERIEZ AUSSI</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    <!-- Begin new products Slide Item -->
                    @foreach ($specialProducts as $specialProduct)
                    <div class="slide-item">
                        <x-front.product-item :product="$specialProduct" :isNew="false"> </x-front.product-item>
                    </div>
                    @endforeach
                    <!-- End new products Slide Item -->

                </div>
            </div>
        </div>
    </div>
</div>

