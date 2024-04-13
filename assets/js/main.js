(function ($) {

    "use strict";

    if ($.fn.masonry) {
		$('.blog-content-row .blog-content-area').masonry({
			// options
			itemSelector: '.blog-content-area>div',
		});
	}
    $('select').select2({
        placeholder: 'Select an options',

    });

    $('select').select2().on('select2:open', function(e){
        $('.select2-search__field').attr('placeholder', 'Search your keywords');
    })

    /*------------------------------------------------------------------

    [Table of contents]

    1. CUSTOM PRE DEFINE FUNCTION

    2. MEANMENU INIT JS

    3. DROPDOWN MENU RIGHT SIDE CUT FIXED

    -------------------------------------------------------------------*/

    /*--------------------------------------------------------------

    1. CUSTOM PRE DEFINE FUNCTION

    ------------------------------------------------------------*/

    jQuery.fn.is_exist = function () {
        return this.length;
    }

    $(function () {
        /*--------------------------------------------------------------

        3. DROPDOWN MENU RIGHT SIDE CUT FIXED

        --------------------------------------------------------------*/

        $("#primary-menu li").on('mouseenter mouseleave', function (e) {

            if ($('ul', this).length) {

                var elm = $('ul.sub-menu', this);
                var off = elm.offset();
                var l = off.left;
                var w = elm.width();
                var docH = $(window).height();
                var docW = $(window).width();
                var isEntirelyVisible = (l + w <= docW);
                if (!isEntirelyVisible) {
                    $(this).addClass('edge-submenu');
                } else {
                    $(this).removeClass('edge-submenu');
                }
            }

        });
        if ('object' != typeof (elementorFrontend)) {

            $('.main-navigation ul.navbar-nav>li').each(function (i, v) {
                $(v).find('a').contents().wrap('<span class="menu-item-text"/>')
            });
            $(".menu-item-has-children > a").append('<span class="dropdownToggle"><i aria-hidden="true" class="fas fa-angle-down"></i></span>');

            if (jQuery('.stonex-main-menu-wrap').hasClass('menu-style-inline')) {
                if (jQuery(window).width() < 1025) {
                    jQuery('.stonex-main-menu-wrap').addClass('menu-style-flyout');
                } else {
                    jQuery('.stonex-main-menu-wrap').removeClass('menu-style-flyout');
                }

                $(window).resize(function () {
                    if (jQuery(window).width() < 1025) {
                        jQuery('.stonex-main-menu-wrap').addClass('menu-style-flyout');
                    } else {
                        jQuery('.stonex-main-menu-wrap').removeClass('menu-style-flyout');
                    }
                })
            }
            function navMenu() {
                // main menu toggleer icon (Mobile site only)
                $('[data-toggle="navbarToggler"]').on("click", function (e) {
                    $('.navbar').toggleClass('active');
                    $('.navbar-toggler-icon').toggleClass('active');
                    $('body').toggleClass('offcanvas--open');
                    e.stopPropagation();
                    e.preventDefault();
                });
                $('.navbar-inner').on("click", function (e) {
                    e.stopPropagation();
                });
                // Remove class when click on body
                $('body').on("click", function () {
                    $('.navbar').removeClass('active');
                    $('.navbar-toggler-icon').removeClass('active');
                    $('body').removeClass('offcanvas--open');
                });
                $('.main-navigation ul.navbar-nav li.menu-item-has-children>a').on("click", function (e) {
                    e.preventDefault();
                    $(this).siblings('.sub-menu').toggle();
                    $('ul.navbar-nav> li.menu-item-has-children> .sub-menu').not($(this).siblings()).not($(this).parents('.sub-menu')).hide();
                    $(this).parent('li').toggleClass('dropdown-active');
                })
                $(".stonex-mega-menu> ul.sub-menu > li > a").unbind('click'); // Navbar moved up
            }

            navMenu();

        }

    });/*End document ready*/

    $(window).load(function () {
        if ($.fn.masonry) {
            $('.blog-content-row .posts-row').masonry({
                // options
                itemSelector: '.posts-row>div',
            });
        }
        setTimeout(function () {
            jQuery(".stonex-preloader-wrap").fadeOut(500);
        }, 500);
        setTimeout(function () {
            jQuery(".stonex-preloader-wrap").remove();
        }, 2000);

    })


/* Woocommerce */



function stonexCartQtyBtn() {

    $(".woocommerce .quantity").append('<span class="stonex-qty-dec-btn stonex-qty-counter">-</span><span class="stonex-qty-inc-btn stonex-qty-counter">+</span>');

    $(".woocommerce .quantity .stonex-qty-counter").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent('.quantity').find("input").val();
        oldValue = oldValue ? oldValue : 0;
        if ($button.hasClass("stonex-qty-inc-btn")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent('.quantity').find("input").val(newVal);
        $('.woocommerce div.quantity input.qty').change();
    });
}
stonexCartQtyBtn();
$(document).ajaxComplete(function (event, request, settings) {
    if ($('.woocomerce-cart-form .quantity .stonex-qty-counter')) {
        $(".woocommerce .quantity .stonex-qty-counter").remove();
        stonexCartQtyBtn();
    }
});






})(jQuery);











