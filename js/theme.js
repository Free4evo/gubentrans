/*
 Theme Name: Cargo Pifour - Logistic and Transportation HTML Template
 Theme URL: themewar.com/html/pifour/
 Author: ExpandTHeme
 Author URI: http://themeforest.net/user/expandtheme
 Description: Cargo Pifour
 Version: 1.0
 */


(function ($) {
    'use strict';

    /******************************************
 -    PREPARE PLACEHOLDER FOR SLIDER    -
 ******************************************/

var setREVStartSize = function () {
    try {
        var e = new Object, i = jQuery(window).width(), t = 9999, r = 0, n = 0, l = 0, f = 0, s = 0, h = 0;
        e.c = jQuery('#rev_slider_1_1');
        e.responsiveLevels = [1240, 1024, 778, 480];
        e.gridwidth = [1300, 1130, 778, 480];
        e.gridheight = [650, 450, 650, 550];

        e.sliderLayout = "fullwidth";
        if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
            }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
            var u = (e.c.width(), jQuery(window).height());
            if (void 0 != e.fullScreenOffsetContainer) {
                var c = e.fullScreenOffsetContainer.split(",");
                if (c) jQuery.each(c, function (e, i) {
                    u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
            }
            f = u
        } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
        e.c.closest(".rev_slider_wrapper").css({height: f})

    } catch (d) {
        console.log("Failure at Presize of Slider:" + d)
    }
};

    //=======================================================
    // magnificPopup
    //=======================================================
    if ($('a.popUp').length > 0) {
        $("a.popUp").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }


//setREVStartSize();

    //=========================
    // Revolution Slider
    //=========================
    if ($(".sliderSection").length > 0)
    {
        console.log($('.tp-banner'));
        $('.tp-banner').revolution({
            delay: 9000,
            sliderType: "standard",
            sliderLayout: "fullwidth",
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1300, 1130, 778, 480],
            gridheight: [650, 450, 400, 550],
            startwidth: 1140,
            startheight: 500,
            startWithSlide: 0,
            fullScreenAlignForce: "off",
            navigationType: "bullet",
            navigationArrows: "on",
            navigationStyle: "round",
            touchenabled: "on",
            onHoverStop: "off",
            navOffsetHorizontal: 0,
            navOffsetVertical: 20,
            shadow: 0,
            fullWidth: "off",
            fullScreen: "on",
            navigationVOffset: 35,
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0

        });
    }
    ;
})(jQuery);
