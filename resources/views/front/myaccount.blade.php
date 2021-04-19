@extends('layout.app')
@section('content')
    <main class="page-content">
        <!-- Begin Hiraola's Account Page Area -->
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                                    role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details"
                                    role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-logout-tab" href="login-register.html" role="tab"
                                    aria-selected="false">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Hello <b>{{ Auth::user()->name }}</b> </p>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and
                                        billing addresses and edit your password and account
                                            details.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">MY ORDERS</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>ORDER</th>
                                                    <th>DATE</th>
                                                    <th>STATUS</th>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                </tr>
                                                @forelse ($my_orders as $order)
                                                    <tr>
                                                        <td><a class="account-order-id"
                                                                href="javascript:void(0)">{{ $order->id }}</a></td>
                                                        <td>{{ $order->created_at }}</td>
                                                        <td>{{ ($order->status->label == 'not confirmed' || $order->status->label == 'in progress' ) ? 'in progress' : $order->status->label}}</td>
                                                        @php
                                                            $quantity_total = 0;
                                                        @endphp

                                                        @foreach ($order->products as $product)
                                                            @php
                                                                $quantity_total += $product->pivot->quantity;
                                                            @endphp
                                                        @endforeach
                                                        <td>${{ $order->total_price }} for {{ $quantity_total }} item(s)</td>
                                                        <td><a href="javascript:void(0)"
                                                                class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                                                        </td>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-address" role="tabpanel"
                                aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="small-title">BILLING ADDRESS</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                        <div class="col">
                                            <h4 class="small-title">SHIPPING ADDRESS</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="#" class="hiraola-form">
                                        <div class="hiraola-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="account-details-firstname">First Name*</label>
                                                <input type="text" id="account-details-firstname">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="account-details-lastname">Last Name*</label>
                                                <input type="text" id="account-details-lastname">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input type="email" id="account-details-email">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-oldpass">Current Password(leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-oldpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-newpass">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-newpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-confpass">Confirm New Password</label>
                                                <input type="password" id="account-details-confpass">
                                            </div>
                                            <div class="single-input">
                                                <button class="hiraola-btn hiraola-btn_dark" type="submit"><span>SAVE
                                                        CHANGES</span></button>
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
        <!-- Hiraola's Account Page Area End Here -->
    </main>
@endsection
