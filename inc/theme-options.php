<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( !class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "stonex";

$theme_dir = get_template_directory_uri();

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'dev_mode'             => false,
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    // 'display_name'         => $theme->get( 'Name' ),
    'display_name'         => esc_html__( 'Theme Settings', 'stonex' ),
    // Name that appears at the top of your panel
   'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Theme Settings', 'stonex' ),
    'page_title'           => esc_html__( 'Theme Settings', 'stonex' ),
    // You will need to generate a Google API key to use this feature.
    'page_slug'            => 'KeystoneCoreOptions',
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => 'AIzaSyAs5fBAvB5HKK05nz5zhb1eWFziECHEz6o',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => true,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => false,
    // Enable basic customizer support
    // 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => get_theme_file_uri( '/assets/images/theme-options/theme-option.svg"' ),
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit' => 'Enjoyed our theme? Check out more themes on <a href="https://www.KeystoneThemes.com">KeystoneThemes.com</a>',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

// Add content after the form.
$args['footer_text'] = sprintf( '<p>%s</p>', esc_html__( 'KeystoneX - Theme Settings.', 'stonex' ) );

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
/*
$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__( 'Theme Information 1', 'stonex' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'stonex' ) . '</p>',
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__( 'Theme Information 2', 'stonex' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'stonex' ) . '</p>',
    ),
);
Redux::set_help_tab( $opt_name, $tabs );

// Set the help sidebar
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'stonex' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

// theme activation check
// if (  get_option( 'stonex' )['theme_activation'] ) {
//     $theme_activation = array(
//         'id'    => 'info_success',
//         'type'  => 'info',
//         'title' => __( 'Theme activated succeessfully!!', 'stonex' ),
//         'style' => 'success',
//     );
// } else {
//     $theme_activation = array(
//         'id'    => 'info_error',
//         'type'  => 'info',
//         'title' => __( 'Theme are not activated', 'stonex' ),
//         'style' => 'critical',
//     );
// }

/*
 *
 * ---> START SECTIONS
 *
 */

