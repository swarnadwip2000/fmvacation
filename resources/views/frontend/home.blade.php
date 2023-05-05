@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | HOME
@endsection
@push('styles')
    <style>
        .error {
            color: red !important;
        }
    </style>
@endpush


@section('content')
    <section class="Section1 container" style="top: -10vh;">
        <div class="BrandLogos">
            <img src="{{ asset('frontend_assets/img/BrandLogos_HG_Medium.png') }}" class="img-fluid" />
        </div>

        <div style="clear: both;"></div>
    </section>

    <section class="pricing-section">
        <div class="container">
            <div class="sec-title text-center">
                <span class="title">Get plan</span>
                <h2>Choose Your Package</h2>
            </div>

            <div class="outer-box">
                <div class="row">
                    <!-- Pricing Block -->
                    @foreach ($packages as $key => $package)
                        @if ($key == 0)
                            <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <h4>{{ $package['package_name'] }}</h4>
                                        <div class="icon-outer"><i class="ph ph-paper-plane-tilt"></i></div>
                                    </div>
                                    <div class="price-box">
                                        <div class="title"> {{ $package['package_validity'] }}</div>
                                        <h4 class="price">${{ $package['package_price'] }}</h4>
                                    </div>
                                    <ul class="features">
                                        <li class="true">Experience certificates</li>
                                        <li class="true">Membership</li>
                                        <li class="true">Member exclusive rate</li>
                                        <li class="true">Booking before 30days</li>
                                        <li class="true">Reward points 299 pts</li>
                                        <li class="true">Welcome benefits</li>
                                        <li class="false">No discount on renewals</li>
                                        <li class="false">Room Upgrades</li>
                                        <li class="false">Complimentary breakfast</li>
                                        <li class="false">Late Checkouts</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY
                                            Package</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                    <!-- Pricing Block -->
                    @foreach ($packages as $key => $package)
                        @if ($key == 1)
                            <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <h4>{{ $package['package_name'] }}</h4>
                                        <div class="icon-outer"><i class="ph ph-sketch-logo"></i></div>
                                    </div>
                                    <div class="price-box">
                                        <div class="title">{{ $package['package_validity'] }}</div>
                                        <h4 class="price">${{ $package['package_price'] }}</h4>
                                    </div>
                                    <ul class="features">
                                        <li class="true">Experience certificates</li>
                                        <li class="true">Membership</li>
                                        <li class="true">Member exclusive rate</li>
                                        <li class="true">Booking before 35days</li>
                                        <li class="true">Reward points 499 pts</li>
                                        <li class="true">Welcome benefits</li>
                                        <li class="true">5% discount on renewals</li>
                                        <li class="true">Room Upgrades</li>
                                        <li class="false">Complimentary breakfast</li>
                                        <li class="false">Late Checkouts</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY
                                            Package</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- Pricing Block -->
                    @foreach ($packages as $key => $package)
                        @if ($key == 2)
                            <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <h4>{{ $package['package_name'] }}</h4>
                                        <div class="icon-outer"><i class="ph ph-rocket"></i></div>
                                    </div>
                                    <div class="price-box">
                                        <div class="title">{{ $package['package_validity'] }}</div>
                                        <h4 class="price">${{ $package['package_price'] }}</h4>
                                    </div>

                                    <ul class="features">
                                        <li class="true">Experience certificates</li>
                                        <li class="true">Membership</li>
                                        <li class="true">Member exclusive rate</li>
                                        <li class="true">Booking before 45days</li>
                                        <li class="true">Reward points 799 pts</li>
                                        <li class="true">Welcome benefits</li>
                                        <li class="true">10% discount on renewals</li>
                                        <li class="true">Room Upgrades</li>
                                        <li class="true">Complimentary breakfast</li>
                                        <li class="true">Late Checkouts</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY
                                            Package</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="step_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="resort_inner_title text-center mb-5" data-aos="flip-up" data-aos-duration="1000">
                        <h2><strong>3 Quick Steps<br>To Redeem Your Travel Voucher </strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="step_inner">
                        <li class="step_single_wrapper" data-aos="fade-right" data-aos-duration="500">
                            <span class="step_count">1</span>
                            <div class="step_single">
                                <div class="step_content">
                                    <span class="step_icon">
                                        <i class="ph-file-text"></i>
                                    </span>
                                    <h4>Register</h4>
                                    <p>Create a user account on our website & buy travel vouchers to enhance
                                        your travel experiences. </p>
                                </div>
                            </div>

                        </li>
                        <li class="step_single_wrapper step2" data-aos="fade-right" data-aos-duration="1500">
                            <span class="step_count">2</span>
                            <div class="step_single">
                                <div class="step_content">
                                    <span class="step_icon">
                                        <i class="ph-file-text"></i>
                                    </span>
                                    <h4>Explore </h4>
                                    <p>Browse through the amazing travel destination & tour packages you can
                                        enjoy. </p>
                                </div>
                            </div>
                        </li>
                        <li class="step_single_wrapper step3" data-aos="fade-right" data-aos-duration="2500">
                            <span class="step_count">3</span>
                            <div class="step_single">
                                <div class="step_content">
                                    <span class="step_icon">
                                        <i class="ph-file-text"></i>
                                    </span>
                                    <h4>Redeem </h4>
                                    <p>Contact us for the redemption of the voucher prior based on the voucher you have
                                        taken. For more info, look into Redemption Policy. </p>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Section3" style="padding:0; margin:0;">

        <div class="Title">Made to spread happiness</div>
        <div class="FactsDesktop">
            <div class="Facts Row1">
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsValidity_HG.svg') }}">
                    </div>
                    <div class="Title">1 year validity</div>
                    <div class="SubTitle">plenty of time to redeem</div>
                </div>
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsDelivery_HG.svg') }}">
                    </div>
                    <div class="Title">Free priority shipment all accross Australia</div>
                    <div class="SubTitle">&amp; instant shipment of eGifts</div>
                </div>
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsPersonalise_HG.svg') }}">
                    </div>
                    <div class="Title">Personalize it</div>
                    <div class="SubTitle">with a photo &amp; message</div>
                </div>
            </div>
            <div class="Facts Row2">
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsSustainability_HG.svg') }}">
                    </div>
                    <div class="Title">Sustainability </div>
                    <div class="SubTitle">we care about the planet</div>
                </div>
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsBooking_HG.svg') }}"></div>
                    <div class="Title">Best hotels</div>
                    <div class="SubTitle">find your new favourite</div>
                </div>
            </div>
        </div>
    </section>
    <section class="whygive">
        <h2>Why give FM Vacation? </h2>
        <div class="Text">
            <ul>
                <li>Redeem for 140+ hotel brands in over 170 countries</li>
                <li>Personalize with a photo &amp; message</li>
                <li>Free priority shipment of physical gift cards</li>
                <li>Instant email of PDF and eGift</li>
                <li>Loved by thousands of gift recipients each month</li>
            </ul>
        </div>
    </section>
    <section class="Section4 HG">
        <div class="Quotes">“</div>
        <h2>What others say </h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="MediaWidget multiple-items">
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "If you're someone who loves to travel, then you definitely need to check out FM Vacation. I
                                recently used their vouchers and I have to say, I was blown away by the discounts and the
                                quality of the deals offered.
                                The selection of destinations is vast and covers a wide range of interests. Whether you're
                                looking for a relaxing beach vacation, an adventure-filled trip to the mountains, or a
                                cultural experience in a foreign country, you're sure to find a deal that suits your needs."
                            </div>
                        </div>
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "The booking process was also very easy and straightforward. All I had to do was select my
                                destination, choose my travel dates, select your hotel & redeem your hotel gift card. The
                                website provided all the necessary information about the booking process, including payment
                                options and cancellation policies. I highly recommend FM Vacation to anyone who is planning
                                a trip and looking for great hotels. With a wide selection of hotels and significant offers,
                                it's definitely worth checking out." </div>
                        </div>
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "One of the things I loved about the FM Vacation gift card was the flexibility it offered.
                                With the gift card, I was able to choose from a wide range of hotels in different
                                destinations and book my stay for free. This allowed me to plan my trip without having to
                                worry about the cost of accommodation, which was a huge relief.
                                But what really impressed me about this gift card was the quality of the hotels on offer.
                                Despite being able to book my stay for free, I was still able to choose from a wide range of
                                hotels, from budget-friendly options to luxurious resorts. This meant that I could still
                                enjoy a comfortable and enjoyable stay without having to pay a cent."
                            </div>
                        </div>
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "If you're looking for a unique and thoughtful gift for a couple celebrating their second
                                honeymoon, then the FM Vacation gift card is an excellent choice. I recently gifted this
                                travel gift card to a friend who was celebrating their second honeymoon, and they were
                                thrilled with the gift.

                                The gift card allowed them to plan and book their second honeymoon without having to worry
                                about the cost of accommodation or flights. This made the planning process much more
                                manageable, and they were able to focus on choosing the perfect destination and activities
                                to make their second honeymoon truly special."
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="hotel_book_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_bg_l">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="paddinng_modal">
                        <form method="post" class="create-form" action="{{ route('book.hotel') }}">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="form-group col-md-12">
                                    <label for="">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone Number:</label>
                                    <input type="texty" class="form-control" name="phone" id="phone"
                                        aria-describedby="" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Booking From:</label>
                                    <input type="date" class="form-control" name="booking_from" id="booking_from"
                                        aria-describedby="" placeholder="" min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Booking to:</label>
                                    <input type="date" class="form-control" name="booking_to" id="booking_to"
                                        aria-describedby="" placeholder="" min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Adults:</label>
                                    <input type="text" class="form-control" name="adults_number" id=""
                                        aria-describedby="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Location:</label>
                                    <input type="text" class="form-control" name="location" id="location"
                                        aria-describedby="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">You have any voucher code?</label>
                                    <div class="d-flex">
                                        <div class="form-check pr-4">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="exampleRadios1" value="yes">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="exampleRadios2" value="no" checked>
                                            <label class="form-check-label" for="exampleRadios2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div id="vocher">
                                        <label for="">Voucher Code :</label>
                                        <input type="text" class="form-control" name="voucher_code" id="voucher_code"
                                            aria-describedby="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-block btn-warning">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#vocher').hide();
            $('input[type="radio"]').click(function() {
                if ($(this).attr('id') == 'exampleRadios1') {
                    $('#voucher_code').attr('required', '');
                    $('#vocher').show();
                } else {
                    $('#voucher_code').removeAttr('required');
                    $('#vocher').hide();
                }
            });
        });
    </script>
    <script>
        $('.create-form').validate({
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                },
                'phone': {
                    required: true,
                    number: true,
                },
                'booking_date': {
                    required: true,
                },
                'booking_from': {
                    required: true,
                },
                'booking_to': {
                    required: true,
                },
                'adults_number': {
                    required: true,
                    number: true,
                },
                'location': {
                    required: true,
                },
            },

            messages: {
                'name': {
                    required: 'Please enter your name',
                },
                'email': {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email',
                },
                'phone': {
                    required: 'Please enter your phone number',
                    number: 'Please enter a valid phone number',
                },
                'booking_date': {
                    required: 'Please enter your booking date',
                },
                'booking_from': {
                    required: 'Please enter your booking from',
                },
                'booking_to': {
                    required: 'Please enter your booking to',
                },
                'adults_number': {
                    required: 'Please enter your adults number',
                    number: 'Please enter a valid adults number',
                },
                'location': {
                    required: 'Please enter your location',
                },
            },

        });
    </script>
@endpush
