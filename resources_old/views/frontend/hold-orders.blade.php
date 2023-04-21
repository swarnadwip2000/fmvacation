@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | My Hold orders
@endsection
@push('styles')
@endpush


@section('content')
<section class="dashboard_section section">
    <div class="container">
      <div class="row">
       @include('frontend.partials.sidebar')
       <div class="col-md-9">
        <div class="right_content_main">
            @if(count($orders) > 0)
            @foreach ($orders as $item)
            <div class="cart_left_box mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left_img_text">
                        <div class="cart_small_img">
                            <img src="{{ asset('frontend_assets/img/gift.jpg') }}" alt=""/>
                        </div>
                        <div class="img_left_text">
                            <h5>{{ $item['package']['package_name'] }}</h5>
                            <p><b>To:</b> {{ $item['send_to'] }}</p>
                            <p><b>From:</b> {{ $item['send_from'] }}</p>
                            <p><b>Gift Message:</b> {{ $item['send_message'] }}</p>
                            <p><b>Delivery Method:</b> {{ $item['delivery_method'] }}</p>
                        </div>
                    </div>
                    <div class="right_text resend_price">
                        <div class="price my-2">${{ $item['package']['package_price'] }}</div>
                        <a href="{{ route('active.order', $item['id']) }}" class="resend">Active Oreder</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
              <div class="cart_left_box mb-4">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="left_img_text">
                    <div class="img_left_text">
                      <h5>No orders found</h5>
                    </div>
                  </div>
                </div>
              </div>
            @endif     
        </div>
      </div>
      </div>
    </div>
  </section>
    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
@endpush