/*
As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */
/*
Redux::set_section( $opt_name, array(
'icon'             => get_theme_file_uri( '/assets/images/theme-options/dashboard.png"' ),
'icon_type'        => 'image',
'title'            => esc_html__( 'Welcome', 'stonex' ),
'id'               => 'welcom_settings',
'class'            => 'option-page-layout',
'customizer_width' => '450px',
'fields'           => array(
array(
'id'       => 'opt-raw',
'type'     => 'raw',
'title'    => esc_html__( 'Raw output', 'stonex' ),
'subtitle' => esc_html__( 'Subtitle text goes here.', 'stonex' ),
'desc'     => esc_html__( 'This is the description field for additional info.', 'stonex' ),
'content'  => '', // Now let's set that in the raw field.
),
array(
'id' => 'theme_activation',
'type' => 'text',
'title'    => esc_html__( 'License', 'stonex' ),
'validate_callback' => 'stonex_license_validate',
'placeholder' => __('license key', 'stonex')
)

),
)
); */

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/branding.png"' ),
    'icon_type'        => 'image',
    'title'            => esc_html__( 'Branding', 'stonex' ),
    'id'               => 'logo_settings',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'       => 'primary_logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Primary Logo', 'stonex' ),
            'subtitle' => '<p>Use a logo which will be used on white background. </p>
           <p> Recommended size: 125 x 40 | PNG, SVG</p>',
            'default'  => array(
                'url' => 'https://keystonethemes.com/wp-content/uploads/2022/11/KeystoneX-Main.svg',
            ),
        ),
        array(
            'id'       => 'secondary_logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Dark Version Logo', 'stonex' ),
            'subtitle' => '<p>Use a logo which will be used on dark background. </p>
            <p> Recommended size: 125 x 40 | PNG, SVG</p>',
            'default'  => array(
                'url' => 'https://keystonethemes.com/wp-content/uploads/2022/12/Dark-Logo.svg',
            ),
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Favicon', 'stonex' ),
            'subtitle' => esc_html__( 'Choose the favicon', 'stonex' ),
            'default'  => array(
                'url' => 'https://keystonethemes.com/wp-content/uploads/2022/12/favicon.png',
            ),
        ),

        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Preloader?', 'stonex' ),
            'desc'    => esc_html__( 'Wish to use preloader?', 'stonex' ),
            'default' => false,
        ),
        array(
            'id'          => 'preloader_style',
            'type'        => 'select',
            'title'       => esc_html__( 'Preloader Style', 'stonex' ),
            'desc'        => esc_html__( 'Select a predefined preloader style.', 'stonex' ),
            'placeholder' => __( 'Select a style', 'stonex' ),
            'options'     => array(
                'default' => esc_html__( 'Default', 'stonex' ),
                'style-1' => esc_html__( 'Style 1', 'stonex' ),
                'style-2' => esc_html__( 'Style 2', 'stonex' ),
                'custom'  => esc_html__( 'Custom', 'stonex' ),
            ),
            'default'     => 'default',
            'required'    => array( 'enable_preloader', '=', true ),
        ),
        array(
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Preloader image', 'stonex' ),
            'subtitle' => esc_html__( 'Choose the site preloader', 'stonex' ),
            'required' => array( 'preloader_style', '=', 'custom' ),

        ),
    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/brand-typography.png"' ),
    'icon_type'        => 'image',

    'title'            => esc_html__( 'Typography', 'stonex' ),
    'id'               => 'typography',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'             => 'h1_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'H1', 'stonex' ),
            'subtitle'       => esc_html__( 'Set Heading 1 options.', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '700',
                'google'         => true,
                "font-size"      => "110px",
                // "line-height"    => "100px",
               // "letter-spacing" => "-2px",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'text-align'     => false,
            'units'          => 'px',
        ),

        array(
            'id'             => 'h2_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'H2', 'stonex' ),
            'subtitle'       => esc_html__( 'Set Heading 2 options.', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'google'         => true,
                'font-weight'    => '700',
                "font-size"      => "80px",
                // "line-height"    => "80px",
               // "letter-spacing" => "-2px",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'text-align'     => false,
            'color'          => true,
            'units'          => 'px',
        ),

        array(
            'id'             => 'h3_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'H3', 'stonex' ),
            'subtitle'       => esc_html__( 'Set Heading 3 options.', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '700',
                'google'         => true,
                "font-size"      => "52px",
                // "line-height"    => "52px",
               // "letter-spacing" => "-0.3px",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'units'          => 'px',
        ),

        array(
            'id'             => 'h4_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'H4', 'stonex' ),
            'subtitle'       => esc_html__( 'Set Heading 4 options.', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '700',
                'google'         => true,
                "font-size"      => "28px",
                // "line-height"    => "36px",
               // "letter-spacing" => "-0.3px",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'units'          => 'px',
        ),

        array(
            'id'             => 'h5_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'H5', 'stonex' ),
            'subtitle'       => esc_html__( 'Set Heading 5 options.', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '700',
                'google'         => true,
                "font-size"      => "24px",
                // "line-height"    => "34px",
               // "letter-spacing" => "",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'units'          => 'px',
        ),

        array(
            'id'             => 'h6_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'H6', 'stonex' ),
            'subtitle'       => esc_html__( 'Set Heading 6 options.', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '700',
                'google'         => true,
                "font-size"      => "21px",
                // "line-height"    => "34px",
               // "letter-spacing" => "",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'units'          => 'px',
        ),

        array(
            'id'             => 'body_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body Default', 'stonex' ),
            'subtitle'       => esc_html__( 'Set <body> and <p> options.
            .', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '400',
                'google'         => true,
                "font-size"      => "16px",
                // "line-height"    => "34px",
               // "letter-spacing" => "",
                "font-color"     => "#495460",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'output'         => array( 'body' ),
            'units'          => 'px',
        ),

        array(
            'id'             => 'body_extra_extra_large_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body XXL', 'stonex' ),
            'subtitle'       => esc_html__( 'Set <body> and <p> options.
            .', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '400',
                'google'         => true,
                "font-size"      => "21px",
                // "line-height"    => "34px",
               // "letter-spacing" => "",
                "font-color"     => "#b8c1cc",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'output'         => array( 'div.elementor-widget-heading .elementor-heading-title.elementor-size-xxl', 'div.elementor-widget-container .stonex-size-xxl, body div.elementor-widget.stonex-size-xxl p' ),
            'units'          => 'px',
        ),
        array(
            'id'             => 'body_extra_large_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body XL', 'stonex' ),
            'subtitle'       => esc_html__( 'Set <body> and <p> options.
            .', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '400',
                'google'         => true,
                "font-size"      => "18px",
                // "line-height"    => "28px",
               // "letter-spacing" => "",
                "font-color"     => "#0C1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'output'         => array( 'div.elementor-widget-heading .elementor-heading-title.elementor-size-xl', 'div.elementor-widget-container .stonex-size-xl, body div.elementor-widget.stonex-size-xl p' ),
            'units'          => 'px',
        ),
        array(
            'id'             => 'body_large_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body Large', 'stonex' ),
            'subtitle'       => esc_html__( 'Set <body> and <p> options.
            .', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '400',
                'google'         => true,
                "font-size"      => "16px",
                // "line-height"    => "24px",
               // "letter-spacing" => "",
                "font-color"     => "#495460",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'output'         => array( 'div.elementor-widget-heading .elementor-heading-title.elementor-size-large', 'div.elementor-widget-container .stonex-size-large, body div.elementor-widget.stonex-size-large p' ),
            'units'          => 'px',
        ),
        array(
            'id'             => 'body_medium_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body Medium', 'stonex' ),
            'subtitle'       => esc_html__( 'Set <body> and <p> options.
            .', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '400',
                'google'         => true,
                "font-size"      => "14px",
                // "line-height"    => "20px",
               // "letter-spacing" => "",
                "font-color"     => "#0c1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'output'         => array( 'div.elementor-widget-heading .elementor-heading-title.elementor-size-medium', '.stonex-size-medium' ),
            'units'          => 'px',
        ),
        array(
            'id'             => 'body_small_typography',
            'type'           => 'typography',
            'title'          => esc_html__( 'Body Small', 'stonex' ),
            'subtitle'       => esc_html__( 'Set <body> and <p> options.
            .', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family'    => 'General Sans',
                'font-weight'    => '400',
                'google'         => true,
                "font-size"      => "12px",
                // "line-height"    => "16px",
               // "letter-spacing" => "",
                "font-color"     => "#0C1523",
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'text-align'     => false,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'font-size'      => true,
            'color'          => true,
            'output'         => array( 'div.elementor-widget-heading .elementor-heading-title.elementor-size-small', 'div.elementor-widget-container .stonex-size-small, body div.elementor-widget.stonex-size-small p' ),
            'units'          => 'px',
        ),

    ),
) );

Redux::set_section(
    $opt_name,
    array(
        'icon'             => get_theme_file_uri( '/assets/images/theme-options/brand-color.png"' ),
        'icon_type'        => 'image',
        'title'            => esc_html__( 'Brand Colors', 'stonex' ),
        'id'               => 'global_colors',
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'primary_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Primary Color', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'stonex' ),
                'default'  => array(
                    'color' => '#432cf3',
                    'alpha' => 1,
                ),
            ),
            array(
                'id'       => 'secondary_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Secondary Color', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'stonex' ),
                'default'  => array(
                    'color' => '#2ad590',
                    'alpha' => 1,
                ),

            ),
            array(
                'id'       => 'accent_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Accent Color', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'stonex' ),
                'default'  => array(
                    'color' => '#f82e2e',
                    'alpha' => 1,
                ),

            ),
            array(
                'id'       => 'heading_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Heading Color', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for headings.', 'stonex' ),
                'default'  => array(
                    'color' => '#0c1523',
                    'alpha' => 1,
                ),

            ),
            array(
                'id'       => 'body_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Body Color', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for body texts.', 'stonex' ),
                'default'  => array(
                    'color' => '#495460',

                ),

            ),
            array(
                'id'       => 'dark_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Dark Background', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for dark background.', 'stonex' ),
                'default'  => array(
                    'color' => '#070b18',
                ),

            ),
            array(
                'id'       => 'light_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Light Background', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for light background.', 'stonex' ),
                'default'  => array(
                    'color' => '#f3f7fa',
                ),

            ),
            array(
                'id'       => 'white_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'White Background', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#ffffff',
                ),
            ),

            array(
                'id'       => 'neutral_1',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 01', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#ffffff',
                ),
            ),
            array(
                'id'       => 'neutral_2',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 02', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#eaedf0',
                ),
            ),
            array(
                'id'       => 'neutral_3',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 03', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#cbd2d9',
                ),
            ),
            array(
                'id'       => 'neutral_4',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 04', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#b8c1cc',
                ),
            ),
            array(
                'id'       => 'neutral_5',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 05', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#7f8995',
                ),
            ),
            array(
                'id'       => 'neutral_6',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 06', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#495460',
                ),
            ),
            array(
                'id'       => 'neutral_7',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Neutral 07', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#0c1523',
                ),
            ),
            array(
                'id'       => 'success',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Success', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#26da42',
                ),
            ),
            array(
                'id'       => 'warning',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Warning', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#ffbb29',
                ),
            ),
            array(
                'id'       => 'info',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Info', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#485aff',
                ),
            ),
            array(
                'id'       => 'danger',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Danger', 'stonex' ),
                'subtitle' => esc_html__( 'Pick a color for white background.', 'stonex' ),
                'default'  => array(
                    'color' => '#ff3131',
                ),
            ),
        ),
    )
);

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/brand-typography.png"' ),
    'icon_type'        => 'image',
    'title'            => esc_html__( 'Global Fonts', 'stonex' ),
    'id'               => 'global_fonts',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'             => 'primary_fonts',
            'type'           => 'typography',
            'title'          => esc_html__( 'Primary Fonts', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family' => 'General Sans',
                // 'font-weight' => '400',
                'google'      => true,
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'font-size'      => false,
            'color'          => false,
            'output'         => array( 'body' ),
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set fonts for headings', 'stonex' ),
        ),
        array(
            'id'             => 'secondary_fonts',
            'type'           => 'typography',
            'title'          => esc_html__( 'Secondary Fonts', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family' => 'General Sans',
                // 'font-weight' => '400',
                'google'      => true,
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'font-size'      => false,
            'color'          => false,
            'output'         => array( 'body' ),
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set fonts for secondary headings', 'stonex' ),
        ),
        array(
            'id'             => 'text_fonts',
            'type'           => 'typography',
            'title'          => esc_html__( 'Text Fonts', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family' => 'General Sans',
                // 'font-weight' => '400',
                'google'      => true,
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'font-size'      => false,
            'color'          => false,
            'output'         => array( 'body' ),
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set fonts for text', 'stonex' ),
        ),
        array(
            'id'             => 'accent_fonts',
            'type'           => 'typography',
            'title'          => esc_html__( 'Accent Fonts', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family' => 'General Sans',
                // 'font-weight' => '400',
                'google'      => true,
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'font-size'      => false,
            'color'          => false,
            'output'         => array( 'body' ),
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set fonts for accent', 'stonex' ),
        ),

    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/header.png"' ),
    'icon_type'        => 'image',

    'title'            => esc_html__( 'Header', 'stonex' ),
    'id'               => 'header_settings',
    'customizer_width' => '450px',
    'fields'           => array(
        array(
            'id'      => 'enable_sticky_header',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Sticky Header?', 'stonex' ),
            'desc'    => esc_html__( 'Wish to enable sticky header?', 'stonex' ),
            'default' => false,
        ),
        array(
            'id'       => 'sticky_background_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__( 'Background color', 'stonex' ),
            'subtitle' => esc_html__( 'Pick a color for the sticky header.', 'stonex' ),
            'default'  => array(
                'color' => '#fff',
                'alpha' => 1,
            ),

            'required' => array( 'enable_sticky_header', '=', true ),
        ),
        array(
            'id'       => 'sticky_menu_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__( 'Menu color', 'stonex' ),
            'subtitle' => esc_html__( 'Change color of the menu when it’s on sticky.', 'stonex' ),
            'default'  => array(
                'color' => '',
                'alpha' => 1,
            ),

            'required' => array( 'enable_sticky_header', '=', true ),
        ),
        array(
            'id'       => 'enable_sticky_shadow',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show shadow?', 'stonex' ),
            'desc'     => esc_html__( 'Wish to show shadow in sticky header?', 'stonex' ),
            'default'  => true,
            'required' => array( 'enable_sticky_header', '=', true ),
        ),
        array(
            'id'       => 'sticky_mobile',
            'type'     => 'switch',
            'title'    => esc_html__( 'Sticky in mobile?', 'stonex' ),
            'desc'     => esc_html__( 'Wish to show shadow in sticky header?', 'stonex' ),
            'default'  => false,
            'required' => array( 'enable_sticky_header', '=', true ),
        ),
    ),
) );
/* Redux::set_section( $opt_name, array(
'icon'             => get_theme_file_uri( '/assets/images/theme-options/footer.png"' ),
'icon_type'        => 'image',

'title'            => esc_html__( 'Footer', 'stonex' ),
'id'               => 'footer_settings',
'customizer_width' => '450px',
'fields'           => array(
array(
'id'      => 'enable_back_to_top',
'type'    => 'switch',
'title'   => esc_html__( 'Enable Back to top button?', 'stonex' ),
'desc'    => esc_html__( 'Wish to enable back to top button?', 'stonex' ),
'default' => false,
),
),
) ); */

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/blog.png"' ),
    'icon_type'        => 'image',

    'title'            => esc_html__( 'Blog', 'stonex' ),
    'id'               => 'blog_settings',
    'customizer_width' => '450px',
    'subsection'       => false,
    'fields'           => array(
        array(
            'id'      => 'blog_page_title',
            'type'    => 'text',
            'title'   => __( 'Blog Page Tilte', 'stonex' ),
            'default' => 'Welcome To Our Blog',
        ),
        array(
            'id'      => 'blog_page_subtitle',
            'type'    => 'textarea',
            'title'   => __( 'Blog Page SubTitle', 'stonex' ),
            'default' => 'Read latest news from our blog & learn new things.',

        ),
        array(
            'id'       => 'blog_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog Layout', 'stonex' ),
            'subtitle' => esc_html__( 'Choose the layout you want in blog pages', 'stonex' ),
            'options'  => array(
                'no_sidebar'    => get_theme_file_uri( '/assets/images/layouts/fullpage.png"' ),
                'left_sidebar'  => get_theme_file_uri( '/assets/images/layouts/left-sidebar.png"' ),
                'right_sidebar' => get_theme_file_uri( '/assets/images/layouts/right-sidebar.png"' ),
            ),
            'default'  => 'right_sidebar',
        ),
        array(
            'id'       => 'blog_grid',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog Grid', 'stonex' ),
            'subtitle' => esc_html__( 'Choose the number of column you want in blog pages', 'stonex' ),
            'options'  => array(
                'one-column'   => get_theme_file_uri( '/assets/images/layouts/1-col.png"' ),
                'two-column'   => get_theme_file_uri( '/assets/images/layouts/2-col.png"' ),
                'three-column' => get_theme_file_uri( '/assets/images/layouts/3-col.png"' ),
            ),
            'default'  => 'two-column',
        ),

        array(
            'id'             => 'post_title_style',
            'type'           => 'typography',
            'title'          => esc_html__( 'Post Title Style', 'stonex' ),
            'google'         => true,
            'font-backup'    => false,
            'subsets'        => false,
            'default'        => array(
                'font-family' => 'General Sans',
                'font-weight' => '700',
                'google'      => true,
            ),
            "fonts"          => array(
                "General Sans" => "General Sans",
                "Poppins"      => "Poppins",
                "Roboto"       => "Roboto",
            ),
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'font-size'      => true,
            'color'          => true,
            'units'          => 'px',
            'subtitle'       => esc_html__( 'Set fonts for post title', 'stonex' ),
            'output'         => array( '.stonex-blog-title a' ),

        ),
        array(
            'id'      => 'show_excerpt',
            'type'    => 'switch',
            'title'   => __( 'Show Excerpt?', 'stonex' ),
            'default' => true,
        ),
        array(
            'id'      => 'show_readmore',
            'type'    => 'switch',
            'title'   => __( 'Show Readmore?', 'stonex' ),
            'default' => true,
        ),
        array(
            'id'      => 'show_date',
            'type'    => 'switch',
            'title'   => __( 'Show Date?', 'stonex' ),
            'default' => true,
        ),
        array(
            'id'      => 'show_category',
            'type'    => 'switch',
            'title'   => __( 'Show Category?', 'stonex' ),
            'default' => true,
        ),
        array(
            'id'      => 'show_breadcrumbs',
            'type'    => 'switch',
            'title'   => __( 'Show Breadcrumbs?', 'stonex' ),
            'default' => true,
        ),
        array(
            'id'       => 'posts_per_page',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Post to Show', 'stonex' ),
            'subtitle' => esc_html__( 'Set the number of posts displayed on a page.', 'stonex' ),
            'default'  => 12,
            'validate' => 'numeric',
        ),

    ),
) );

