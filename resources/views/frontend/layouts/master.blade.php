<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    @yield('meta')
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    @stack('styles')
</head>

<body class="">

    <div class="wrapper">
        <main role="main">

            @include('frontend.includes.header')

            @yield('content')

            @include('frontend.includes.footer')


        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('frontend_assets/js/jquery-migrate.js') }}" id="jquery-migrate-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js" id=""></script>
    <script src="{{ asset('frontend_assets/js/Header.js') }}" id="header-js-js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script defer="" async="async" src="{{ asset('frontend_assets/js/Footer.js') }}" id="script-js"></script>
    <script src="{{ asset('frontend_assets/js/Homepage.js') }}" id="homepage-js-js"></script>

    
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
    
      <script type="application/javascript">
        $('.hotel_slid').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
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
        $(document).ready(function () {
            $("#submit-newsletter").submit(function () {
                var email = $("#email-newsletter").val();
                // alert(email);   
                if (email == "") {
                    alert("Please enter email address");
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('newsletter') }}",
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        // console.log(data.success);
                        if (data.success != '') {
                           toastr.success(data.success);
                            $("#email").val("");
                    }
                }
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
