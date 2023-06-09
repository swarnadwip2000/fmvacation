<footer loading="lazy" class="footer">

    <div class="form">
        <div class="newsletter">
            <div class="labels">
                <span class="title">Stay in touch</span>
                <span class="subtitle">Newsletter</span>
            </div>
            <div class="mc_embed_signup">
                <form action="javascript:void(0);" id="submit-newsletter">
                    <div class="mc_embed_signup_scroll">
                        <div class="mc-field-group">
                            <img loading="lazy" class="MailIcon" src="{{asset('frontend_assets/img/email.svg')}}">
                            <input type="email" id="email-newsletter" value="" name="EMAIL" class="required email mce-EMAIL"
                                placeholder="email address">
                        </div>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_f33461f23c99f659754dfbee9_b275b5f788" tabindex="-1"
                                value="">
                        </div>
                        <div class="clear">
                            <input type="submit" value="Subscribe" name="subscribe"
                                class="button mc-embedded-subscribe">
                        </div>
                    </div>
                </form>
                <div class="mce-responses clear">
                    <div class="response mce-success-response">You've successfully signed up for the
                        newsletter.</div>
                    <div class="response mce-error-response">Something went wrong. Please try again.</div>
                </div>
                <div class="BlogText">Sign up for our <strong>Experiencegift newsletter</strong> for the
                    latest news, discounts and more in your inbox.<p></p>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="footer__logo">-->
    <!--    <img loading="lazy" src="{{asset('frontend_assets/img/experiencegift-box.svg')}}" alt="experiencegift-box">-->
    <!--</div>-->
   
    <div class="footer__widgets">
        <div class="widgets__row">
            <div class="footer__contact column pr-0 pr-md-5 px-4 px-md-0">
                <div class="menu_logo">
                    <a href=""><img loading="lazy" src="{{asset('frontend_assets/img/logo_white.png')}}" alt="experiencegift-box"></a>
                </div>
                <div class="contact__info">
                    <address class="address">
                        <span class="map__marker"></span>
                        1000+ Travel partners and 65+ Service city across India, USA, Canada & UAE
                    </address>
                    <div class="footer__mail">
                        <a href="mailto:info@fmvacations.com">
                            <span class="email_icon"></span>info@fmvacations.com
                        </a>
                    </div>
                </div>
                <div class="footer__social">
                    <a target="_blank" href="#">
                        <img loading="lazy" src="{{asset('frontend_assets/img/fb-ro.svg')}}" alt="">
                    </a>
                    <a target="_blank" href="#">
                        <img loading="lazy" src="{{asset('frontend_assets/img/ln-ro.svg')}}" alt="">
                    </a>
                    <a target="_blank" href="#">
                        <img loading="lazy" src="{{asset('frontend_assets/img/ig-ro.svg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="footer__menu column">
                <div class="menu__title">
                    FM Vacation </div>
                <div class="menu">
                    <ul id="menu-footer-menu-english-us" class="footermenulefta">
                        <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
                        <li><a href="{{ route('our-hotels') }}">Our Hotels</a></li>   
                        <li><a href="{{ route('about-us') }}">About us</a></li>
                        <li><a href="{{ route('how-it-works') }}">How it works</a></li>
                        <li><a href="{{ route('our-package') }}">Our Package</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__menu column">
                <div class="menu__title">Support</div>
                <div class="menu">
                    <ul id="menu-footer-menu-english-us" class="footermenulefta">
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms-and-conditions') }}" aria-current="page">Terms and Conditions</a></li>
                        {{-- <li><a href="javascript:void(0);">Australia</a></li>
                        <li><a href="javascript:void(0);">Australia to New Zealand</a></li>
                        <li><a href="javascript:void(0);">New Zealand to Bali</a></li> --}}
                    </ul>
                    <!--<ul id="menu-footer-menu-b-english-us" class="footermenuleftb">-->
                        
                    <!--    {{-- <li><a href="corporate-gift.html">Corporate gifts</a></li>-->
                    <!--    <li><a href="join.html">Join us</a></li> --}}-->
                    <!--</ul>-->
                </div>
            </div>
            
            
            <div class="footer__contact column">
                <div class="menu__title">Member of</div>
                <div class="member_of">
                    <img loading="lazy" src="{{asset('frontend_assets/img/iata-white.png')}}" alt="IATA">
                    <!--<img loading="lazy" src="{{asset('frontend_assets/img/dutch_assoc.png')}}" alt="Dutch Gift Card Association">-->
                </div>
            </div>
        </div>
    </div>
    
    <div class="copyright">
        <div class="text">
            <span>Copyright © FM Vacation 2023</span>
            <span>All rights reserved</span>
        </div>
        <!--<div class="pages">-->
        <!--    <a href="{{ route('terms-and-conditions') }}">Terms &amp; Conditions</a>-->
        <!--    <a href="{{ route('privacy-policy') }}">Privacy &amp; Cookies</a>-->
        <!--</div>-->
    </div>
</footer>