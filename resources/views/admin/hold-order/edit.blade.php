@extends('admin.layouts.master')
@section('title')
{{env('APP_NAME')}} | Edit Order Details
@endsection
@push('styles')
@endpush

@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
                        <li class="breadcrumb-item active">Edit Order Details</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_group"><i
                            class="fa fa-plus"></i> Add Order</a> --}}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Edit A Order</h6>
                        <hr>
                        <div class="card border-0 border-4">
                            <div class="card-body">
                                <form action="{{ route('orders.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order['id'] }}">
                                    <div class="border p-4 rounded">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Send To <span style="color: red;">*</span></label>
                                                <input type="text" name="send_to" id="" class="form-control" value="{{ $order['send_to'] }}" placeholder="Enter Order First Name">
                                                @if($errors->has('send_to'))
                                                <div class="error" style="color:red;">{{ $errors->first('send_to') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Shipping First Name <span style="color: red;">*</span></label>
                                                <input type="text" name="shipping_first_name" id="" class="form-control" value="{{ $order['shipping_first_name'] }}" placeholder="Enter Order First Name">
                                                @if($errors->has('shipping_first_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('shipping_first_name') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Shipping Last Name <span style="color: red;">*</span></label>
                                                <input type="text" name="shipping_last_name" id="" class="form-control" value="{{ $order['shipping_last_name'] }}" placeholder="Enter Order Last Name">
                                                @if($errors->has('shipping_last_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('shipping_last_name') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Shipping Address <span style="color: red;">*</span></label>
                                                <input type="text" name="shipping_address" id="" class="form-control" value="{{ $order['shipping_address'] }}" placeholder="Enter Order Address">
                                                @if($errors->has('shipping_address'))
                                                <div class="error" style="color:red;">{{ $errors->first('shipping_address') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Shipping State <span style="color: red;">*</span></label>
                                                <input type="text" name="shipping_state" id="" class="form-control" value="{{ $order['shipping_state'] }}" placeholder="Enter Order State">
                                                @if($errors->has('shipping_state'))
                                                <div class="error" style="color:red;">{{ $errors->first('shipping_state') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Shipping Country <span style="color: red;">*</span></label>
                                                <input type="text" name="shipping_country" id="" class="form-control" value="{{ $order['shipping_country'] }}" placeholder="Enter Order Country">
                                                @if($errors->has('shipping_country'))
                                                <div class="error" style="color:red;">{{ $errors->first('shipping_country') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Shipping Zip Code <span style="color: red;">*</span></label>
                                                <input type="text" name="shipping_zipcode" id="" class="form-control" value="{{ $order['shipping_zipcode'] }}" placeholder="Enter Order Zip Code">
                                                @if($errors->has('shipping_zipcode'))
                                                <div class="error" style="color:red;">{{ $errors->first('shipping_zipcode') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Billing First Name <span style="color: red;">*</span></label>
                                                <input type="text" name="billing_first_name" id="" class="form-control" value="{{ $order['billing_first_name'] }}" placeholder="Enter First Name">
                                                @if($errors->has('billing_first_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('billing_first_name') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Billing Last Name <span style="color: red;">*</span></label>
                                                <input type="text" name="billing_last_name" id="" class="form-control" value="{{ $order['billing_last_name'] }}" placeholder="Enter Last Name">
                                                @if($errors->has('billing_last_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('billing_last_name') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Billing Address <span style="color: red;">*</span></label>
                                                <input type="text" name="billing_address" id="" class="form-control" value="{{ $order['billing_address'] }}" placeholder="Enter Address">
                                                @if($errors->has('billing_address'))
                                                <div class="error" style="color:red;">{{ $errors->first('billing_address') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Billing State <span style="color: red;">*</span></label>
                                                <input type="text" name="billing_state" id="" class="form-control" value="{{ $order['billing_state'] }}" placeholder="Enter State">
                                                @if($errors->has('billing_state'))
                                                <div class="error" style="color:red;">{{ $errors->first('billing_state') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Billing Country <span style="color: red;">*</span></label>
                                                <input type="text" name="billing_country" id="" class="form-control" value="{{ $order['billing_country'] }}" placeholder="Enter Country">
                                                @if($errors->has('billing_country'))
                                                <div class="error" style="color:red;">{{ $errors->first('billing_country') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Billing Zip Code <span style="color: red;">*</span></label>
                                                <input type="text" name="billing_zipcode" id="" class="form-control" value="{{ $order['billing_zipcode'] }}" placeholder="Enter Zip Code">
                                                @if($errors->has('billing_zipcode'))
                                                <div class="error" style="color:red;">{{ $errors->first('billing_zipcode') }}</div>
                                                @endif
                                            </div>
                                        <div class="row" style="margin-top: 20px; float: left;">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn px-5 submit-btn">Update</button>
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

    </div>

</div>
@endsection

@push('scripts')

@endpush