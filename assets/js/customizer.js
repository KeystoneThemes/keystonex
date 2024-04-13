/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
	"use strict"

	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-branding h2').text(to);
		});
	});

	wp.customize('header_background_color', function (value) {
		value.bind(function (to) {
			$('.blog-breadcrumb').css({
				'background-color': to
			});
		});
	});

	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.blog-breadcrumb span, .blog-breadcrumb .post__caption, .blog-breadcrumb h1').css({
					'color': '#202427'
				});
			} else {
				$('.blog-breadcrumb span, .blog-breadcrumb .post__caption, .blog-breadcrumb h1').css({
					'color': to
				});
			}
		});
	});


	wp.customize('footer_background_color', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('#colophon').css({
					'background-color': '#f3f4f8'
				});
			} else {
				$('#colophon').css({
					'background-color': to
				});
			}
		});
	});

	wp.customize('footer_text_color', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.stonex-footer-widget, .stonex-footer-widget li, .stonex-footer-widget p, .stonex-footer-widget h3,  .stonex-footer-widget h4').css({
					'color': '#FFFFFF'
				});
			} else {
				$('.stonex-footer-widget, .stonex-footer-widget li, .stonex-footer-widget p, .stonex-footer-widget h3, .stonex-footer-widget h4').css({
					'color': to
				});
			}
		});
	});

	wp.customize('footer_anchor_color', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.stonex-footer-widget a').css({
					'color': '#666666'
				});
			} else {
				$('.stonex-footer-widget a').css({
					'color': to
				});
			}
		});
	});

	wp.customize('footer_bottom_background_color', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.stonex-copyright.text-center').css({
					'background-color': '#22304A'
				});
			} else {
				$('.stonex-copyright.text-center').css({
					'background-color': to
				});
			}
		});
	});

	wp.customize('footer_bottom_text_color', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.stonex-copyright p, .stonex-copyright, .stonex-copyright li').css({
					'color': '#666666'
				});
			} else {
				$('.stonex-copyright p, .stonex-copyright, .stonex-copyright li').css({
					'color': to
				});
			}
		});
	});

	wp.customize('footer_bottom_anchor_color', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.stonex-footer-bottom a, .stonex-copywright a, .stonex-copywright li a').css({
					'color': '#666666'
				});
			} else {
				$('.stonex-footer-bottom a, .stonex-copywright a, .stonex-copywright li a').css({
					'color': to
				});
			}
		});
	});

	wp.customize('stonex_site_layout', function (value) {
		value.bind(function (to) {
			if ('boxed_layout' === to) {
				$('body').addClass('box-layout-page');
			} else {
				$('body').removeClass('box-layout-page');
			}
		});
	});
	
})(jQuery);