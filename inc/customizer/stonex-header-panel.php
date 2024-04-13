<?php
/**
 * Keystone Base Header Settings panel at Theme Customizer
 *
 * @package Keystone Base
 * @since 1.0.0
 */
add_action( 'customize_register', 'stonex_header_settings_register' );
function stonex_header_settings_register( $wp_customize ) {
	/**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel('stonex_header_settings_panel',array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__( 'Header Settings', 'stonex' ),
    ));

    $wp_customize->get_section('header_image')->panel = 'stonex_header_settings_panel';
    $wp_customize->get_section('header_image')->title = esc_html__('Header Background Image', 'stonex');
    $wp_customize->get_section('header_image')->priority = 3;

     /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'stonex_header_background_section',
        array(
            'title'         => esc_html__( 'Header Background Color', 'stonex' ),
            'description'   => esc_html__( 'Choose Header Background Color.', 'stonex' ),
            'priority'      => 55,
            'panel'         => 'stonex_header_settings_panel',
        )
    );

    $wp_customize->add_setting(
        'header_background_color',
        array(
            'default' => '#ececec',
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
            'section'    => 'stonex_header_background_section',
            'priority'   => 20,
        ) ) 
    );

    $wp_customize->add_section(
        'stonex_header_content_section',
        array(
            'title'         => esc_html__( 'Blog Header Content', 'stonex' ),
            'priority'      => 55,
            'panel'         => 'stonex_header_settings_panel',
        )
    );
    // Heading
    $wp_customize->add_setting(
        'stonex_header_heading_text',
        array(
            'default'    => esc_html__( 'Welcome to our blog', 'stonex' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'stonex_minimal_html_senitize'
        )
    );
    $wp_customize->add_control(
        'stonex_header_heading_text',
        array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Blog Heading', 'stonex' ),
            'section'   => 'stonex_header_content_section',
            'priority'  => 5,
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'stonex_header_heading_text',
        array(
            'selector' => 'h1.post__title.blog-heading',
            'render_callback' => 'stonex_customize_partial_blog_heading',
        )
    );

    // Heading
    $wp_customize->add_setting(
        'stonex_header_dis_text',
        array(
            'default'    => esc_html__( 'Read latest news from our blog & learn new things.', 'stonex' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'stonex_minimal_html_senitize'
        )
    );
    $wp_customize->add_control(
        'stonex_header_dis_text',
        array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Blog Caption', 'stonex' ),
            'section'   => 'stonex_header_content_section',
            'priority'  => 5,
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'stonex_header_dis_text',
        array(
            'selector' => '.front-page',
            'render_callback' => 'stonex_customize_partial_dis_heading',
        )
    );

    $wp_customize->add_setting(
        'stonex_bread_menu',
        array(
            'default' => 'show',
            'sanitize_callback' => 'stonex_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new stonex_Customize_Switch_Control(
        $wp_customize,
            'stonex_bread_menu',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Show Breadcrumb', 'stonex' ),
                'description'   => esc_html__( 'Show/Hide option for Blog post page.', 'stonex' ),
                'section'   => 'stonex_header_content_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'stonex' ),
                    'hide'  => esc_html__( 'Hide', 'stonex' )
                ),
                'priority'  => 10,
            )
        )
    );
    
} // header panel close