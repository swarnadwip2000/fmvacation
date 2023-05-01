@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | How it works
@endsection
@push('styles')
@endpush


@section('content')
<section class="Section1 container d-block" style="padding-top: 50px">
    <div class="Titles">
        <div class="Row1">
            <div class="Title">The gift of staying at their favorite hotel.
            </div>
            <div class="SubTitle">1 gift card that can be redeemed for a hotel stay with over 550,000 international hotels and in 170+ countries worldwide. They decide to stay wherever, whenever they want. </div>
        </div>
        <div class="Row2">
            <div class="Title">THE GIFT OF FLEXIBLE TRAVEL</div>
            <div class="SubTitle">Our flexible travel gift card gives them the freedom to choose when and where to make memories. <br />
                <br />
                There are just four easy steps that take you from giving the perfect travel gift to them staying at their dream hotel. <br />
            </div>
        </div>
    </div>
</section>
<section class="Section2 container">
    <div class="Rows">
        <div class="Create Row">
            <div class="Description">
                <div class="Icon"><img src="{{asset('frontend_assets/img/CreateIcon.svg')}}"></div>
                <div class="Title">1. <a href="#">CREATE</a></div>
                <div class="Image DescriptionImage">
                    <img src="{{asset('frontend_assets/img/HG-create-bubble.png')}}">
                </div>
                <div class="SubTitle">Customize and finalize. </div>
                <div class="Text">
                    <p>Create your travel gift in a matter of minutes. Make it personal with an image. Choose from our large selection of images, from fun to formal, and beautiful to funny. Prefer to add one from your photo library? You can upload your own image. Just bear in mind that there’s a chance your gift will be saved on the fridge for a long time, so choose wisely.</p>
                    <p>For the finishing touch, you can write a message to your recipient. Select the value of the gift card and you&#8217;ve just made the perfect travel gift, guaranteed to give unforgettable memories.</p>
                </div>
            </div>
            <div class="Image MainImage"><img src="{{asset('frontend_assets/img/HG-create-bubble.png')}}"></div>
        </div>
        <div class="Give Row">
            <div class="Description">
                <div class="Icon"><img src="{{asset('frontend_assets/img/GiveIcon.svg')}}"></div>
                <div class="Title">2. GIVE </div>
                <div class="Image DescriptionImage">
                    <img src="{{asset('frontend_assets/img/HG_give.png')}}">
                </div>
                <div class="SubTitle">Send via post, email, or print at home. </div>
                <div class="Text">
                    <p>Start by choosing your shipment method. Want to surprise someone with a physical gift card? Send this personalized travel gift directly to your recipient by post, with free priority shipping worldwide. You can also send it to yourself to give in person.</p>
                    <p>In need of an instant gift? You can send an eGift by email for a fun, easy, instant gift.</p>
                    <p>Seeing the recipient in person? Receive a printable PDF version of the gift card in your inbox for a gift that’s ready to give in minutes.</p>
                </div>
            </div>
            <div class="Image MainImage"><img src="{{asset('frontend_assets/img/HG_give.png')}}"></div>
        </div>
        <div class="Redeem Row">
            <div class="Description">
                <div class="Icon"><img src="{{asset('frontend_assets/img/RedeemIcon.svg')}}"></div>
                <div class="Title">3. <a href="#">REDEEM</a> </div>
                <div class="Image DescriptionImage">
                    <img src="{{asset('frontend_assets/img/HG-book-bubble_v02.png')}}">
                </div>
                <div class="SubTitle">Select your hotel & redeem your hotel gift card.</div>
                <div class="Text">
                    <p>Congratulations, you lucky traveler!</p>
                    <p>Can’t wait to start your journey? Let’s get you prepared for your next destination. It’s easy to redeem your gift card. Go to our <strong><a href="#">booking page</a></strong>, fill in your travel preferences and find your ideal hotel.</p>
                    <p>Checkout by paying with your gift card code. Do you have credit left on your gift card? Lucky you! You can save this for your next trip. Is there an additional amount to pay? You can pay the remaining amount with the payment method of your choice.</p>
                </div>
            </div>
            <div class="Image MainImage"><img src="{{asset('frontend_assets/img/HG-book-bubble_v02.png')}}"></div>
        </div>
        <div class="Book Row">
            <div class="Description">
                <div class="Icon"><img src="{{asset('frontend_assets/img/BookIcon_HG.svg')}}"></div>
                <div class="Title">4. REDEEM </div>
                <div class="Image DescriptionImage">
                    <img src="{{asset('frontend_assets/img/hotel-checkin.png')}}">
                </div>
                <div class="SubTitle">Enjoy checking in to new memories.</div>
                <div class="Text">
                    <p>Sit back and enjoy your stay at your chosen hotel.</p>
                    <p>The only thing you need to do is pack your suitcase. Keys? Purse? Sunglasses? Check! Just make sure to leave space in your luggage to bring back some unforgettable memories.</p>
                </div>
            </div>
            <div class="Image MainImage"><img src="{{asset('frontend_assets/img/hotel-checkin.png')}}"></div>
        </div>
        <div class="Action">
            <a class="Button" href="{{ route('our-package') }}">BUY NOW</a>
        </div>
    </div>
</section>
<section class="Section3" style="background:url({{asset('frontend_assets/img/HG-hiw_bg-1.jpg')}})">
    <div class="container">
        <img src="{{asset('frontend_assets/img/Star.svg')}}">
        <div class="Titles">
            <h2>SHIPMENT OPTIONS</h2>
            <h3>Post, print or email your gift.</h3>
        </div>
        <div class="GiftcardTypes">
            <div class="Giftbox GiftcardType">
                <div class="Title">Physical gift card</div>
                <div class="Image"><img src="{{asset('frontend_assets/img/HG-physical_en.png')}}"></div>
                <div class="Text">
                    <ul>
                        <li>Post to yourself or directly to the recipient</li>
                        <li>Personalize with a photo &amp; message</li>
                        <li>Free priority shipment worldwide</li>
                    </ul>
                </div>
            </div>
            <div class="Printout GiftcardType">
                <div class="Title">Printable PDF</div>
                <div class="Image"><img src="{{asset('frontend_assets/img/HG-PDF_en.png')}}"></div>
                <div class="Text">
                    <ul>
                        <li>PDF instantly in your inbox ready to print</li>
                        <li>Personalize with a photo &amp; message</li>
                        <li>Ready in 5 minutes</li>
                    </ul>
                </div>
            </div>
            <div class="Email GiftcardType">
                <div class="Title">eGift</div>
                <div class="Image"><img src="{{asset('frontend_assets/img/HG-eGift_en.png')}}"></div>
                <div class="Text">
                    <ul>
                        <li>Send directly to the recipient’s inbox</li>
                        <li>Personalize with a photo &amp; message</li>
                        <li>Ready in 5 minutes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="Section4 container">
    <div class="Titles">
        <h2>Happiness, guaranteed.</h2>
        <h3>Our helpful team is here to answer your questions.</h3>
    </div>
    <div class="QuoteWrapper">
        <div class="Image"><img src="{{asset('frontend_assets/img/thalia.jpg')}}"></div>
        <div class="Text">
            <div class="DoubleQuotes">“</div>
            <div class="Quote">"We are here to give you the utmost experience!”</div>
            <div class="AuthorName">OPERATIONS LEAD</div>
            <div class="AuthorRole">Thalia</div>
        </div>
    </div>
</section> --}}


<div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
@endpush