Redux::set_section( $opt_name, array(
    'title'            => esc_html__( 'Single Page', 'stonex' ),
    'id'               => 'single_page_settings',
    'customizer_width' => '450px',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'       => 'single_page_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Single Page Layout', 'stonex' ),
            'subtitle' => esc_html__( 'Choose the layout you want in single pages', 'stonex' ),
            'options'  => array(
                'no_sidebar'    => get_theme_file_uri( '/assets/images/layouts/fullpage.png"' ),
                'left_sidebar'  => get_theme_file_uri( '/assets/images/layouts/left-sidebar.png"' ),
                'right_sidebar' => get_theme_file_uri( '/assets/images/layouts/right-sidebar.png"' ),
            ),
            'default'  => 'right-sidebar',
        ),

        array(
            'id'      => 'show_post_navigation',
            'type'    => 'switch',
            'title'   => __( 'Show Post Navigation?', 'stonex' ),
            'default' => false,
        ),
        array(
            'id'      => 'single_breadcrumbs',
            'type'    => 'switch',
            'title'   => __( 'Show Breadcrumbs?', 'stonex' ),
            'default' => true,
        ),
    ),
) );

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/integrations.png"' ),
    'icon_type'        => 'image',

    'title'            => esc_html__( 'Integrations', 'stonex' ),
    'id'               => 'stonex_integrations',
    'customizer_width' => '450px',
    'subsection'       => false,
    'fields'           => array(
        array(
            'id'       => 'gmap_api',
            'type'     => 'text',
            'title'    => esc_html__( 'Google Maps Api', 'stonex' ),
            'subtitle' => esc_html__( 'Set the google map api.', 'stonex' ),
            'default'  => esc_html__( '1', 'stonex' ),
        ),
    ),
) );

