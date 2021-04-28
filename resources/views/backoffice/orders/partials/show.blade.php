@extends('layout.admin')

@section('style')
    <!-- -------------JQuery DataTable Css not in index -->
    <link href="{{ asset('backoffice/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
        rel="stylesheet">
    <!-- ------------- end JQuery DataTable Css not in index -->
@endsection

@section('content')

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="{{ asset('backoffice/images/user-lg.jpg') }}" alt="AdminBSB - Profile Image" />
                    </div>
                    <div class="content-area">
                        <h3>{{ $order->user->name }}</h3>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                        <li>
                            <span>Products</span>
                            <span class="badge bg-orange">{{ count($order->products) }}</span>
                        </li>
                        <li>
                            <span>Command</span>
                            <span class="badge bg-orange">{{ $order->status->label }}</span>
                        </li>
                    </ul>
                    @switch($order->status->label)
                        @case('in progress')
                            @php
                            $status = 'confirmed'
                            @endphp
                        @break
                        @case('not confirmed')
                            @php
                            $status = 'in progress'
                            @endphp
                        @break
                        @case('canceled')
                            @php
                            $status = 'not confirmed'
                            @endphp
                        @break
                        @default
                            @php
                            $status = 'in progress'
                            @endphp
                    @endswitch
                    @if ($order->status->label != 'confirmed')
                        <a onclick="changeOrderStatus({{ $order->id }}, '{{ $status }}')" href="javascript:void(0);"
                            class="btn btn-success btn-lg waves-effect btn-block">Change to {{ $status }} </a>
                    @endif
                        @if ($order->status->label != 'canceled')
                            <a onclick="cancelOrder({{ $order->id }})" href="javascript:void(0);" class="btn btn-danger btn-lg waves-effect btn-block">Cancel
                        order </a>
                        @endif
                    
                </div>
            </div>

            <div class="card card-about-me">
                <div class="header">
                    <h2>ABOUT User</h2>
                </div>
                <div class="body">
                    <ul>
                        <li>
                            <div class="title">
                                <i class="material-icons">email</i>
                                Email
                            </div>
                            <div class="content">
                                {{ $order->user->email }}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">location_on</i>
                                Address
                            </div>
                            <div class="content">
                                User Address : {{ $order->user->address }}
                                @if ($order->shipping_address)
                                    <br>
                                    Shipping Address : {{ $order->shipping_address}}
                                @endif
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-9">
            <!-- Exportable Table -->
            <div class="row clearfix" id="category-table">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of products
                            </h2>
                            {{-- <ul class="header-dropdown m-r--5">
                                <a href="{{ route('products.create') }}" title="add new product" type="button"
                                    class="btn btn-success waves-effect">new sub
                                    order</a>
                            </ul> --}}
                            <x-back.success type="margin-top: 15px;"></x-back.success>

                        </div>


                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($order->products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                {{-- <td>{{ $product->price }}</td>
                                                --}}
                                                <td>{{ $product->pivot->price }}</td>
                                                <td>{{ $product->pivot->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        function changeOrderStatus(id, status, btnColor = '2b982b') {
            Swal.fire({
                title: 'do you make order to '+status+' ?',
                showCancelButton: true,
                confirmButtonText: `Validate`,
                confirmButtonColor: '#'+btnColor,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "/orders/" + id + "/status",
                        data: {
                            "status": status
                        },
                        success: function(data) {
                            location.reload();
                            //$("#category-table").load(location.href + " #category-table");
                            //location.replace("/admin/collections")
                        }
                    });
                }
            });
        }

        function cancelOrder(id) {
            changeOrderStatus(id, 'canceled', 'fb483a');
        }

    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('backoffice/js/pages/examples/profile.js') }}"></script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>

    <!-- Jquery Core Js -->
    <script src="{{ asset('backoffice/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('backoffice/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('backoffice/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('backoffice/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('backoffice/plugins/node-waves/waves.js') }}"></script>

    <!-- ----------------- not exist in index ------------------------------------------- -->
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backoffice/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/pages/tables/jquery-datatable.js') }}"></script>

    <!-- ----------------- end not exist in index ------------------------------------------- -->

@endsection
