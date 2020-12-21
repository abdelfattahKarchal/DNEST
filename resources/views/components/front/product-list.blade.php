{{-- @dd($products) --}}

<div class="shop-product-wrap grid gridview-3 row" id="listoFproduct">

    @isset($products)
        @foreach ($products as $product)
            <div class="col-lg-4">
                <div class="slide-item">
                    <x-front.product-item
                        :product=" $product">
                    </x-front.product-item>
                </div>
                <div class="list-slide_item">
                    <x-front.product-item-list
                        :product=" $product">
                    </x-front.product-item-list>
                </div>
            </div>
        @endforeach($products as $product)
    @endisset

</div>
<h2 id="noProduct" class="text-center text-muted mt-4">No products with this name. try again !</h2>

@section('js')
    <script>
            $('#noProduct').hide();
            $('#listoFproduct').show()
            $('#pagination').show()
            /* -------add content to list items of products------*/
            function productsToAppend(products,url =null, session_products) {
                var divis = '';
                //var sessionsproducts = session_products? session_products : <?php echo json_encode(Session::get('productsCardSession'));?>;
                var sessionsproducts = session_products;
                
                
                var productContent = '';
                var list_ids = [];
                var addDiv = '';
                var addDiv2 = '';
                var status_price = 'new-price';
                var new_price_div = '';
                // get ids of session products
                Object.entries(sessionsproducts).forEach(entry => {
                    const [key, value] = entry;
                    list_ids.push(value.id)
                    });
                    // looping products
                    products.forEach(product => {
                    if(product.active == 1){
                        // check if product has a new product
                        if (product.new_price){
                            status_price = 'old-price';
                            new_price_div = `
                                <div class="col-6"><span class="new-price">$`+ product.new_price +` </span>
                                </div>
                                <div class="col-6">
                                   <span class="old-price" style="color: #bababa;text-decoration: line-through;font-size: 14px;margin-left: 10px;">$ `+product.unit_price+`</span>
                                </div>
                            `;
                        }else{
                            new_price_div = `
                                <div class="col-6"><span class="new-price">$`+ product.unit_price +` </span>
                                </div>
                                
                            `;
                        }



                        
                        // check if product is in session
                        if (list_ids.includes(product.id)) {
                            addDiv = `
                            <li>
                                <a class="hiraola-add_cart" href="/orders" data-toggle="tooltip"
                                    data-placement="top" title="In your Cart"><i class="ion-checkmark"></i></a>
                            </li>
                            `;
                            addDiv2 = `
                            <li><a class="hiraola-add_cart" href="/orders" data-toggle="tooltip"
                                data-placement="top" title="Add To Cart">In cart</a>
                                </li>
                            `;
                        }else{
                            var url_pd_sub = url ? url :null;
                            addDiv = `
                            <li>
                                <a onclick="addToCard(`+product.id+`,'`+url_pd_sub+`')" class="hiraola-add_cart" href="javascript:void(0)" data-toggle="tooltip"
                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                            </li>
                            `;
                            addDiv2 = `
                            <li><a onclick="addToCard(`+product.id+`)" class="hiraola-add_cart" href="javascript:void(0)" data-toggle="tooltip"
                                data-placement="top" title="Add To Cart">Add To Cart</a>
                                </li>
                            `;
                        }

                         productContent += `

                                      <div class="col-lg-4">
                                          <div class="slide-item">
                                              <div class="single_product">
                                                  <div class="product-img">
                                                      <a href="{{ url('products/` + product.id + `') }}">
                                                          <img class="primary-img" src="` + product.path_small_1 +`" alt="` +product.name + `">
                                                          <img class="secondary-img" src="` + product.path_small_2 +`" alt="` +product.name +`">
                                                      </a>
                                                      <div class="add-actions">
                                                          <ul>
                                                            `+addDiv+`
                                                              
                                                          </ul>
                                                      </div>
                                                  </div>
                                                <div class="hiraola-product_content">
                                                    <div class="product-desc_info">
                                                        <h6><a class="product-name" href="{{ url('products/` +product.id + `') }}"> ` +
                                                                product.name + ` </a></h6>
                                                                <div class="row">
                                                            <div class="price-box col-12">
                                                                <div class="row">
                                                                    `+new_price_div+`
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-slide_item">
                                            <div class="single_product">
                                                <div class="product-img">
                                                    <a href="{{ url('products/` + product.id + `') }}">
                                                        <img class="primary-img" src="` + product.path_small_1 + `"
                                                            alt="` + product.name + `">
                                                        <img class="secondary-img" src="` + product.path_small_2 + `"
                                                            alt="` + product.name +`">
                                                    </a>
                                                </div>
                                                <div class="hiraola-product_content">
                                                    <div class="product-desc_info">
                                                        <h6><a class="product-name" href="{{ url('products/` +product.id + `') }}">` +product.name + `</a></h6>
                                                        <div class="row">
                                                            <div class="price-box col-12">
                                                                <div class="row">
                                                                    `+new_price_div+`
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-short_desc">
                                                            <p>` + product.name + `</p>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            `+addDiv2+`
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
              
                    }
              
              
              });
            return productContent;
                
            }

            /*------------------Search product---------------------------*/
            $('#product_search').on('input', function() {
                var search_value = $.trim($('#product_search').val())
                if (search_value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ url('products/search') }}",
                        data: {
                            name: search_value
                        },
                        success: function(data) {
                            if (data && Object.keys(data).length) {
                                productsContent = productsToAppend(data.products,null, data.sessionProducts);
                                if (productsContent && typeof productsContent !== undefined) {
                                    $('#noProduct').hide();
                                    $('#listoFproduct').show()
                                    $('#pagination').show()
                                    $('#listoFproduct').empty();
                                    $('#listoFproduct').append(productsContent);
                                }
                            } else {
                                $('#listoFproduct').hide()
                                $('#pagination').hide()
                                $('#noProduct').show();
                            }
                        }
                    });
                }
            });

       
        /* add to card method */
        function addToCard(product_id, url_pd_sub =null) {
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
                        if (url_pd_sub && url_pd_sub != 'null') {
                            findProductsBySubCategory('/'+url_pd_sub);
                        }else{
                           $("#listoFproduct").load(location.href + " #listoFproduct"); 
                        }
                        
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

        function findProductsBySubCategory (url_subcategory,subcategory_id=null) { 
                $('#listoFproduct').show()
                $('#pagination').show()
                $('#noProduct').hide();
                var url_subcategory1 = $(this).attr('data-subCategory');

                $.ajax({
                    type: 'GET',
                    url: url_subcategory,

                    success: function(data) {
                        var url_pd_sub = subcategory_id ? 'subcategory/'+subcategory_id+'/products': null;
                        var productContent = '';
                        productContent = productsToAppend(data.products, url_pd_sub, data.sessionProducts)

                        if (productContent && typeof productContent !== undefined) {
                            $('#listoFproduct').empty();
                            $('#listoFproduct').append(productContent);
                        }
                    }
                });
               
             }

    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
@endsection
