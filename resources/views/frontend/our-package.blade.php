@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | Our Package
@endsection
@push('styles')
@endpush


@section('content')
    <section class="pricing-section mt-5">
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
                                        <div class="title">{{ $package['package_validity'] }}</div>
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
                                        <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY Package</a>
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
                                        <a href="{{ route('package', encrypt($package['id'])) }}" class="theme-btn">BUY Package</a>
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
                                    <p>Create a user account on our website & buy travel vouchers to enhance your travel
                                        experiences. </p>
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
                                    <p>Browse through the amazing travel destination & tour packages you can enjoy. </p>
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
                                    <p>Contact us for the redemption of the voucher prior based on the voucher you have taken. For more info, look into Redemption Policy. </p>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
@endpush
