@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | My orders
@endsection
@push('styles')
<style>
    .error {
        color: red;
    }
    
</style>
@endpush


@section('content')
<section class="dashboard_section section">
    <div class="container">
      <div class="row">
       @include('frontend.partials.sidebar')
       <div class="col-md-9">
        <div class="right_content_main">                      
          <div class="right_content">
            <form action="{{ route('change.password.update') }}" method="post" id="forms">
                @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h5 class="img-market">Change Password</h5>
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="old_password" id="old-password" class="form-control"
                        placeholder="Enter your old password">
                        @if ($errors->has('old_password'))
                        <span class="error">{{ $errors->first('old_password') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" id="new-password" class="form-control"
                                            placeholder="Enter your new password">
                                            @if ($errors->has('new_password'))
                                        <span class="error">{{ $errors->first('new_password') }}</span>
                                    @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm-password"
                                            class="form-control" placeholder="Enter your confirm password">
                                            @if ($errors->has('confirm_password'))
                                        <span class="error">{{ $errors->first('confirm_password') }}</span>
                                    @endif 
                    </div>
                    <div class="form-group">
                        <button type="submit" class="resend btn">Save Password</button>
                    </div>
                </div>
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
