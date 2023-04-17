
jQuery('.current-menu-item').on('click', function () {
    return false;
});
jQuery('.NavigationMobileMenuButton').click(function () {
    jQuery(this).unbind('hover');
    jQuery(this).toggleClass('close', 1000);
    if (jQuery(this).hasClass('close')) {
        jQuery('.NavigationMobileContainer').slideToggle(200);
        jQuery('.BrandLogos,footer,.Section1').addClass('zIndexLow');
        jQuery('.MobileBasket').addClass('MobileBasketOpenMenu');
        jQuery('body').css('overflow', 'hidden');
        jQuery('header .HeaderTop .NavigationContainer').addClass('MobileNavigationContainerOpened');
        jQuery('.NavigationMobileContainer .Logo img').attr('src', jQuery('.NavigationMobileContainer .Logo img').attr('src').replace(".svg", "_w.svg"));
    } else {
        jQuery('.NavigationMobileContainer').slideToggle(200);
        jQuery('.BrandLogos,footer,.Section1').removeClass('zIndexLow', 200);
        jQuery('.MobileBasket').removeClass('MobileBasketOpenMenu');
        jQuery('body').css('overflow', 'auto');
        jQuery('header .HeaderTop .NavigationContainer').removeClass('MobileNavigationContainerOpened');
        jQuery('.NavigationMobileContainer .Logo img').attr('src', jQuery('.NavigationMobileContainer .Logo img').attr('src').replace("_w.svg", ".svg"));
    }
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > jQuery('header').height()) {
        if (!jQuery('.HeaderTop').hasClass('Sticky')) {
            jQuery('.HeaderTop').addClass('Sticky');
            jQuery('.Section1').addClass('zIndexLow');
            if (jQuery(window).width() < 515) {
                jQuery('.Section1').css('position', 'static').css('margin-top', '-10px');
            }
        }
    } else {
        if (jQuery('.HeaderTop').hasClass('Sticky')) {
            jQuery('.HeaderTop').removeClass('Sticky');
            jQuery('.Section1').removeClass('zIndexLow');
            if (jQuery(window).width() < 515) {
                jQuery('.Section1').css('position', 'relative').css('margin-top', '0px');
            }
        }
    }
});
