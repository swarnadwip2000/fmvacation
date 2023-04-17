<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ env('APP_NAME') }} | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:100,300,400,500,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho:100,300,400,500,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" as="style" href="{{ asset('frontend_assets/css/hotel_search.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" as="style" href="{{ asset('frontend_assets/css/Home.css') }}" type="text/css"
        media="all">
        <link rel="stylesheet" as="style" href="{{ asset('frontend_assets/css/about.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" as="style" href="{{ asset('frontend_assets/css/header.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" as="style" href="{{ asset('frontend_assets/css/footer.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" as="style" id="fonts" href="{{ asset('frontend_assets/css/page.css') }}"
        type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://unpkg.com/phosphor-icons"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body class="">
    <div class="wrapper">
        <main role="main">
            <section class="login_page_bnr pdding_3">
                <div class="login_page_bnr_f">
                    <div class="row align-items-center justify-content-between mr-0">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="inner_bnr_right_img">
                                <img src="{{ asset('frontend_assets/img/HG-header_home.jpg') }}" alt=""/>
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
                                            <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Username" aria-describedby="">
                                            @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                            </div>
                                           
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="login_input password_in">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control"
                                                placeholder="Password" id="password-field1" aria-label="Username"
                                                aria-describedby="">
                                            <a href="javascript:void(0);" id="btnToggle"
                                                class="input-group-text eye_slash toggle"><i id="eyeIcon"
                                                    toggle="#password-field1" class="fa fa-eye-slash"></i></a>
                                                @if($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                            </div>
                                           
                                        </div>
                                        </div>
                                        <div class="col-md-12 text-center mb-3">
                                        <a href="forgot.html" class="forgot_pass">forgot Your Password?</a>
                                        </div>
                                        <div class="col-12">
                                            <button class="login_btn w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-md-12 dont_acc text-center">
                                        <p>Don't Have an Account? <a href="{{ route('register') }}">SIGNUP NOW</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>            
                    </div>
                </div>
            </section>
        </main>
    </div>
    <!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('frontend_assets/js/jquery-migrate.js') }}" id="jquery-migrate-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend_assets/js/Header.js') }}" id="header-js-js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script defer="" async="async" src="{{ asset('frontend_assets/js/Footer.js') }}" id="script-js"></script>

    <script type="application/javascript">
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
            ]
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

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
</body>

</html>