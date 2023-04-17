@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | Cart
@endsection
@push('styles')
@endpush
@section('content')

    <section class="cart_sec">
        <div class="container">
            @if (isset($packageCart))
                <div class="cart_box">
                    <h2>Cart</h2>
                    <div class="row" id="remove">
                        <div class="col-lg-8">
                            <div class="cart_left_box mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="left_img_text">
                                        <div class="cart_small_img">
                                            <img src="img/gift.jpg" alt="" />
                                        </div>
                                        <div class="img_left_text">
                                            <h5>{{ $packageCart['package']['package_name'] }}</h5>
                                            <p><b>To:</b> {{ $packageCart['send_to'] }}</p>
                                            <p><b>From:</b> {{ $packageCart['send_from'] }}</p>
                                            <p><b>Gift Message:</b> {{ $packageCart['send_message'] }}</p>
                                            <p><b>Delivery Method:</b> {{ $packageCart['delivery_method'] }}</p>
                                        </div>
                                    </div>
                                    <div class="right_text">
                                        <div class="price my-2">${{ $packageCart['package']['package_price'] }}</div>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" id="remove-package" data-id="{{ $packageCart['id'] }}"
                                    class="cross_icon"><i class="ph ph-x"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart_right">
                                <div class="row m-0">
                                    <div class="col-sm-8 p-0">
                                        <h6>Subtotal</h6>
                                    </div>
                                    <div class="col-sm-4 p-0">
                                        <p id="subtotal">${{ $packageCart['package']['package_price'] }}</p>
                                    </div>
                                </div>

                                <hr>
                                <div class="row mx-0 mb-2">
                                    <div class="col-sm-8 p-0 d-inline">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-sm-4 p-0">
                                        <p id="total">${{ $packageCart['package']['package_price'] }}</p>
                                    </div>
                                </div>
                                @if (Auth::check() && Auth::user()->hasRole('USER'))
                                    <a href="{{ route('checkout') }}"><button id="btn-checkout"
                                            class="shopnow"><span>Checkout</span></button></a>
                                @else
                                    <a href="{{ route('login') }}"><button id="btn-checkout"
                                            class="shopnow"><span>Checkout</span></button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart_box">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Your cart is empty</h2>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#remove-package').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('frontend.cart.remove') }}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#remove').remove();
                            $('.top__footer').append(
                                '<h2 class="text-center">Your cart is empty</h2>');
                        }
                    }
                })
            })
        })
    </script>
@endpush
