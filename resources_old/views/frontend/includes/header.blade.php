@php
    use App\Helpers\Helper;
@endphp
@if (Request::is('/'))
    <header loading="lazy" class="header_home"
        style="background: url({{ asset('frontend_assets/img/HG-header_home.jpg') }}) no-repeat;">
        <div class="FrontHeaderMask"></div>
        <div class="container">
            <div class="HeaderTop">
                <div class="container">
                    <div loading="lazy" class="Logo">
                        <a href="{{ route('home') }}">
                            <img alt="FM Vacation" loading="lazy" src="{{ asset('frontend_assets/img/logo.png') }}">
                        </a>
                    </div>
                    <div class="NavigationContainer">
                        <div class="NavigationDesktop">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
                                    <!-- <li><a href="give.html">Give</a></li> -->
                                    <!-- <li>
                                    <a href="">Our Hotels</a>
                                </li> -->
                                    <li class="nav-item ">
                                        <a class="" href="{{ route('our-hotels') }}" id=""
                                            role="" data-toggle="" aria-haspopup=""
                                            aria-expanded="">
                                            Our Hotels
                                        </a>
                                        {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="hotels.html">Sydney</a>
                                            <a class="dropdown-item" href="hotels.html">Melbourne</a>
                                            <a class="dropdown-item" href="hotels.html">Cairns</a>
                                            <a class="dropdown-item" href="hotels.html">Adelaide</a>
                                            <a class="dropdown-item" href="hotels.html">Brisbane</a>
                                            <a class="dropdown-item" href="hotels.html">Perth</a>
                                            <a class="dropdown-item" href="hotels.html">Gold Coast</a>
                                            <a class="dropdown-item" href="hotels.html">Canberra</a>
                                        </div> --}}
                                    </li>
                                    <!-- <li><a href="redeem.html">Redeem</a></li> -->
                                    <li><a href="{{ route('how-it-works') }}">How it works</a></li>
                                    <li><a href="{{ route('about-us') }}">About</a></li>
                                    <li><a href="{{ route('our-package') }}">Our Package</a></li>
                                    @if (Auth::check() && Auth::user()->hasRole('USER'))
                                        <li><a href="{{ route('profile') }}">Profile</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                    <li class="menucart"><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>    <div id="mini-cart-count">
                                        {{ Helper::countCartPackage() }}   </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="NavigationMobile">
                            <div class="NavigationMobileMenuButton">
                                <div class="line_one"></div>
                                <div class="line_two"></div>
                                <div class="line_three"></div>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="NavigationMobileContainer">
                        <div class="top">
                            <div class="container">
                                <div class="Logo">
                                    <a href="{{ route('home') }}" class="logo">
                                        <img src="{{ asset('frontend_assets/img/logo.png') }}" alt="fmvacation">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <div class="container">
                                <ul id="menu-mainmobile">
                                    <li class="menu-home"><a href="{{ route('home') }}"><span>HOME</span></a></li>
                                    <!-- <li class="menu-create"><a href="#"><span>GIVE</span></a></li>
                                <li class="menu-redeem"><a href="#"><span>REDEEM</span></a></li> -->
                                    <li class="nav-item ">
                                        <a class="" href="{{ route('our-hotels') }}" id=""
                                            role="" data-toggle="" aria-haspopup=""
                                            aria-expanded="">
                                            <span>{{ Request::is('package/*') ? 'Package' : '' }}{{ Request::is('how-it-works/*') ? 'How it works' : '' }}{{ Request::is('about-us/*') ? 'About Us' : '' }}
                                                {{ Request::is('our-package/*') ? 'Our Package' : '' }}{{ Request::is('cart/*') ? 'Cart' : '' }}{{ Request::is('checkout/*') ? 'Checkout' : '' }}</span>
                                        </a>
                                        {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="hotels.html">Sydney</a>
                                            <a class="dropdown-item" href="hotels.html">Melbourne</a>
                                            <a class="dropdown-item" href="hotels.html">Cairns</a>
                                            <a class="dropdown-item" href="hotels.html">Adelaide</a>
                                            <a class="dropdown-item" href="hotels.html">Brisbane</a>
                                            <a class="dropdown-item" href="hotels.html">Perth</a>
                                            <a class="dropdown-item" href="hotels.html">Gold Coast</a>
                                            <a class="dropdown-item" href="hotels.html">Canberra</a>
                                        </div> --}}
                                    </li>
                                    <li class="menu-how-it-works"><a href="{{ route('how-it-works') }}"><span>HOW IT
                                                WORKS</span></a></li>
                                    <li class="menu-about"><a href="{{ route('about-us') }}"><span>ABOUT
                                                US</span></a></li>
                                    <li><a href="{{ route('our-package') }}"><span>Our Package</span></a></li>
                                    @if (Auth::check() && Auth::user()->hasRole('USER'))
                                        <li><a href="{{ route('profile') }}">Profile</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                    <li class="menucart"><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>    <div id="mini-cart-count">
                                        {{ Helper::countCartPackage() }}    </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="HeaderContent" style="margin-top: 36.4px;">
                <h1>1 GIFT CARD FOR 550,000+ HOTELS WORLDWIDE</h1>
                <p>
                </p>
                <ul>
                    <li>Redeem for 140+ hotel brands in over 170 countries</li>
                    <li>Personalize with a photo &amp; message</li>
                    <li>Free priority shipment of physical gift cards</li>
                    <li>Instant email of PDF and eGift</li>
                    <li>Loved by thousands of gift recipients each month</li>
                </ul>
                <p></p>
                <p class="MobileHeaderFrontImage">
                    <img alt="fmvacation" src="{{ asset('frontend_assets/img/HG-physical_en.png') }}">
                </p>
                <p class="Buttons"><a class="ButtonGive" href="#">GIVE fmvacation</a> <a class="ButtonRedeem"
                        href="#">REDEEM</a>
                </p>
            </div>
        </div>
        <div class="Giftboxes"><img alt="fmvacation" loading="lazy"
                src="{{ asset('frontend_assets/img/GiftboxesHG.webp') }}">
        </div>
    </header>
