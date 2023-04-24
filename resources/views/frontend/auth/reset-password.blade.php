@extends('frontend.auth.master')
@section('meta_title')
@endsection
@section('title')
    {{ env('APP_NAME') }} | Reset Password
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
                            <h2>Reset your password ?</h2>
                            {{-- <p>Please enter your email address for reset your password.</p> --}}
                            <form method="post" action="{{ route('reset.password.check') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row g-4">
                                    <div class="col-md-12">
                                        <div class="login_input">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="New Password" id="password-field1" aria-label="Username"
                                                    aria-describedby="">
                                                <a href="javascript:void(0);" id="btnToggle"
                                                    class="input-group-text eye_slash toggle"><i id="eyeIcon"
                                                        toggle="#password-field1" class="fa fa-eye-slash"></i></a>
                                                @if ($errors->has('password'))
                                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="login_input">
                                            <div class="form-group">
                                                <input type="password" name="confirm_password" class="form-control"
                                                    id="password-field" placeholder="Confirm Password" aria-label="Username"
                                                    aria-describedby="">
                                                <a href="javascript:void(0);" id="btnToggle1"
                                                    class="input-group-text eye_slash toggle"><i id="eyeIcon1"
                                                        toggle="#password-field" class="fa fa-eye-slash"></i></a>
                                                @if ($errors->has('confirm_password'))
                                                    <div class="text-danger">{{ $errors->first('confirm_password') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="login_btn w-100" type="submit">Reset Password <i class="fas fa-arrow-right"></i></button>
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
<script>
    $("#eyeIcon1").click(function() {
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
