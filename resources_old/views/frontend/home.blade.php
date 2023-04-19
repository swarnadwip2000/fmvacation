@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | HOME
@endsection
@push('styles')
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
                    @foreach ($packages as $key=>$package)
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
                                <li class="false">Complimentary breakfast</li>
                                <li class="false">Room Upgrades</li>
                                <li class="false">Late Checkouts</li>
                                <li class="true">Experience certificates</li>
                                <li class="true">Membership</li>
                                <li class="true">Member exclusive rate</li>
                                <li class="false">No discount on renewals</li>
                                <li class="true">Booking before 30days</li>
                                <li class="true">Reward points 299 pts</li>
                                <li class="true">Welcome benefits</li>
                            </ul>
                            <div class="btn-box">
                                <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY Package</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @endforeach
                    

                    <!-- Pricing Block -->
                    @foreach ($packages as $key=>$package)
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
                                <li class="false">Complimentary breakfast</li>
                                <li class="true">Room Upgrades</li>
                                <li class="false">Late Checkouts</li>
                                <li class="true">Experience certificates</li>
                                <li class="true">Membership</li>
                                <li class="true">Member exclusive rate</li>
                                <li class="true">5% discount on renewals</li>
                                <li class="true">Booking before 35days</li>
                                <li class="true">Reward points 499 pts</li>
                                <li class="true">Welcome benefits</li>
                            </ul>
                            <div class="btn-box">
                                <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY Package</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- Pricing Block -->
                    @foreach ($packages as $key=>$package)
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
                                <li class="true">Complimentary breakfast</li>
                                <li class="true">Room Upgrades</li>
                                <li class="true">Late Checkouts</li>
                                <li class="true">Experience certificates</li>
                                <li class="true">Membership</li>
                                <li class="true">Member exclusive rate</li>
                                <li class="true">10% discount on renewals</li>
                                <li class="true">Booking before 45days</li>
                                <li class="true">Reward points 799 pts</li>
                                <li class="true">Welcome benefits</li>
                            </ul>
                            <div class="btn-box">
                                <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY Package</a>
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
                                    <p>Visit your chosen hotel & redeem your voucher to save more during your
                                        stay. </p>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Section3">
        <div class="FactsStarDesktop"><img alt="FM Vacation" loading="lazy"
                src="{{ asset('frontend_assets/img/FactsStarDesktop.svg') }}">
        </div>
        <div class="FactsStarMobile"><img alt="FM Vacation" loading="lazy"
                src="{{ asset('frontend_assets/img/FactsStarMobile.svg') }}"></div>
        <div class="Title">Made to spread happiness</div>
        <div class="FactsDesktop">
            <div class="Facts Row1">
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsValidity_HG.svg') }}">
                    </div>
                    <div class="Title">2 year validity</div>
                    <div class="SubTitle">plenty of time to redeem</div>
                </div>
                <div class="Fact">
                    <div class="Icon"><img alt="FM Vacation" loading="lazy"
                            src="{{ asset('frontend_assets/img/FactsDelivery_HG.svg') }}">
                    </div>
                    <div class="Title">Free priority shipment worldwide</div>
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
                    <div class="Title">550,000+ hotels</div>
                    <div class="SubTitle">find your new favorite</div>
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
                                "Know someone is planning a trip but they’re keeping an eye out for flights?
                                Give them the option to find the best deal for them with this handy gift card,
                                which claims to be the world’s only cross-airline gift card. That means over 980
                                destinations on offer around the world, with access to hundreds of airlines. No
                                need to risk booking flights they can’t use!" </div>
                        </div>
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "If you think gift cards are an impersonal gift, think again. It works just like
                                a gift card, but besides its impressive presentation (the Flightgift looks like
                                a plane ticket), purchasers can choose from a customizable digital card to a
                                handwritten message or to even a video greeting along with the e-card." </div>
                        </div>
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "Even people who don't travel much sometimes need a place to stay. House
                                renovations? Date night? Someone they want to visit? With nothing more than your
                                phone, five minutes, and a credit card, you can give these things. Again, you
                                pick the dollar amount, they choose from 550,000 hotels in 170 countries."
                            </div>
                        </div>
                        <div class="Media">
                            <div class="Logo">
                                <img loading="lazy" src="{{ asset('frontend_assets/img/mirror-logo.png') }}">
                            </div>
                            <div class="Text">
                                "Even people who don't travel much sometimes need a place to stay. House
                                renovations? Date night? Someone they want to visit? With nothing more than your
                                phone, five minutes, and a credit card, you can give these things. Again, you
                                pick the dollar amount, they choose from 550,000 hotels in 170 countries."
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
@endpush