@else
    <header loading="lazy" class=""
        style="background: url({{ asset('frontend_assets/img/HG-header_home.jpg') }}) no-repeat;">
        <div class="FrontHeaderMask"></div>
        <div class="container">
            <div class="HeaderTop">
                <div class="container">
                    <div loading="lazy" class="Logo">
                        <a href="{{ route('home') }}">
                            <img alt="FM Vacation" loading="lazy" src="{{ asset('frontend_assets/img/logo.png') }}">
                        </a>
                    </div>
                    <div class="NavigationContainer">
                        <div class="NavigationDesktop">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
                                    <!-- <li><a href="give.html">Give</a></li> -->
                                    <!-- <li>
                                                <a href="">Our Hotels</a>
                                            </li> -->
                                    <li class="nav-item ">
                                        <a class="" href="{{route('our-hotels')}}" id="" role=""
                                            data-toggle="" aria-haspopup="" aria-expanded="">
                                            Our Hotels
                                        </a>
                                        {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="hotels.html">Sydney</a>
                                            <a class="dropdown-item" href="hotels.html">Melbourne</a>
                                            <a class="dropdown-item" href="hotels.html">Cairns</a>
                                            <a class="dropdown-item" href="hotels.html">Adelaide</a>
                                            <a class="dropdown-item" href="hotels.html">Brisbane</a>
                                            <a class="dropdown-item" href="hotels.html">Perth</a>
                                            <a class="dropdown-item" href="hotels.html">Gold Coast</a>
                                            <a class="dropdown-item" href="hotels.html">Canberra</a>
                                        </div> --}}
                                    </li>
                                    <!-- <li><a href="redeem.html">Redeem</a></li> -->
                                    <li class="menu-how-it-works"><a href="{{ route('how-it-works') }}"><span>HOW IT
                                                WORKS</span></a></li>
                                    <li class="menu-about"><a href="{{ route('about-us') }}"><span>ABOUT
                                                US</span></a></li>
                                    <li><a href="{{ route('our-package') }}"><span>Our Package</span></a></li>
                                    @if (Auth::check() && Auth::user()->hasRole('USER'))
                                    <li><a href="{{ route('profile') }}">Profile</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endif
                                <li class="menucart"><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>    <div id="mini-cart-count">
                                    {{ Helper::countCartPackage() }}   </div>
                                </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="NavigationMobile">
                            <div class="NavigationMobileMenuButton">
                                <div class="line_one"></div>
                                <div class="line_two"></div>
                                <div class="line_three"></div>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="NavigationMobileContainer">
                        <div class="top">
                            <div class="container">
                                <div class="Logo">
                                    <a href="{{ route('home') }}" class="logo">
                                        <img src="{{ asset('frontend_assets/img/logo.png') }}" alt="fmvacation">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="Content">
                            <div class="container">
                                <ul id="menu-mainmobile">
                                    <li class="menu-home"><a href="{{ route('home') }}"><span>HOME</span></a></li>
                                    <!-- <li class="menu-create"><a href="#"><span>GIVE</span></a></li>
                                            <li class="menu-redeem"><a href="#"><span>REDEEM</span></a></li> -->
                                    <li class="nav-item ">
                                        <a class="dropdown-toggle" href="{{route('our-hotels')}}" id="" role=""
                                            data-toggle="" aria-haspopup="" aria-expanded="">
                                            <span>{{ Request::is('package/*') ? 'Package' : '' }}{{ Request::is('how-it-works/*') ? 'How it works' : '' }}{{ Request::is('about-us/*') ? 'About Us' : '' }}
                                                {{ Request::is('our-package/*') ? 'Our Package' : '' }}{{ Request::is('cart/*') ? 'Cart' : '' }}{{ Request::is('checkout/*') ? 'Checkout' : '' }}</span>
                                        </a>
                                        {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="hotels.html">Sydney</a>
                                            <a class="dropdown-item" href="hotels.html">Melbourne</a>
                                            <a class="dropdown-item" href="hotels.html">Cairns</a>
                                            <a class="dropdown-item" href="hotels.html">Adelaide</a>
                                            <a class="dropdown-item" href="hotels.html">Brisbane</a>
                                            <a class="dropdown-item" href="hotels.html">Perth</a>
                                            <a class="dropdown-item" href="hotels.html">Gold Coast</a>
                                            <a class="dropdown-item" href="hotels.html">Canberra</a>
                                        </div> --}}
                                    </li>
                                    <li class="menu-how-it-works"><a href="{{ route('how-it-works') }}"><span>HOW IT
                                        WORKS</span></a></li>
                            <li class="menu-about"><a href="{{ route('about-us') }}"><span>ABOUT
                                        US</span></a></li>
                            <li><a href="{{ route('our-package') }}"><span>Our Package</span></a></li>
                            @if (Auth::check() && Auth::user()->hasRole('USER'))
                                    <li><a href="{{ route('profile') }}">Profile</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endif
                                <li class="menucart"><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>    <div id="mini-cart-count">
                                    {{ Helper::countCartPackage() }}    </div>
                                </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="HeaderContentRest">
                <h1>{{ Request::is('package/*') ? 'Package' : '' }}{{ Request::is('how-it-works/*') ? 'How it works' : '' }}{{ Request::is('about-us/*') ? 'About Us' : '' }}
                    {{ Request::is('our-package/*') ? 'Our Package' : '' }}{{ Request::is('cart/*') ? 'Cart' : '' }}{{ Request::is('checkout/*') ? 'Checkout' : '' }}
                </h1>
                <p></p>
            </div>
        </div>
    </header>
@endif
