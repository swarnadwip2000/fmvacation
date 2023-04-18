@php
    use App\Helpers\Helper;
@endphp
<div class="col-md-3">
    <div class="position-relative dashboard_left">
      <div class="d-flex align-items-center justify-content-start pb-3">
        <div class="img_image">
          <img src="{{ asset('frontend_assets/img/thalia.jpg') }}"/>
        </div>
        <div class="name_price">
          <h5>{{ Auth::user()->full_name }}</h5>
        </div>
      </div>
      <h5 class="img-market d-flex align-items-center justify-content-between border-top"><a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i> My Profile</a> <div></div></h5>
      <h5 class="img-market d-flex align-items-center justify-content-between border-top"><a href="{{ route('orders') }}"><i class="fa-solid fa-bag-shopping"></i> My Orders</a> <div>{{ Helper::countOrder() }}</div></h5>
      <h5 class="img-market d-flex align-items-center justify-content-between border-top"><a href="{{ route('hold.order') }}"><i class="fa-solid fa-bag-shopping"></i> Hold Orders</a> <div>{{ Helper::countHoldOrder() }}</div></h5>
     
      <h5 class="img-market border-top"><a href="#"><i class="fa-solid fa-address-card"></i> Trust And Verification</a></h5>
      <ul class="left_drop_dashboard">
        <li><i class="fa-solid fa-lock"></i> <a href="{{ route('change.password') }}"> Change Password</a></li>
      </ul>
    </div>
  </div>