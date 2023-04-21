@extends('admin.layouts.master')
@section('title')
    View Orders Details - {{ env('APP_NAME') }}
@endsection
@push('styles')
@endpush

@section('content')
    @php
        use Illuminate\Support\Facades\Storage;
    @endphp
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">#{{ $order->order_number }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active">View Orders Details</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_group"><i
                            class="fa fa-plus"></i> Add Orders Details</a> --}}
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <h3 class="card"><span class="">Voucher Code :- &nbsp;  {{ $order['voucher_code'] }}</span></h3>
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title"><u>Shipping Informations</u> </h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Customer Name:-</div>
                                            <div class="text">
                                                {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="title">Shipping State:-</div>
                                            <div class="text">
                                                {{ $order->shipping_state }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Shipping Country:-</div>
                                            <div class="text">
                                                {{ $order->shipping_country }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Shipping Address:-</div>
                                            <div class="text">
                                                {{ $order->shipping_address }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Shipping Zipcode:-</div>
                                            <div class="text">
                                                {{ $order->shipping_zipcode }}
                                            </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title"><u>Billing Information</u> </h3>

                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Billing State:-</div>
                                            <div class="text">
                                                {{ $order->billing_state }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Billing Country:-</div>
                                            <div class="text">
                                                {{ $order->billing_country }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Billing Address:-</div>
                                            <div class="text">
                                                {{ $order->billing_address }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Billing Zipcode:-</div>
                                            <div class="text">
                                                {{ $order->billing_zipcode }}
                                            </div>
                                        </li>

                                        <li>
                                            <div class="title">Total Price:-</div>
                                            <div class="text">
                                                <span class=""> ${{ $order->grand_total }} </span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Package Details

                                    </h3>
                                    <table id="myTable" class="dd table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Package Image</th>
                                                <th> Package Name</th>
                                                <th>Package Validity</th>
                                                <th> Send To</th>
                                                <th>Send From</th>
                                                <th>Delivery Method</th>
                                                <th>Package Price</th>
                                                <th>Package Quantity</th>
                                                <th>Package Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="{{ asset('frontend_assets/img/gift.jpg') }}" alt="" width="50px" height="50px"></td>
                                                <td>
                                                    {{ $order->package->package_name }}
                                                </td>
                                                <td>
                                                    {{ $order->package->package_validity }}
                                                </td>
                                                <td>
                                                    {{ $order->send_to }}
                                                </td>
                                                <td>
                                                    {{ $order->send_from }}
                                                </td>
                                                <td>
                                                    {{ $order->delivery_method }}
                                                </td>
                                                <td>
                                                    $ {{ $order->grand_total }}
                                                </td>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    $ {{ $order->grand_total }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="text-right" align="right"> Grand Total:-</td>
                                                <td>
                                                    $ {{ $order->grand_total }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    @endsection

    @push('scripts')
    @endpush
