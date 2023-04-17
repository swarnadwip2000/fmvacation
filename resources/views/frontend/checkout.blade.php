@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | Our Package
@endsection
@push('styles')
@endpush


@section('content')
    <section class="cart_sec">
        <div class="container">
            <div class="holder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Shipping Address</h2>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <label>First Name:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm"
                                                    placeholder="Enter name" name="shipping_first_name"
                                                    @if ($address == null) value="{{ Auth::user()->first_name }}" @else value="{{ $address['first_name'] }}" @endif
                                                    id="shipping_first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm"
                                                    placeholder="Enter name" name="shipping_last_name"
                                                    @if ($address == null) value="{{ Auth::user()->last_name }}" @else value="{{ $address['last_name'] }}" @endif
                                                    id="shipping_last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4"></div>
                                    <label>Country:</label>
                                    <div class="form-group select-wrapper">
                                        <input class="form-control form-control--sm" name="shipping_country"
                                            placeholder="Country" id="shipping_country"
                                            @if ($address != null) value="{{ $address['country'] }}" @endif>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>State:</label>
                                            <div class="form-group select-wrapper">
                                                <input class="form-control form-control--sm" name="shipping_state"
                                                    placeholder="State" id="shipping_state"  @if ($address != null) value="{{ $address['state'] }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>zip/postal code:</label>
                                            <div class="form-group">
                                                <input type="text" name="shipping_zipcode"
                                                    class="form-control form-control--sm" placeholder="Enter zipcode"
                                                    id="shipping_zipcode"  @if ($address != null) value="{{ $address['zipcode'] }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4"></div>
                                    <label>Address 1:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control--sm" name="shipping_address"
                                            placeholder="Enter address" id="shipping_address"  @if ($address != null) value="{{ $address['address'] }}" @endif>
                                    </div>
                                    <div class="clearfix">
                                        <input id="formcheckoutCheckbox1" name="checkbox1" type="checkbox"
                                            @if ($address != null) checked @endif>
                                        <label for="formcheckoutCheckbox1">Save address to my account</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Billing Address</h2>
                                    <div class="clearfix">
                                        <input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox">
                                        <label for="formcheckoutCheckbox2">The same as shipping address</label>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <label>First Name:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm"
                                                    placeholder="Enter name" name="billing_first_name"
                                                    @if ($address == null) value="{{ Auth::user()->name }}" @else value="{{ $address['billing_first_name'] }}" @endif
                                                    id="billing_first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm"
                                                    placeholder="Enter name" name="billing_last_name"
                                                    @if ($address == null) value="{{ Auth::user()->last_name }}" @else value="{{ $address['billing_last_name'] }}" @endif
                                                    id="billing_last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4"></div>
                                    <label>Country:</label>
                                    <div class="form-group select-wrapper">
                                        <input class="form-control form-control--sm" name="billing_country"
                                            placeholder="Country" id="billing_country">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>State:</label>
                                            <div class="form-group select-wrapper">
                                                <input class="form-control form-control--sm" name="billing_state"
                                                    placeholder="State" id="billing_state">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>zip/postal code:</label>
                                            <div class="form-group">
                                                <input type="text" name="billing_zipcode"
                                                    class="form-control form-control--sm" placeholder="Enter zipcode"
                                                    id="billing_zipcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4"></div>
                                    <label>Address 1:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control--sm"
                                            name="billing_address" placeholder="Enter address" id="billing_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="cart-total-sm">
                                        <span>Subtotal</span>
                                        <span class="card-total-price">$ {{ $package['package']['package_price'] }}</span>
                                    </div>
                                    <div class="clearfix mt-4">
                                        <button type="submit" class="shopnow">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
    <script>
        $('#formcheckoutCheckbox1').on('change', function() {
            if ($(this).is(':checked')) {
                var shipping_country = $('#shipping_country').val();
                var shipping_state = $('#shipping_state').val();
                var shipping_zipcode = $('#shipping_zipcode').val();
                var shipping_address = $('#shipping_address').val();
                var shipping_first_name = $('#shipping_first_name').val();
                var shipping_last_name = $('#shipping_last_name').val();
                $.ajax({
                    url: "{{ route('save.address') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": shipping_country,
                        "state": shipping_state,
                        "zipcode": shipping_zipcode,
                        "address": shipping_address,
                        "first_name": shipping_first_name,
                        "last_name": shipping_last_name,
                    },
                    success: function(data) {
                        toastr.success('Address saved successfully');
                    }
                });
            }
        });
    </script>
    <script>
        $('#formcheckoutCheckbox2').on('click', function(){
            if ($(this).is(':checked')) {
                var shipping_country = $('#shipping_country').val();
                var shipping_state = $('#shipping_state').val();
                var shipping_zipcode = $('#shipping_zipcode').val();
                var shipping_address = $('#shipping_address').val();
                var shipping_first_name = $('#shipping_first_name').val();
                var shipping_last_name = $('#shipping_last_name').val();
                $('#billing_country').val(shipping_country);
                $('#billing_state').val(shipping_state);
                $('#billing_zipcode').val(shipping_zipcode);
                $('#billing_address').val(shipping_address);
                $('#billing_first_name').val(shipping_first_name);
                $('#billing_last_name').val(shipping_last_name);
            } else {
                $('#billing_country').val('');
                $('#billing_state').val('');
                $('#billing_zipcode').val('');
                $('#billing_address').val('');
                $('#billing_first_name').val('');
                $('#billing_last_name').val('');
            }
        });
    </script>
@endpush
