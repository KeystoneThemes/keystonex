<?php
// File Security Check
if (!defined('ABSPATH')) {
    exit;
}
function stonex_theme_options_style()
{
    // Globalizing theme options values
    $stonex = get_option('stonex');
    //
    // Enqueueing StyleSheet file
    //

    $page_id    = get_the_ID();
    $css_output = '';
    $js_output  = '';

    if (isset($stonex['sticky_background_color'])) {
        $css_output .= '
				.is-sticky #stonex-tb-header:not(.sticky-mobile-off) > .elementor > .elementor-section {
					background-color: ' . esc_attr($stonex['sticky_background_color']["color"]) . ' !important;
				}
			';
    }
    if ( isset( $stonex['primary_color'] ) || isset( $stonex['secondary_color'] ) || isset( $stonex['accent_color'] ) ) {
        $heading_color = $stonex['heading_color']['color'];
        $text_color = $stonex['body_color']['color'];
        $accent_color = $stonex['primary_color']['color'];
        $accent_color_2 = $stonex['secondary_color']['color'];
        $white_color = $stonex['neutral_1']['color'];
        $css_output .= "
				:root {
                    --heading-color: $heading_color;
                    --text-color: $text_color;
                    --accent-color: $accent_color;
                    --accent-color-2: $accent_color_2;
                    --white-color: $white_color;
                }
			";
        
            update_option( 'elementor_scheme_color', array($heading_color, $text_color, $accent_color, $accent_color_2,$white_color) );
    }


    if (isset($stonex['sticky_menu_color'])) {
        $css_output .= '.is-sticky .menu-style-inline.navbar:not(.active) .main-navigation ul.navbar-nav>li>a, .is-sticky .menu-style-inline.navbar:not(.active) .main-navigation ul.navbar-nav>li .dropdownToggle {
            color:' . esc_attr($stonex['sticky_menu_color']["color"]) . '!important;
        }';
    }


    if (isset($stonex['scustom_css'])) {
        $css_output .= $stonex['scustom_css'];
    }

    wp_add_inline_style('stonex-responsive', $css_output);

    if (isset($stonex['scustom_js'])) {
        $js_output .= $stonex['scustom_js'];
    }

    wp_add_inline_script('stonex-config', $js_output);
}
add_action('wp_enqueue_scripts', 'stonex_theme_options_style');
