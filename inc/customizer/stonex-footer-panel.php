<?php
/**
 * Keystone Base Footer Settings panel at Theme Customizer
 *
 * @package Keystone Base
 * @since 1.0.0
 */
add_action( 'customize_register', 'stonex_footer_settings_register' );
function stonex_footer_settings_register( $wp_customize ) {
	/**
     * Add Additional Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'stonex_footer_settings_panel',
	    array(
	        'priority'       => 30,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Footer Settings', 'stonex' ),
	    )
    );

    /**
	 * Widget Area Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'stonex_footer_widget_section',
        array(
            'title'		=> esc_html__( 'Widget Area', 'stonex' ),
            'panel'     => 'stonex_footer_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Switch option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'stonex_footer_widget_option',
        array(
            'default' => 'show',
            'transport'    => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    /**
     * Field for Image Radio
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'footer_widget_layout',
        array(
            'default'           => 'column_three',
            'transport'    => 'refresh',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new STONEX_Customize_Control_Radio_Image(
        $wp_customize,
        'footer_widget_layout',
            array(
                'label'    => esc_html__( 'Footer Widget Layout', 'stonex' ),
                'description' => esc_html__( 'Choose layout from available layouts', 'stonex' ),
                'section'  => 'stonex_footer_widget_section',
                'active_callback' => 'stonex_is_footer_shown',
                'choices'  => array(
	                    'column_four' => array(
	                        'label' => esc_html__( 'Columns Four', 'stonex' ),
	                        'url'   => '%s/assets/images/column-4.png'
	                    ),
	                    'column_three' => array(
	                        'label' => esc_html__( 'Columns Three', 'stonex' ),
	                        'url'   => '%s/assets/images/column-3.png'
	                    ),
	                    'column_two' => array(
	                        'label' => esc_html__( 'Columns Two', 'stonex' ),
	                        'url'   => '%s/assets/images/column-2.png'
	                    ),
	                    'column_one' => array(
	                        'label' => esc_html__( 'Column One', 'stonex' ),
	                        'url'   => '%s/assets/images/column-1.png'
	                    )
	            ),
	            'priority' => 10
            )
        )
    );

    $wp_customize->add_setting(
        'footer_background_color',
        array(
            'default' => '#22304A',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_background_color',
        array(
            'label'      => esc_html__( 'Footer Background Color', 'stonex' ),
            'section'    => 'stonex_footer_widget_section',
            'active_callback' => 'stonex_is_footer_shown',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default' => '#FFFFFF',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_text_color',
        array(
            'label'      => esc_html__( 'Footer Text Color', 'stonex' ),
            'section'    => 'stonex_footer_widget_section',
            'active_callback' => 'stonex_is_footer_shown',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_anchor_color',
        array(
            'default' => '#666666',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_anchor_color',
        array(
            'label'      => esc_html__( 'Footer Anchor Color', 'stonex' ),
            'section'    => 'stonex_footer_widget_section',
            'active_callback' => 'stonex_is_footer_shown',
            'priority'   => 20,
        ) )
    );

    /**
	 * Bottom Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'stonex_footer_bottom_section',
        array(
            'title'		=> esc_html__( 'Bottom Section', 'stonex' ),
            'panel'     => 'stonex_footer_settings_panel',
            'priority'  => 10,
        )
    );

    /**
     * Text field for copyright
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'stonex_copyright_text',
        array(
            'default'    => esc_html__( '© 2022 KeystoneX, All Rights Reserved', 'stonex' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'stonex_minimal_html_senitize'
        )
    );
    $wp_customize->add_control(
        'stonex_copyright_text',
        array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Copyright Text', 'stonex' ),
            'section'   => 'stonex_footer_bottom_section',
            'priority'  => 5,
        )
    );
    
    $wp_customize->selective_refresh->add_partial(
        'stonex_copyright_text',
        array(
            'selector' => 'span.stonex-copyright-text',
            'render_callback' => 'stonex_customize_partial_copyright',
        )
    );

    $wp_customize->add_setting(
        'footer_bottom_background_color',
        array(
            'default' => '#22304A',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_bottom_background_color',
        array(
            'label'      => esc_html__( 'Footer Bottom Background Color', 'stonex' ),
            'section'    => 'stonex_footer_bottom_section',
            'default'    => '#F3F4F8',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_bottom_text_color',
        array(
            'default' => '#201f22',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_bottom_text_color',
        array(
            'label'      => esc_html__( 'Footer Bottom Text Color', 'stonex' ),
            'section'    => 'stonex_footer_bottom_section',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_bottom_anchor_color',
        array(
            'default' => '#666666',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_bottom_anchor_color',
        array(
            'label'      => esc_html__( 'Footer Bottom Anchor Color', 'stonex' ),
            'section'    => 'stonex_footer_bottom_section',
            'priority'   => 20,
        ) )
    );

} //Footer panel close