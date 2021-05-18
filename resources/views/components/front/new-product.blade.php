
<div class="hiraola-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-section_title">
                    <h4>Nouveautés</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="hiraola-product_slider">
                    <!-- Begin new products Slide Item -->
                    @foreach ($newProducts as $newProduct)
                    <div class="slide-item">
                        <x-front.product-item :product="$newProduct" :isNew="true"> </x-front.product-item>
                    </div>
                    @endforeach
                    <!-- End new products Slide Item -->
                </div>
            </div>
        </div>
    </div>
</div>

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

                         // $("#listOfNewProduct").load(location.href + "#listOfNewProduct");
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
</script>
<script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
@endsection