Redux::set_section(
    $opt_name,
    array(
        'icon'             => get_theme_file_uri( '/assets/images/theme-options/general.png"' ),
        'icon_type'        => 'image',

        'title'            => esc_html__( '404 Page', 'stonex' ),
        'id'               => '404_settings',
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => '404_section',
                'type'        => 'select',
                'title'       => esc_html__( '404 Page', 'stonex' ),
                'placeholder' => __( 'Select a page', 'stonex' ),
                'desc'        => esc_html__( 'Select a custom 404 page to overwrite the default one.', 'stonex' ),
                'data'        => 'posts',
                'args'        => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
            ),

        ),
    )
);

Redux::set_section( $opt_name, array(
    'icon'             => get_theme_file_uri( '/assets/images/theme-options/code.png"' ),
    'icon_type'        => 'image',
    'title'            => esc_html__( 'Custom Code', 'stonex' ),
    'id'               => 'custom_section',
    'customizer_width' => '400px',
    'fields'           => array(

        array(
            'id'       => 'scustom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'CSS Code', 'stonex' ),
            'subtitle' => __( 'Paste your CSS code here.', 'stonex' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
            'default'  => " /** #header{\n   margin: 0 auto;\n }**/",
        ),
        array(
            'id'       => 'scustom_js',
            'type'     => 'ace_editor',
            'title'    => __( 'JavaScript Code', 'stonex' ),
            'subtitle' => __( 'Paste your JavaScript code here.', 'stonex' ),
            'mode'     => 'javascript',
            'theme'    => 'monokai',
            'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
            'default'  => " /** #header{\n   margin: 0 auto;\n }**/",
        ),

    ),
) );
/*
if ( class_exists( 'W3TC\Dispatcher' ) ) {
    Redux::set_section( $opt_name, array(
        'icon'             => get_theme_file_uri( '/assets/images/theme-options/gdpr.png"' ),
        'icon_type'        => 'image',
        'title'            => esc_html__( 'Optimization', 'stonex' ),
        'id'               => 'Optimization_section',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'      => 'enable_theme_optimization',
                'type'    => 'switch',
                'title'   => esc_html__( 'Load Theme Optimization?', 'stonex' ),
                'desc'    => esc_html__( 'Wish to use default theme optimization?', 'stonex' ),
                'default' => false,
            ),
        ),
    ) );
} else {
    Redux::set_section( $opt_name, array(
        'icon'             => get_theme_file_uri( '/assets/images/theme-options/gdpr.png"' ),
        'icon_type'        => 'image',
        'title'            => esc_html__( 'Optimization', 'stonex' ),
        'id'               => 'Optimization_section',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'       => 'enable_theme_optimization_notice',
                'type'     => 'info',
                'title'    => esc_html__( 'W3 Total Cache not active', 'stonex' ),
                'style'    => 'warning',
                'desc'     => esc_html__( 'The theme optimization option requires W3 Total Cache plugin to be active. Please activate the plugin to use this option.', 'stonex' ),
                'required' => array( 'enable_theme_optimization', '=', true ),
            ),
        ),
    ) );
} */

/* Redux::set_section( $opt_name, array(
'icon'             => get_theme_file_uri( '/assets/images/theme-options/gdpr.png"' ),
'icon_type'        => 'image',

'title'            => esc_html__( 'GDPR', 'stonex' ),
'id'               => 'gdpr_section',
'customizer_width' => '400px',
'fields'           => array(

array(
'id'      => 'enable_gdpr',
'type'    => 'switch',
'title'   => esc_html__( 'Enable GDPR?', 'stonex' ),
'desc'    => esc_html__( 'Wish to use GDPR?', 'stonex' ),
'default' => true,
),

array(
'id'       => 'gdpr_letter',
'type'     => 'textarea',
'title'    => esc_html__( 'Discuss letter', 'stonex' ),
'subtitle' => esc_html__( 'Give the discuss letter', 'stonex' ),
'required' => array( 'enable_gdpr', '=', true ),

),

),
) );

/*
 * <--- END SECTIONS
 */

Redux::set_section( $opt_name, array(
    'title'      => __( 'Demo Setup', 'stonex' ),
    'id'         => 'advance_demo_import',
    'icon'       => get_theme_file_uri( '/assets/images/theme-options/demo-setup.png' ),
    'fields'     => array(
        array(
            'id'       => 'import_setup',
            'type'     => 'raw',
            'title'    => __( 'Step 1: Active "Backup & Demo Content" addon.', 'stonex' ),
            'subtitle' => __( 'Easily import demo data starter site packages or Migrate your site data ', 'stonex' ),
            'content'  => '<a href="' . admin_url( 'admin.php?page=fw-extensions' ) . '" class="button button-primary">' . __( 'Active "Backup & Demo Content" addon', 'stonex' ) . '</a>',
        ),

        array(
            'id'       => 'import_link',
            'type'     => 'raw',
            'title'    => __( 'Step 2: Install Demo Data (Make sure to active "Backup & Demo Content" addon)', 'stonex' ),
            'subtitle' => __( 'Import demo data, images, pages, post in one click. ', 'stonex' ),
            'content'  => '<a href="' . admin_url( 'tools.php?page=fw-backups-demo-content' ) . '" class="button button-primary">' . __( 'Import Demo', 'stonex' ) . '</a>',
        ),
    ),
));




/**
 * Modify the favicon URL used by the Customizer.
 *
 * @param string $url The default favicon URL.
 * @return string The modified favicon URL.
 */
function stonex_favicon_url() {

    $stonex = get_option( 'stonex' );
    // Check if the $stonex option exists and the favicon array key is set.
    if ( isset( $stonex['favicon'] ) && isset( $stonex['favicon']['id'] ) && !empty( $stonex['favicon']['id'] ) ) {
        update_option( 'site_icon', $stonex['favicon']['id'] );
    }
}
add_action( 'init', 'stonex_favicon_url' );

function stonex_optimization_loader() {

    $stonex = get_option( 'stonex' );

    if ( !class_exists( 'W3TC\Config' ) || ( !isset( $stonex['enable_theme_optimization'] ) && false == $stonex['enable_theme_optimization'] ) ) {
        return;
    }

    $config = new W3TC\Config();

    $imported = $config->import(
        trailingslashit( get_template_directory() ) . '/w3tc-config.json'
    );

    if ( !$imported ) {
        $error = 'config_import_import';
    }

    // if ( $error ) {
    //     var_dump( $imported );
    //     return;
    // }

    W3TC\Util_Admin::config_save( W3TC\Dispatcher::config(), $config );

}

// add_action( 'redux/options/stonex/saved', 'stonex_optimization_loader' );
// stonex_optimization_loader();