<?php
/**
 * File to sanitize customizer field
 *
 * @package Keystone Base
 * @since 1.0.0
 */
/**
 * Sanitize checkbox value
 *
 * @since 1.0.1
 */
function stonex_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * Sanitize site layout
 *
 * @since 1.0.0
 */
function stonex_sanitize_site_layout( $input ) {
    $valid_keys = array(
        'fullwidth_layout' => esc_html__( 'Fullwidth Layout', 'stonex' ),
        'boxed_layout'     => esc_html__( 'Boxed Layout', 'stonex' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize site image
 *
 * @since 1.0.0
 */
function stonex_sanitize_image( $input ) {
	$filetype = wp_check_filetype( $input );
	if ( $filetype['ext'] && wp_ext2type( $filetype['ext'] ) === 'image' ) {
		return esc_url( $input );
	}
	return '';
}

/**
 * switch option (show/hide)
 *
 * @since 1.0.0
 */
function stonex_sanitize_switch_option( $input ) {
    $valid_keys = array(
        'show'  => esc_html__( 'Show', 'stonex' ),
        'hide'  => esc_html__( 'Hide', 'stonex' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_customize_register()
 *
 * @return void
 */
function stonex_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_customize_register()
 *
 * @return void
 */
function stonex_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_customize_partial_blog_heading()
 *
 * @return void
 */
function stonex_customize_partial_blog_heading() {
    return get_theme_mod( 'stonex_header_heading_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_customize_partial_dis_heading()
 *
 * @return void
 */
function stonex_customize_partial_dis_heading() {
    return get_theme_mod( 'stonex_header_dis_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_footer_settings_register()
 *
 * @return void
 */
function stonex_customize_partial_copyright() {
    return get_theme_mod( 'stonex_copyright_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_design_settings_register()
 *
 * @return void
 */
function stonex_customize_partial_related_title() {
    return get_theme_mod( 'stonex_related_posts_title' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since stonex 1.0.0
 * @see stonex_design_settings_register()
 *
 * @return void
 */
function stonex_customize_partial_archive_more() {
    return get_theme_mod( 'stonex_archive_read_more_text' );
}

/**
 * Active callback function for featured post section at top header
 *
 * @since 1.0.0
 */
function stonex_featured_posts_active_callback( $control ) {
    if ( $control->manager->get_setting( 'stonex_top_featured_option' )->value() == 'show' ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Sanitize select and radio fields
 *
 * @since 1.0.0
 */
function stonex_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * check if related post options enable
 *
 * @since 1.0.0
 */
function stonex_is_related_shown( $control ) {
    if ( $control->manager->get_setting('stonex_related_posts_option')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}
function stonex_background_opasity_show( $control ) {
    if ( $control->manager->get_setting('stonex_background_opasity_show')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * check redmore options enable
 *
 * @since 1.0.0
 */
function stonex_is_redmore_show( $control ) {
    if ( $control->manager->get_setting('stonex_redmore_show')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * check preloader options enable
 *
 * @since 1.0.0
 */
function stonex_is_preloader_show( $control ) {
    if ( $control->manager->get_setting('stonex_preloader_show')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * check if footer widget area options enable
 *
 * @since 1.0.0
 */
function stonex_is_footer_shown( $control ) {
    if ( $control->manager->get_setting('stonex_footer_widget_option')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * Minimal html textarea
 *
 * @since 1.0.0
 */
function stonex_minimal_html_senitize( $input ) {
    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
    );
    
    return wp_kses($input, $allowed_html);
}

