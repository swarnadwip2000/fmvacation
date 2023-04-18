@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | Checkout Page
@endsection
@push('styles')
    <style>
        .myClass {
            color: red;
        }

        .error {
            color: #F00 !important;
            background-color: #FFF !important;
        }
    </style>
@endpush


@section('content')
    <section class="cart_sec">
        <div class="container">
            <div class="holder">
                <form action="{{ route('checkout.store') }}" method="post"class="require-validation">
                    @csrf
                    <div class="container">

                        <div class="row">

                            <input type="hidden" name="package_id" value="{{ $package['package_id'] }}">
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
                                                        placeholder="State" id="shipping_state"
                                                        @if ($address != null) value="{{ $address['state'] }}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>zip/postal code:</label>
                                                <div class="form-group">
                                                    <input type="text" name="shipping_zipcode"
                                                        class="form-control form-control--sm" placeholder="Enter zipcode"
                                                        id="shipping_zipcode"
                                                        @if ($address != null) value="{{ $address['zipcode'] }}" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                        <label>Address 1:</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control--sm"
                                                name="shipping_address" placeholder="Enter address" id="shipping_address"
                                                @if ($address != null) value="{{ $address['address'] }}" @endif>
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

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="cart-total-sm">
                                            <span>Subtotal</span>
                                            <span class="card-total-price">$
                                                {{ $package['package']['package_price'] }}</span>
                                        </div>
                                        <div class="clearfix mt-4">
                                            <button type="submit" class="shopnow">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>






    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    {{-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> --}}
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
        $('#formcheckoutCheckbox2').on('click', function() {
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
     {{-- <script type="text/javascript">
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvv').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // console.log(response.error);
                    toastr.error(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script> --}}
    <script>
        $('.require-validation').validate({
            rules: {
                'shipping_first_name': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                'shipping_last_name': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                
                'shipping_address': {
                    required: true,
                    minlength: 2,
                    maxlength: 100
                },
                'shipping_zipcode': {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
                'shipping_state': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                'shipping_country': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                'billing_first_name': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                'billing_last_name': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },

                'billing_address': {
                    required: true,
                    minlength: 2,
                    maxlength: 100
                },
                'billing_zipcode': {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
                'billing_state': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                'billing_country': {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
            },


            messages: {

                shipping_first_name: {
                    required: "Please enter your first name",
                    minlength: "Please enter a valid first name",
                    maxlength: "Please enter a valid first name"
                },
                shipping_last_name: {
                    required: "Please enter your last name",
                    minlength: "Please enter a valid last name",
                    maxlength: "Please enter a valid last name"
                },
                shipping_phone: {
                    required: "Please enter your phone number",
                    minlength: "Please enter a valid phone number",
                    maxlength: "Please enter a valid phone number"
                },
                shipping_address: {
                    required: "Please enter your shipping address",
                    minlength: "Please enter a valid shipping address",
                    maxlength: "Please enter a valid shipping address"
                },
                shipping_zipcode: {
                    required: "Please enter your shipping zipcode",
                    minlength: "Please enter a valid shipping zipcode",
                    maxlength: "Please enter a valid shipping zipcode"
                },
                shipping_state: {
                    required: "Please enter your shipping state",
                    minlength: "Please enter a valid shipping state",
                    maxlength: "Please enter a valid shipping state"
                },
                shipping_country: {
                    required: "Please enter your shipping country",
                    minlength: "Please enter a valid shipping country",
                    maxlength: "Please enter a valid shipping country"
                },

                billing_address: {
                    required: "Please enter your billing address",
                    minlength: "Please enter a valid billing address",
                    maxlength: "Please enter a valid billing address"
                },
                billing_zipcode: {
                    required: "Please enter your billing zipcode",
                    minlength: "Please enter a valid billing zipcode",
                    maxlength: "Please enter a valid billing zipcode"
                },
                billing_state: {
                    required: "Please enter your billing state",
                    minlength: "Please enter a valid billing state",
                    maxlength: "Please enter a valid billing state"
                },
                billing_country: {
                    required: "Please enter your billing country",
                    minlength: "Please enter a valid billing country",
                    maxlength: "Please enter a valid billing country"
                },


            }
        });
    </script>
    {{-- <script>
        $('#card-number').on('input propertychange paste', function() {
            var value = $('#card-number').val();
            var formattedValue = formatCardNumber(value);
            $('#card-number').val(formattedValue);
        });

        function formatCardNumber(value) {
            var value = value.replace(/\D/g, '');
            var formattedValue;
            var maxLength;
            // american express, 15 digits
            if ((/^3[47]\d{0,13}$/).test(value)) {
                formattedValue = value.replace(/(\d{4})/, '$1 ').replace(/(\d{4}) (\d{6})/, '$1 $2 ');
                maxLength = 17;
            } else if ((/^3(?:0[0-5]|[68]\d)\d{0,11}$/).test(value)) { // diner's club, 14 digits
                formattedValue = value.replace(/(\d{4})/, '$1 ').replace(/(\d{4}) (\d{6})/, '$1 $2 ');
                maxLength = 16;
            } else if ((/^\d{0,16}$/).test(value)) { // regular cc number, 16 digits
                formattedValue = value.replace(/(\d{4})/, '$1 ').replace(/(\d{4}) (\d{4})/, '$1 $2 ').replace(
                    /(\d{4}) (\d{4}) (\d{4})/, '$1 $2 $3 ');
                maxLength = 19;
            }

            $('#card-number').attr('maxlength', maxLength);
            return formattedValue;
        }
    </script> --}}
@endpush
