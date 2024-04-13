<?php
/**
 * Logistic General Settings panel at Theme Customizer
 *
 * @package Logistic
 * @since 1.0.0
 */

add_action( 'customize_register', 'stonex_general_settings_register' );

function stonex_general_settings_register( $wp_customize ) {
    $wp_customize->get_section( 'title_tagline' )->panel = 'stonex_general_settings_panel';
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    $wp_customize->get_section( 'colors' )->panel = 'stonex_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'background_image' )->panel = 'stonex_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';
    $wp_customize->get_section( 'static_front_page' )->panel = 'stonex_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '20';

    $wp_customize->add_setting(
        'header_background_color',
        array(
            'default' => '#F8F8F8',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'header_background_color',
        array(
            'label'      => esc_html__( 'Header Background Color', 'stonex' ),
            'section'    => 'colors',
            'priority'   => 20,
        ) )
    );

    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'stonex_general_settings_panel',
	    array(
	        'priority'       => 5,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'General Settings', 'stonex' ),
	    )
    );

    /**
     * preloader Adding
     *
     * @since 1.0.0
     */

    /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'stonex_preloader_section',
        array(
            'title'         => esc_html__( 'Preloader', 'stonex' ),
            'priority'      => 60,
            'panel'         => 'stonex_general_settings_panel',
        )
    );

    $wp_customize->add_setting(
        'stonex_preloader_show',
        array(
            'default' => 'show',
            'sanitize_callback' => 'stonex_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new stonex_Customize_Switch_Control(
        $wp_customize,
            'stonex_preloader_show',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Show Preloader', 'stonex' ),
                'section'   => 'stonex_preloader_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'stonex' ),
                    'hide'  => esc_html__( 'Hide', 'stonex' )
                ),
                'priority'  => 5,
            )
        )
    );

    $wp_customize->add_setting( 'stonex_preloader_img', array(
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'default'  => STONEX_ASSETS_URL . 'images/preloader.gif',
        'sanitize_callback' => 'stonex_sanitize_image',

    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stonex_preloader_img',
        array(
            'label'    => __( 'Upload Your Gif File', 'stonex' ),
            'section'  => 'stonex_preloader_section',
            'priority' => 10,
            'active_callback' => 'stonex_is_preloader_show',
        )
    ) );

    /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'stonex_website_layout_section',
        array(
            'title'         => esc_html__( 'Website Layout', 'stonex' ),
            'description'   => esc_html__( 'Choose a site to display your website more effectively.', 'stonex' ),
            'priority'      => 55,
            'panel'         => 'stonex_general_settings_panel',
        )
    );

    $wp_customize->add_setting(
        'stonex_site_layout',
        array(
            'default'           => 'fullwidth_layout',
            'sanitize_callback' => 'stonex_sanitize_select',
            'transport'=> 'postMessage',
        )
    );
    $wp_customize->add_control(
        'stonex_site_layout',
        array(
            'type' => 'radio',
            'priority'    => 5,
            'label' => esc_html__( 'Site Layout', 'stonex' ),
            'section' => 'stonex_website_layout_section',
            'choices' => array(
                'fullwidth_layout' => esc_html__( 'FullWidth Layout', 'stonex' ),
                'boxed_layout' => esc_html__( 'Boxed Layout', 'stonex' )
            ),
        )
    );

    /**
	 * Google Map API Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'stonex_map_section',
        array(
            'title'         => esc_html__('Google Map API', 'stonex'),
            'priority'      => 20,
            'panel'         => 'stonex_general_settings_panel',
        )
    );

    $wp_customize->add_setting(
        'stonex_map_api_settings',
        array(
            'default'    => esc_html__( 'Enter Google Map API', 'stonex' ),
            'transport'  => 'refresh',
            'sanitize_callback' => 'stonex_minimal_html_senitize'
        )
    );

    $wp_customize->add_control(
        'google_map_api_key',
        array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Google Map Api', 'stonex' ),
            'section'   => 'stonex_map_section',
            'settings' => 'stonex_map_api_settings',
            'priority'  => 5,
        )
    );

} // General panel closed