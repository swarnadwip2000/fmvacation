@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | About Us
@endsection
@push('styles')
@endpush


@section('content')
<section class="Section1 container">
    <div class="Left">
        <div class="Row Row1">
            <div class="Text">
                <p>We’re experts in gifting experiences.<br />
                    We’re known for our <strong>global reach of perfectly<br />
                        personalized gifts</strong>.<br />
                    And we invite you to join us.</p>
            </div>
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_about_01.png"></div>
        </div>
        <div class="Row Row2">
            <div class="Text">
                <p>We believe that experiences make the best gifts.<br />
                    The magic of a gift lives in the memories made.<br />
                    With 1 gift card for a hotel stay at <strong>over 550,000 hotels with 140+ hotel brands, in 170+ countries worldwide</strong>. We make it easy to give the gift of a night away.</p>
            </div>
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_about_02.png"></div>
        </div>
    </div>
    <div class="Right">
        <div class="P1">
            <p>Hotelgift started in 2014 when our co-founders Loes Daniels and Jorik Schröder had an idea to make buying and sending memorable gifts across the globe even easier.</p>
        </div>
        <div class="P2">
            <div class="Quotes"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/Quotes.svg"></div>
            <p>Being members of the travel community ourselves, we know the struggle of giving a fellow world explorer the perfect travel gift. How do you give a travel gift they don’t need to put in their suitcase and that adds true value to their trip? That is why we created Hotelgift, the gift of giving an overnight stay they can use for their dream destination.</p>
            <p>&#8211; Loes Daniels.</p>
        </div>
        <div class="P3">
            <div class="Quotes"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/Quotes.svg"></div>
            <p>From working at the kitchen table, Loes and Jorik now operate from an office in a 17th-century canalside building in the heart of Amsterdam. Here, you’ll find an international team with the shared goal of spreading happiness through the gift of experience.</p>
        </div>
    </div>
</section>
<section class="Section2 container">
    <div class="Title">
        <div class="Star"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/star.svg"></div>
        <h2>Where we spread happiness</h2>
    </div>
    <div class="Image"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/globe.png"></div>
    <div class="DottedLine"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/dotted_line.svg"></div>
</section>
<section class="Section3 container">
    <div class="Title">
        <h2>Who we are</h2>
    </div>
    <div class="SubTitle">
        <h3>The team at Experiencegift consists of experts in their field.</h3>
    </div>
    <div class="Text">
        <p>We’re an international group, committed to spreading happiness through the gift of experience and aiming to wow our customers. Our Customer Success team is who you’ll speak with if you have any questions.</p>
        <p>Friendly and helpful, they’ll go the extra mile to make your experience perfect. Foxy is the top-dog and professional happiness-spreader in our office.</p>
    </div>
    <div class="Team">
        <div class="Member">
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/loes.jpg"></div>
            <div class="Name">Loes</div>
            <div class="Role">FOUNDER</div>
        </div>
        <div class="Member">
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/jorik.jpg"></div>
            <div class="Name">Jorik</div>
            <div class="Role">FOUNDER</div>
        </div>
        <div class="Member">
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/george.jpg"></div>
            <div class="Name">George</div>
            <div class="Role">LEAD DEVELOPER</div>
        </div>
        <div class="Member">
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/thalia.jpg"></div>
            <div class="Name">Thalia</div>
            <div class="Role">LEAD OPERATIONS</div>
        </div>
        <div class="Member">
            <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/lina.jpg"></div>
            <div class="Name">Lina</div>
            <div class="Role">LEAD DESIGNER</div>
        </div>
    </div>
    <div style="clear: both"></div>
</section>
<section class="Section4 container">
    <div class="Badge"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/Badge.svg"></div>
    <div class="Title">
        <h2>Hotelgift is the #1 best-selling gift card for hotels worldwide </h2>
    </div>
    <div class="Text">
        <p>Since launching, tens of thousands of customers have already enjoyed giving and receiving the unforgettable gift of travel.</p>
    </div>
    <div class="Brands">
        <div class="Experiencegift">
            <a href="https://www.experiencegift.com"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/experiencegift-logo.svg"></a>
            <span>is the umbrella brand of</span>
        </div>
        <div class="Values container">
            <div class="Trust">
                <div class="Circle" style="background: url(https://www.hotelgift.com/wp-content/uploads/2021/04/trust.png);">
                    <div class="Title">Trust</div>
                </div>
                <div class="Text">Book with our hundreds of trusted partners worldwide.</div>
            </div>
            <div class="Care">
                <div class="Circle" style="background: url(https://www.hotelgift.com/wp-content/uploads/2021/04/care.png);">
                    <div class="Title">Care</div>
                </div>
                <div class="Text">Get excellent customer care from our 24/7 support team.</div>
            </div>
            <div class="Growth">
                <div class="Circle" style="background: url(https://www.hotelgift.com/wp-content/uploads/2021/04/growth.png);">
                    <div class="Title">Growth</div>
                </div>
                <div class="Text">Broaden your horizon through the gift of travel.</div>
            </div>
            <div class="Experience">
                <div class="Circle" style="background: url(https://www.hotelgift.com/wp-content/uploads/2021/04/experience.png);">
                    <div class="Title">Experience</div>
                </div>
                <div class="Text">Add true value to someone’s life through memories that last forever</div>
            </div>
            <div class="Love">
                <div class="Circle" style="background: url(https://www.hotelgift.com/wp-content/uploads/2021/04/love.png);">
                    <div class="Title">Love</div>
                </div>
                <div class="Text">Make a conscious decision to give back through our partnerships with NGOs</div>
            </div>
        </div>
    </div>
</section>
<section class="Section5 container">
    <div class="Timeline">
        <div class="Title">
            <div class="Badge"><img src="https://www.hotelgift.com/wp-content/themes/appgift2/images/About/Trophy.svg"></div>
            <h2>AN AWARD-WINNING GIFT COMPANY</h2>
        </div>
        <div class="Image">
            <img data-XLarge="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_awards_XL.png" data-Large="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_awards_Large.png" data-Medium="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_awards_Medium.png" data-Small="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_awards_timeline_small.png" data-XSmall="https://www.hotelgift.com/wp-content/uploads/2021/04/HG_awards-XSmall.png" width="100%">
        </div>
    </div>
</section>

<section class="Section7 container">
    <div class="Wrapper">
        <div class="Description">
            <div class="Title">
                <h2>Sustainable travel gift</h2>
            </div>
            <div class="P1">
                <p>WE CARE ABOUT THE PLANET WE LOVE TO EXPLORE. WE PARTNER WITH MADE BLUE TO SUPPORT OUR VALUES AND COMPANY MISSION SURROUNDING SUSTAINABLE TRAVEL.</p>
            </div>
            <div class="P2">
                <p>Made Blue promotes clean drinking water on a global scale. Their mission is to give people living in developing countries access to clean drinking water. They aim to make a real impact so that their water supplies will continue to work in the future.</p>
            </div>
            <div class="Action"><a href="https://www.hotelgift.com/our-cause">LEARN MORE</a></div>
        </div>
        <div class="Image"><img src="https://www.hotelgift.com/wp-content/uploads/2021/04/sustainability-globe.jpg"></div>
    </div>
</section>
<div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
@endpush
