@extends('frontend.auth.master')
@section('meta_title')
    
@endsection
@section('title')
{{ env('APP_NAME') }} | Forgot Password 
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
                        <h2>Forget your password ?</h2>
                        {{-- <p>Please enter your email address for reset your password.</p> --}}
                        <form method="post" action="{{ route('forget.password.check') }}">
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
                                <div class="col-12">
                                    <button class="login_btn w-100" type="submit">Send reset
                                        password link <i class="fas fa-arrow-right"></i></button>
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

@endpush
