@extends('layout.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('front/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    <main class="page-content">
        <!-- Begin Account Page -->
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-details-tab" data-toggle="tab" href="#account-details"
                                    role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                            </li>
                           {{--  <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                            {{--     <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                                    role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title mb-5">MY ORDERS</h4>
                                    @if(count($my_orders) > 0)
                                        <div class="table-responsive">
                                        <table id="orders-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ORDER</th>
                                                    <th>DATE</th>
                                                    <th>STATUS</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse ($my_orders as $order)

                                                    <tr>
                                                        <td><a class="account-order-id"
                                                                href="javascript:void(0)">{{ $order->id }}</a></td>
                                                        <td>{{ $order->created_at }}</td>
                                                        <td>{{ $order->status->label == 'not confirmed' || $order->status->label == 'in progress' ? 'in progress' : $order->status->label }}
                                                        </td>
                                                        @php
                                                            $quantity_total = 0;
                                                        @endphp

                                                        @foreach ($order->products as $product)
                                                            @php
                                                                $quantity_total += $product->pivot->quantity;
                                                            @endphp
                                                        @endforeach
                                                        <td>${{ $order->total_price }} for {{ $quantity_total }} item(s)
                                                        </td>
                                                        {{-- <td><a href="javascript:void(0)"
                                                                class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                                                        </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">
                                                            <span> No orders yet !</span>
                                                        </td>
                                                    </tr>

                                                @endforelse


                                            </tbody>

                                        </table>
                                    </div>
                                    @else
                                        <div class="text-center">
                                            <img style="margin-top: 50px;" src="{{asset("front/assets/images/test.png")}}" />
                                            <h5 class="text-muted">Your cart is empty.</h5>
                                            <ul class="mt-3">
                                                <li>Explorez nos catégories et découvrez nos meilleures offres!</li>
                                            </ul>
                                            <div class="mt-5 hiraola-btn-ps_center">
                                                <a class="hiraola-btn" href="{{ url('/') }}">Shopping now</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <h4 class="small-title mb-5">MY ACCOUNT DETAILS</h4>
                                    <form id="form-myaccount-details" action="#" class="hiraola-form" style="border: none; padding:0;">
                                        @csrf
                                        <div class="alert alert-success" id="success-alert-account" style="display: none"></div>
                                        <div id="alert-error-account" class="alert alert-danger" style="display: none"></div>
                                        <div class="hiraola-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="fname">First Name*</label>
                                                <input type="text" name="fname" id="fname"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="lname">Last Name*</label>
                                                <input type="text" name="lname" id="lname"
                                                    value="{{ Auth::user()->lname }}">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="phone">Phone*</label>
                                                <input type="phone" name="phone" id="phone"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="email">Email*</label>
                                                <input type="email" name="email" id="email"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="single-input">
                                                <label for="address">Personal address*</label>
                                                <input type="text" name="address" id="address" value="{{ Auth::user()->address }}">
                                            </div>
                                            <div class="single-input">
                                                <label for="shipping_address">Shipping address*</label>
                                                <input type="shipping_address" name="shipping_address" id="shipping_address" value="{{ Auth::user()->shipping_address ?? Auth::user()->address }}">
                                            </div>

                                            <div class="single-input">
                                                <label for="old_password">Current Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" name="old_password" id="old_password">
                                            </div>
                                            <div class="single-input">
                                                <label for="new_password">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" name="new_password" id="new_password">
                                            </div>
                                            <div class="single-input">
                                                <label for="confirmation_password">Confirm New Password</label>
                                                <input type="password" name="confirmation_password"
                                                    id="confirmation_password">
                                            </div>
                                            <div class="single-input">
                                                <div class="form-group last-child required">
                                                    <div class="hiraola-btn-ps_right cart-page text-right">
                                                        <a onclick="updateInformationAccount({{ Auth::user()->id }})"
                                                            href="javascript:void(0)"> Save changes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Account Page End Here -->
    </main>
@endsection
@section('js')
<script>


    closeAlertMessage();

    /* function saveAddress(client_id) {
        $.ajax({
            url: 'myaccount/' + client_id + '/address',
            type: 'put',
            dataType: 'json',
            data: $('form#form_address').serialize(),
            success: function(data) {
                if (data) {
                    $('#alert-error-address').hide();
                    $('#success-alert').empty();
                    var text =
                        '<button onclick = "closeAlertMessage()" type="button" class="close">&times;</button>';
                    $("#success-alert").append(text, '<strong>Success! </strong> Adress have added.');
                    $('#success-alert').show();
                }
            },
            error: function(data) {
                $('#success-alert').hide();
                $('#alert-error-address').empty();
                var text =
                    '<button onclick = "closeAlertMessage()" type="button" class="close">&times;</button>';
                $("#alert-error-address").append(text, jQuery.parseJSON(data.responseText).errors.address[
                    0]);
                $('#alert-error-address').show();
            }
        });
    } */

    function closeAlertMessage() {
        //$('#alert-error-address').hide();
        //$('#success-alert').hide();
        $('#success-alert-account').hide();
        $('#alert-error-account').hide();
    }

    function updateInformationAccount(client_id) {
        $.ajax({
            url: 'myaccount/' + client_id,
            type: 'put',
            dataType: 'json',
            data: $('form#form-myaccount-details').serialize(),
            success: function(data) {
                console.log(data);
                if (data) {
                    $('#alert-error-account').hide();
                    $('#success-alert-account').empty();
                    var text =
                        '<button onclick = "closeAlertMessage()" type="button" class="close">&times;</button>';
                    $("#success-alert-account").append(text, '<strong>Success! </strong> Informations have changed.');
                    $('#success-alert-account').show();
                }
            },
            error: function(data) {
                console.log(data);
                $('#success-alert-account').hide();
                $('#alert-error-account').empty();
                if (data.responseJSON.code) {
                    $("#alert-error-account").append(data.responseJSON.message);
                }
                var text =
                    '<button onclick = "closeAlertMessage()" type="button" class="close">&times;</button> <ul>';
                    $("#alert-error-account").append(text);
                $.each(jQuery.parseJSON(data.responseText).errors, function(index, value) {
                    console.log(index + ": " + value);
                    $("#alert-error-account").append('<li>'+ value + '</li>');
                });
                $("#alert-error-account").append('</ul>');

                $('#alert-error-account').show();
            }
        });
    }
    $(document).ready(function() {
    $('#orders-table').DataTable({
        "order": []
    });
} );

</script>
<script src="{{ asset('front/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('front/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

@endsection
