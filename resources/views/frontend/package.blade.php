@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} |  Package
@endsection
@push('styles')
@endpush


@section('content')
    <section class="pricing-section mt-5">
        <div class="container">

            <div class="outer-box">
                <div class="row">
                    <!-- Pricing Block -->
                    <div class="pricing-block col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
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
                                @if($package['package_name'] == 'Silver')
                                <li class="false">No discount on renewals</li>
                                <li class="false">Room Upgrades</li>
                                <li class="false">Complimentary breakfast</li>
                                <li class="false">Late Checkouts</li>
                                @elseif($package['package_name'] == 'Gold')
                                <li class="true">No discount on renewals</li>
                                <li class="true">Room Upgrades</li>
                                <li class="false">Complimentary breakfast</li>
                                <li class="false">Late Checkouts</li>
                                @else
                                <li class="true">No discount on renewals</li>
                                <li class="true">Room Upgrades</li>
                                <li class="true">Complimentary breakfast</li>
                                <li class="true">Late Checkouts</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="pricing-block col-lg-8 col-md-8 col-sm-12 wow fadeInUp">
                        <div class="price_rightbox">
                            <form class="cart" action="{{ route('add-to-cart') }}" method="post" enctype="">
                                @csrf                   
                                <input type="hidden" name="package_id" value="{{ $package['id'] }}">        
                                <div class="wps_wgm_added_wrapper">
                                    <div class="form-group">
                                        <label class="wps_wgc_label">From</label>
                                        <input type="text" name="send_from" id="wps_wgm_from_name"
                                            class="wps_wgm_from_name form-control" placeholder="Enter the sender email" value="@if(Auth::check() && Auth::user()->hasRole('USER')) {{ Auth::user()->email }} @else {{ old('send_from') }} @endif">
                                            @if ($errors->has('send_from'))
                                            <div class="error" style="color:red;">{{ $errors->first('send_from') }}
                                            </div>
                                                
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="wps_wgc_label">Gift Message </label>
                                        <textarea name="send_message" id="wps_wgm_message" class="wps_wgm_message form-control">{{ old('send_message') }}</textarea>
                                        @if ($errors->has('send_message'))
                                        <div class="error" style="color:red;">{{ $errors->first('send_message') }}
                                        </div>
                                            
                                        @endif
                                    </div>
                                    <div class="wps_wgm_section wps_delivery_method">
                                        <label class="wps_wgc_label">Delivery Method</label>
                                        <div class="wps_wgm_delivery_method">
                                            <input type="radio" name="delivery_method" value="Mail to recipient"
                                                class="wps_wgm_send_giftcard" checked="checked" id="wps_wgm_to_email_send">
                                            <span class="wps_wgm_method">Mail To Recipient</span>
                                            <div class="form-group">
                                                <input type="text" name="send_to" id="wps_wgm_to_email"
                                                    class="wps_wgm_to_email form-control"
                                                    placeholder="Enter the Recipient Email" value="{{ old('send_to') }}">
                                                <span class="wps_wgm_msg_info">We will send it to the recipient's email
                                                    address</span>
                                                @if ($errors->has('send_to'))
                                                <div class="error" style="color:red;">{{ $errors->first('send_to') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-box text-left">
                                    <button type="submit" name="add-to-cart" style="background-color:#fd3103" class="btn" class="theme-btn">Purchase Now</button>
                                </div>

                            </form>
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
