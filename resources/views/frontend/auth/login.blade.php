@extends('frontend.auth.master')
@section('meta_title')
    
@endsection
@section('title')
{{ env('APP_NAME') }} | Login 
@endsection
@push('styles')
    
@endpush

@section('content')
<main role="main">
    <section class="login_page_bnr pdding_3">
        <div class="login_page_bnr_f">
            <div class="row align-items-center justify-content-between mr-0">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="inner_bnr_right_img">
                        <img src="{{ asset('frontend_assets/img/HG-header_home.jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="login_banner_left_text">
                        <h2>Welcome again!</h2>
                        <form method="post" action="{{ route('login.check') }}">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="login_input">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Email" aria-label="Username" aria-describedby="">
                                            @if ($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="login_input password_in">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" id="password-field1"
                                                aria-label="Username" aria-describedby="">
                                            <a href="javascript:void(0);" id="btnToggle"
                                                class="input-group-text eye_slash toggle"><i id="eyeIcon"
                                                    toggle="#password-field1" class="fa fa-eye-slash"></i></a>
                                            @if ($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 text-center mb-3">
                                    <a href="{{ route('forget.password') }}" class="forgot_pass">forgot Your Password?</a>
                                </div>
                                <div class="col-12">
                                    <button class="login_btn w-100" type="submit">Login</button>
                                </div>
                                <div class="col-md-12 dont_acc text-center">
                                    <p>Don't Have an Account? <a href="{{ route('register') }}">SIGNUP NOW</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    $("#eyeIcon").click(function() {
        // alert('d')
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
@endpush
