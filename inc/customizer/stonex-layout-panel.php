<?php

/**

 * Keystone Base Page layout for archive/sing/blog, page and single blog post

 *

 * @package Keystone Base

 * @since 1.0.0

 */



add_action( 'customize_register', 'stonex_design_settings_register' );



function stonex_design_settings_register( $wp_customize ) {



	// Register the radio image control class as a JS control type.

    $wp_customize->register_control_type( 'STONEX_Customize_Control_Radio_Image' );



	/**

     * Add Layout Settings Panel

     *

     * @since 1.0.0

     */

    $wp_customize->add_panel(

	    'stonex_layout_settings_panel',

	    array(

	        'priority'       => 25,

	        'capability'     => 'edit_theme_options',

	        'theme_supports' => '',

	        'title'          => esc_html__( 'Layout Settings', 'stonex' ),

	    )

    );



    /**

     * Archive Settings

     *

     * @since 1.0.0

     */

    $wp_customize->add_section(

        'stonex_archive_settings_section',

        array(

            'title'     => esc_html__( 'Archive/Blog Settings', 'stonex' ),

            'panel'     => 'stonex_layout_settings_panel',

            'priority'  => 5,

        )

    );



    /**

     * Image Radio field for archive sidebar

     *

     * @since 1.0.0

     */

    $wp_customize->add_setting(

        'stonex_archive_sidebar',

        array(

            'default'           => 'right_sidebar',

            'sanitize_callback' => 'stonex_sanitize_select',

        )

    );

    $wp_customize->add_control( new STONEX_Customize_Control_Radio_Image(

        $wp_customize,

        'stonex_archive_sidebar',

            array(

                'label'    => esc_html__( 'Archive Sidebars', 'stonex' ),

                'description' => esc_html__( 'Choose sidebar from available layouts', 'stonex' ),

                'section'  => 'stonex_archive_settings_section',

                'choices'  => array(

                        'left_sidebar' => array(

                            'label' => esc_html__( 'Left Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/left-sidebars.png'

                        ),

                        'right_sidebar' => array(

                            'label' => esc_html__( 'Right Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/right-sidebars.png'

                        ),

                        'no_sidebar' => array(

                            'label' => esc_html__( 'No Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/three-column.png'

                        )

                ),

                'priority' => 5

            )

        )

    );



    /**

     * Text field for archive read more

     *

     * @since 1.0.0

     */



    $wp_customize->add_setting(

        'stonex_redmore_show',

        array(

            'default' => 'hide',

            'transport'  => 'refresh',

            'sanitize_callback' => 'stonex_sanitize_switch_option',

        )

    );

    $wp_customize->add_control( new stonex_Customize_Switch_Control(

        $wp_customize,

            'stonex_redmore_show',

            array(

                'type'      => 'switch',

                'label'     => esc_html__( 'Show Read More Button', 'stonex' ),

                'description'   => esc_html__( 'Show/Hide option for Read More Button', 'stonex' ),

                'section'   => 'stonex_archive_settings_section',

                'choices'   => array(

                    'show'  => esc_html__( 'Show', 'stonex' ),

                    'hide'  => esc_html__( 'Hide', 'stonex' )

                ),

                'priority'  => 15,

            )

        )

    );



    $wp_customize->add_setting(

        'stonex_archive_read_more_text',

        array(

            'default'      => esc_html__( 'Read More', 'stonex' ),

            'transport'    => 'postMessage',

            'sanitize_callback' => 'sanitize_text_field'

            )

    );

    $wp_customize->add_control(

        'stonex_archive_read_more_text',

        array(

            'type'      	=> 'text',

            'label'        	=> esc_html__( 'Read More Text', 'stonex' ),

            'description'  	=> esc_html__( 'Enter read more button text for archive page.', 'stonex' ),

            'section'   	=> 'stonex_archive_settings_section',

            'priority'  	=> 15,

            'active_callback' => 'stonex_is_redmore_show',

        )

    );



    $wp_customize->selective_refresh->add_partial(

        'stonex_archive_read_more_text',

            array(

                'selector' => '.entry-footer > a.stonex-icon-btn',

                'render_callback' => 'stonex_customize_partial_archive_more',

            )

    );



    $wp_customize->add_control( new stonex_Customize_Switch_Control(

        $wp_customize,

            'stonex_background_opasity_show',

            array(

                'type'      => 'switch',

                'label'     => esc_html__( 'Show Background opacity', 'stonex' ),

                'description'   => esc_html__( 'Show/Hide option for Background opacity single post page.', 'stonex' ),

                'section'   => 'stonex_archive_settings_section',

                'choices'   => array(

                    'show'  => esc_html__( 'Show', 'stonex' ),

                    'hide'  => esc_html__( 'Hide', 'stonex' )

                ),

                'priority'  => 10,

            )

        )

    );



    $wp_customize->add_setting( 'single_bg_opasity_color', array(

        'capability'        => 'edit_theme_options',

        'default'           => '',

        'sanitize_callback' => 'sanitize_hex_color',

    ) );



    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_bg_opasity_color',

        array(

            'label'    => __( 'Background Opacity Color', 'stonex' ),

            'section'  => 'stonex_archive_settings_section',

            'active_callback' => 'stonex_background_opasity_show',

        )

    ));



    /**

     * Page Settings

     *

     * @since 1.0.0

     */

    $wp_customize->add_section(

        'stonex_page_settings_section',

        array(

            'title'     => esc_html__( 'Page Settings', 'stonex' ),

            'panel'     => 'stonex_layout_settings_panel',

            'priority'  => 10,

        )

    );



    /**

     * Image Radio for page sidebar

     *

     * @since 1.0.0

     */

    $wp_customize->add_setting(

        'stonex_default_page_sidebar',

        array(

            'default'           => 'no_sidebar',

            'sanitize_callback' => 'stonex_sanitize_select',

        )

    );

    $wp_customize->add_control( new STONEX_Customize_Control_Radio_Image(

        $wp_customize,

        'stonex_default_page_sidebar',

            array(

                'label'    => esc_html__( 'Page Sidebars', 'stonex' ),

                'description' => esc_html__( 'Choose sidebar from available layouts', 'stonex' ),

                'section'  => 'stonex_page_settings_section',

                'choices'  => array(

                        'left_sidebar' => array(

                            'label' => esc_html__( 'Left Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/page-left-sidebar.png'

                        ),

                        'right_sidebar' => array(

                            'label' => esc_html__( 'Right Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/page-right-sidebar.png'

                        ),

                        'no_sidebar' => array(

                            'label' => esc_html__( 'No Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/full-content.png'

                        )

                ),

                'priority' => 5

            )

        )

    );



    /**

     * Post Settings

     *

     * @since 1.0.0

     */

    $wp_customize->add_section(

        'stonex_post_settings_section',

        array(

            'title'     => esc_html__( 'Single Post Settings', 'stonex' ),

            'panel'     => 'stonex_layout_settings_panel',

            'priority'  => 15,

        )

    );



    /**

     * Single Post Background Image

     */

    $wp_customize->add_setting( 'singel_bg_image', array(

        'capability' => 'edit_theme_options',

        'type' => 'theme_mod',

        'default'  => get_template_directory_uri() . '/assets/images/blog-single-bg.png',

        'sanitize_callback' => 'stonex_sanitize_image',



    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'singel_bg_image',

        array(

            'label'    => __( 'Singel Background Image', 'stonex' ),

            'section'  => 'stonex_post_settings_section',

            'priority' => 5

        )

    ) );



    $wp_customize->add_setting( 'single_bg_color', array(

        'capability'        => 'edit_theme_options',

        'default'           => '#ececec',

        'sanitize_callback' => 'sanitize_hex_color',

    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_bg_color',

        array(

            'label'    => __( 'Background Color', 'stonex' ),

            'section'  => 'stonex_post_settings_section',

        )

    ));



    $wp_customize->add_setting(

        'stonex_background_opasity_show',

        array(

            'default' => 'show',

            'transport'  => 'refresh',

            'sanitize_callback' => 'stonex_sanitize_switch_option',

        )

    );





    /**

     * Image Radio for post sidebar

     *

     * @since 1.0.0

     */

    $wp_customize->add_setting(

        'stonex_default_post_sidebar',

        array(

            'default'           => 'right_sidebar',

            'sanitize_callback' => 'stonex_sanitize_select',

        )

    );

    $wp_customize->add_control( new STONEX_Customize_Control_Radio_Image(

        $wp_customize,

        'stonex_default_post_sidebar',

            array(

                'label'    => esc_html__( 'Post Sidebars', 'stonex' ),

                'description' => esc_html__( 'Choose sidebar from available layouts', 'stonex' ),

                'section'  => 'stonex_post_settings_section',

                'choices'  => array(

                        'left_sidebar' => array(

                            'label' => esc_html__( 'Left Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/page-left-sidebar.png'

                        ),

                        'right_sidebar' => array(

                            'label' => esc_html__( 'Right Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/page-right-sidebar.png'

                        ),

                        'no_sidebar' => array(

                            'label' => esc_html__( 'No Sidebar', 'stonex' ),

                            'url'   => '%s/assets/images/full-content.png'

                        )

                ),

                'priority' => 10

            )

        )

    );



    /**

     * Switch option for Related posts

     *

     * @since 1.0.0

     */

    $wp_customize->add_setting(

        'stonex_related_posts_option',

        array(

            'default' => 'show',

            'transport'  => 'refresh',

            'sanitize_callback' => 'stonex_sanitize_switch_option',

        )

    );

    $wp_customize->add_control( new stonex_Customize_Switch_Control(

        $wp_customize,

            'stonex_related_posts_option',

            array(

                'type'      => 'switch',

                'label'     => esc_html__( 'Related Post Option', 'stonex' ),

                'description'   => esc_html__( 'Show/Hide option for related posts section at single post page.', 'stonex' ),

                'section'   => 'stonex_post_settings_section',

                'choices'   => array(

                    'show'  => esc_html__( 'Show', 'stonex' ),

                    'hide'  => esc_html__( 'Hide', 'stonex' )

                ),

                'priority'  => 15,

            )

        )

    );



    /**

     * Text field for related post section title

     *

     * @since 1.0.0

     */

    $wp_customize->add_setting(

        'stonex_related_posts_title',

        array(

            'default'    => esc_html__( 'Related Posts', 'stonex' ),

            'transport'  => 'postMessage',

            'sanitize_callback' => 'sanitize_text_field'

        )

    );

    $wp_customize->add_control(

        'stonex_related_posts_title',

        array(

            'type'      => 'text',

            'label'     => esc_html__( 'Related Post Section Title', 'stonex' ),

            'section'   => 'stonex_post_settings_section',

            'active_callback' => 'stonex_is_related_shown',

        )

    );

    $wp_customize->selective_refresh->add_partial(

        'stonex_related_posts_title',

            array(

                'selector' => 'h2.stonex-related-title',

                'render_callback' => 'stonex_customize_partial_related_title',

            )

    );



    $wp_customize->add_setting(

        'stonex_related_post_from',

        array(

            'transport'  => 'refresh',

            'sanitize_callback' => 'stonex_sanitize_select',

            'default' => 'category',

        )

    );



    $wp_customize->add_control(

        'stonex_related_post_from', array(

            'type' => 'select',

            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.

            'section' => 'stonex_post_settings_section', // Add a default or your own section

            'label'     => esc_html__( 'Select Related Post Type', 'stonex' ),

            'active_callback' => 'stonex_is_related_shown',

            'description' => esc_html__( 'Select whish taxonomy you want to fetch related post', 'stonex' ),

            'choices' => array(

                'category' => esc_html__( 'Category', 'stonex' ),

                'tag' => esc_html__( 'Tag', 'stonex' ),

            ),

        )

    );



    if ( class_exists( 'WooCommerce' ) ) :

        /**
         * Product Settings
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'stonex_product_settings_section',
            array(
                'title'     => esc_html__( 'Product Page Settings', 'stonex' ),
                'panel'     => 'stonex_layout_settings_panel',
                'priority'  => 20,
            )
        );

        /**
         * Image Radio for page sidebar
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'stonex_product_page_sidebar',
            array(
                'default'           => 'right_sidebar',
                'sanitize_callback' => 'stonex_sanitize_select',
            )
        );
        $wp_customize->add_control( new stonex_Customize_Control_Radio_Image(
            $wp_customize,
            'stonex_product_page_sidebar',
                array(
                    'label'    => esc_html__( 'Product Page Sidebars', 'stonex' ),
                    'description' => esc_html__( 'Choose sidebar from available layouts', 'stonex' ),
                    'section'  => 'stonex_product_settings_section',
                    'choices'  => array(
                            'left_sidebar' => array(
                                'label' => esc_html__( 'Left Sidebar', 'stonex' ),
                                'url'   => '%s/assets/images/left-sidebars.png'
                            ),
                            'right_sidebar' => array(
                                'label' => esc_html__( 'Right Sidebar', 'stonex' ),
                                'url'   => '%s/assets/images/right-sidebars.png'
                            ),
                            'no_sidebar' => array(
                                'label' => esc_html__( 'No Sidebar', 'stonex' ),
                                'url'   => '%s/assets/images/full-content.png'
                            )
                    ),
                    'priority' => 5
                )
            )
        );

        /**
         * Single Product Settings
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'stonex_single_product_settings_section',
            array(
                'title'     => esc_html__( 'Single Product Settings', 'stonex' ),
                'panel'     => 'stonex_layout_settings_panel',
                'priority'  => 25,
            )
        );

        /**
         * Image Radio for post sidebar
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'stonex_single_product_sidebar',
            array(
                'default'           => 'right_sidebar',
                'sanitize_callback' => 'stonex_sanitize_select',
            )
        );
        $wp_customize->add_control( new stonex_Customize_Control_Radio_Image(
            $wp_customize,
            'stonex_single_product_sidebar',
                array(
                    'label'    => esc_html__( 'Single Product Sidebars', 'stonex' ),
                    'description' => esc_html__( 'Choose sidebar from available layouts', 'stonex' ),
                    'section'  => 'stonex_single_product_settings_section',
                    'choices'  => array(
                            'left_sidebar' => array(
                                'label' => esc_html__( 'Left Sidebar', 'stonex' ),
                                'url'   => '%s/assets/images/left-sidebars.png'
                            ),
                            'right_sidebar' => array(
                                'label' => esc_html__( 'Right Sidebar', 'stonex' ),
                                'url'   => '%s/assets/images/right-sidebars.png'
                            ),
                            'no_sidebar' => array(
                                'label' => esc_html__( 'No Sidebar', 'stonex' ),
                                'url'   => '%s/assets/images/full-content.png'
                            )
                    ),
                    'priority' => 5
                )
            )
        );

        /**
         * Switch option for Related posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'stonex_related_product_option',
            array(
                'default' => 'show',
                'transport'  => 'refresh',
                'sanitize_callback' => 'stonex_sanitize_switch_option',
            )
        );
        $wp_customize->add_control( new stonex_Customize_Switch_Control(
            $wp_customize,
                'stonex_related_product_option',
                array(
                    'type'      => 'switch',
                    'label'     => esc_html__( 'Related Product Option', 'stonex' ),
                    'description'   => esc_html__( 'Show/Hide option for related product section at single product page.', 'stonex' ),
                    'section'   => 'stonex_single_product_settings_section',
                    'choices'   => array(
                        'show'  => esc_html__( 'Show', 'stonex' ),
                        'hide'  => esc_html__( 'Hide', 'stonex' )
                    ),
                    'priority'  => 10,
                )
            )
        );


        endif; // if woocommerce available



} // Layout panel closed