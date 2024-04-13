<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Keystone Base
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function stonex_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( is_singular() && has_post_thumbnail() ) {
        $classes[] = 'single-breadcrumb';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    // add a classs when box layout selected.
    $page_layout = get_theme_mod( 'stonex_site_layout', 'fullwidth_layout' );
    if ( 'boxed_layout' === $page_layout ) {
        $classes[] = 'box-layout-page';
    }

    return $classes;
}
add_filter( 'body_class', 'stonex_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function stonex_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'stonex_pingback_header' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stonex_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'stonex' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'stonex' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    if ( class_exists( 'WooCommerce' ) ):
        register_sidebar(
            array(
                'name'          => esc_html__( 'Products Sidebar', 'stonex' ),
                'id'            => 'product-sidebar',
                'description'   => esc_html__( 'Add widgets here.', 'stonex' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    endif;

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Widget Area', 'stonex' ),
            'id'            => 'footer-widget-area',
            'description'   => esc_html__( 'Add widgets here.', 'stonex' ),
            'before_widget' => '<section id="%1$s" class="stonex-footer-widget widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'stonex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stonex_scripts() {
    $stonex = get_option( 'stonex' );
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'stonex-inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'stonex-custom-fonts', get_theme_file_uri( '/assets/css/general-sans.css' ), array(), null );
    // Add Themify icons, used in the main stylesheet.
    wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/vendor/themify-icons/themify-icons.css', array(), wp_get_theme()->get( 'Version' ) );
    // Add Fontawesome icons, used in the main stylesheet.
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.css' ), array(), '4.7.0' );

    wp_enqueue_style( 'select2', get_theme_file_uri( '/assets/css/select2.min.css' ), array(), true );

    // Add Grid styles files.
    wp_enqueue_style( 'stonex-boostrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.2.2', 'all' );
    if ( isset( $stonex['enable_gdpr'] ) && true == $stonex['enable_gdpr'] ) {
        wp_enqueue_style( 'grt-cookies-consent', get_template_directory_uri() . '/assets/css/grt-cookies-consent.css', array(), wp_get_theme()->get( 'Version' ) );
    }
    // Add Theme styles files.
    wp_enqueue_style( 'stonex-style-keystonex', get_template_directory_uri() . '/assets/css/theme-style.css', array(), wp_get_theme()->get( 'Version' ) );
    // Add Dashicons.
    wp_enqueue_style( 'dashicons' );
    // Add Keystone Base main styles files.
    wp_enqueue_style( 'stonex-main', get_template_directory_uri() . '/assets/css/stonex-style.css', array(), wp_get_theme()->get( 'Version' ) );
    // Add Keystone Base mairesponsiven styles files.
    wp_enqueue_style( 'stonex-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css', array(), wp_get_theme()->get( 'Version' ) );
    // Theme stylesheet.
    wp_enqueue_style( 'stonex-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'stonex-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_script( 'stonex-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'stonex-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '5.2.2', true );
    wp_enqueue_script( 'jquery-masonry' );
    wp_enqueue_script( 'stonex-select2', get_theme_file_uri( '/assets/js/select2.min.js' ), array( 'jquery' ), null, true );

    if ( isset( $stonex['enable_gdpr'] ) && true == $stonex['enable_gdpr'] ) {
        wp_enqueue_script( 'grt-cookie-consent', get_theme_file_uri( '/assets/js/grt-cookie-consent.js' ), array( 'jquery' ), null, true );
    }

    wp_enqueue_script( 'stonex-config', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'stonex-touch-navigation', get_template_directory_uri() . '/assets/js/touch-keyboard-navigation.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

    wp_localize_script(
        'stonex-touch-navigation',
        'screenReaderText',
        array(
            'expand'   => __( 'expand child menu', 'stonex' ),
            'collapse' => __( 'collapse child menu', 'stonex' ),
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    $stonex_dynamic_css        = '';
    $stonex_header_background  = get_theme_mod( 'header_background_color' );
    $stonex_single_background  = get_theme_mod( 'single_bg_color', '#ececec' );
    $stonex_opasity_background = get_theme_mod( 'single_bg_opasity_color', '#00000' );
    $stonex_footer_background  = get_theme_mod( 'footer_background_color', '#22304A' );
    $stonex_footer_text        = get_theme_mod( 'footer_text_color', '#FFFFFF' );
    $stonex_footer_anchor      = get_theme_mod( 'footer_anchor_color', '#666666' );

    $stonex_footer_bottom_background = get_theme_mod( 'footer_bottom_background_color', '#22304A' );
    $stonex_footer_bottom_text       = get_theme_mod( 'footer_bottom_text_color', '#666666' );
    $stonex_footer_bottom_anchor     = get_theme_mod( 'footer_bottom_anchor_color', '#fc414a' );

    if ( $stonex_header_background ) {
        $stonex_dynamic_css .= '.blog-breadcrumb { background-color: ' . esc_attr( $stonex_header_background ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_single_background ) {
        $stonex_dynamic_css .= '.single .blog-breadcrumb { background-color: ' . esc_attr( $stonex_single_background ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_single_background ) {
        $stonex_dynamic_css .= '.blog-breadcrumb:after { background-color: ' . esc_attr( $stonex_opasity_background ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_footer_background ) {
        $stonex_dynamic_css .= '#colophon { background-color: ' . esc_attr( $stonex_footer_background ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_footer_text ) {
        $stonex_dynamic_css .= '.stonex-footer-widget, .stonex-footer-widget li, .stonex-footer-widget p, .stonex-footer-widget h3, .stonex-footer-widget h4 { color: ' . esc_attr( $stonex_footer_text ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_footer_anchor ) {
        $stonex_dynamic_css .= '.stonex-footer-widget a { color: ' . esc_attr( $stonex_footer_anchor ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_footer_bottom_background ) {
        $stonex_dynamic_css .= '.stonex-footer-bottom { background-color: ' . esc_attr( $stonex_footer_bottom_background ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_footer_bottom_text ) {
        $stonex_dynamic_css .= '.stonex-footer-bottom p, .stonex-copywright, .stonex-copywright li { color: ' . esc_attr( $stonex_footer_bottom_text ) . ' }';
        $stonex_dynamic_css .= "\n";
    }
    if ( $stonex_footer_bottom_anchor ) {
        $stonex_dynamic_css .= '.stonex-footer-bottom a, .stonex-copywright a, .stonex-copywright li a { color: ' . esc_attr( $stonex_footer_bottom_anchor ) . ' }';
        $stonex_dynamic_css .= "\n";
    }

    $stonex_dynamic_css = stonex_css_strip_whitespace( $stonex_dynamic_css );

    wp_add_inline_style( 'stonex-style', $stonex_dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'stonex_scripts', 5 );

//Admin custom css and js

add_action( 'admin_enqueue_scripts', 'stonex_custom__css_and_js' );

function stonex_custom__css_and_js( $hook ) {
    $theme        = wp_get_theme();
    $options_page = 'dmin.php?page=' . $theme->get( 'Name' );
    $dep_array    = array( 'jquery', 'wp-color-picker', 'select2-js', 'redux-js', 'redux-webfont-js' );

    wp_enqueue_style( 'stonex-inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'stonex-redux', get_template_directory_uri() . '/assets/admin/theme-option.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_dequeue_script( 'redux-field-typography' );
    wp_enqueue_script( 'redux-field-typography', get_theme_file_uri( 'assets/admin/redux-typography.js' ), $dep_array );

}

/**
 * Get minified css and removed space
 *
 * @since 1.0.0
 */
function stonex_css_strip_whitespace( $css ) {
    $replace = array(
        '#/\*.*?\*/#s' => '', // Strip C style comments.
        '#\s\s+#' => ' ', // Strip excess whitespace.
    );
    $search = array_keys( $replace );
    $css    = preg_replace( $search, $replace, $css );

    $replace = array(
        ': ' => ':',
        '; ' => ';',
        ' {' => '{',
        ' }' => '}',
        ', ' => ',',
        '{ ' => '{',
        ';}' => '}', // Strip optional semicolons.
        ",\n" => ',', // Don't wrap multiple selectors.
        "\n}" => '}', // Don't wrap closing braces.
        '} ' => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys( $replace );
    $css    = str_replace( $search, $replace, $css );

    return trim( $css );
}

if ( !function_exists( 'stonex_fonts_url' ) ):

    /**
     * Register Google fonts for Keystone Base.
     *
     * @return string Google fonts URL for the theme.
     * @since 1.0.0
     */

    function stonex_fonts_url() {
        $fonts_url = '';
        $fonts     = array();

        /* translators: If there are characters in your language that are not supported by Inter, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Inter font: on or off', 'stonex' ) ) {
            $fonts[] = 'Inter:300,400,500,600,700,800,900';
        }

        /* translators: If there are characters in your language that are not supported by Inter, translate this to 'off'. Do not translate into your own language. */
        /* if ('off' !== _x('on', 'Saira Condensed font: on or off', 'stonex')) {
        $fonts[] = 'Saira Condensed:400,500,600';
        }
         */
        $fonts = apply_filters( 'stonex_google_fonts', $fonts );

        if ( $fonts ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( 'latin' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Logo wrapper
 *
 * @since 1.0.0
 */
function stonex_logo_wrap() {
    ?>
    <a class="stonex_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' );?>" itemprop="url">
        <?php echo stonex_logo(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    ?>
    </a>
<?php
}

/**
 * Keystone Base Logo.
 *
 * @return string
 * @since 1.0.0
 */
function stonex_logo( $text_logo = true ) {
    if ( get_theme_mod( 'custom_logo' ) ) {
        $logo          = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        $alt_attribute = get_post_meta( get_theme_mod( 'custom_logo' ), '_wp_attachment_image_alt', true );
        if ( empty( $alt_attribute ) ) {
            $alt_attribute = get_bloginfo( 'name' );
        }
        $logo = '<img src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( $alt_attribute ) . '">';
    } else {
        if ( $text_logo ) {
            $logo = '<h2>' . get_bloginfo( 'name' ) . '</h2>';
        } else {
            $logo = '';
        }

    }
    return $logo;
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function stonex_custom_excerpt_length( $length ) {
    if ( is_admin() ) {
        return $length;
    }
    return 25;
}
add_filter( 'excerpt_length', 'stonex_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function stonex_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return '';
}
add_filter( 'excerpt_more', 'stonex_excerpt_more' );

if ( !function_exists( 'stonex_related_posts' ) ) {
    /**
     * Single blog post related posts list
     */
    function stonex_related_posts( $the_post_id ) {

        // Define shared post arguments.
        $related_args = array(
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
            'ignore_sticky_posts'    => 1,
            'orderby'                => 'rand',
            'post_type'              => 'post',
            'post__not_in'           => array( $the_post_id ),
            'posts_per_page'         => 3,
        );
        $related_post_type = get_theme_mod( 'stonex_related_post_from', 'category' );
        // Related by tags.
        if ( $related_post_type == 'tag' ) {
            $tags = wp_get_post_tags( $the_post_id );
            if ( $tags ) {
                $first_tag               = $tags[0]->term_id;
                $related_args['tag__in'] = array( $first_tag );
            }
        } else {
            // Related by categories.
            $cats = wp_get_post_categories( $the_post_id );
            if ( $cats && isset( $cats[0] ) ) {
                $first_tag                    = ( isset( $cats[0]->term_id ) ) ? $cats[0]->term_id : $cats[0];
                $related_args['category__in'] = array( $first_tag );
            }
        }
        return $related_args;
    }
}

if ( !function_exists( 'stonex_set_attributes' ) ) {
    /**
     * Set dynamic attributes
     */
    function stonex_set_attributes( $attributes ) {

        if ( !$attributes ) {
            return;
        }

        $set_attr = array();
        foreach ( $attributes as $key => $attr ) {
            $attr       = (array) $attr;
            $attr       = implode( " ", $attr );
            $set_attr[] = "{$key}='{$attr}'";
        }

        return implode( " ", $set_attr );
    }
}

/**
 * wp_body_open callback for backword Compatibility
 */
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * stonex get archive post type
 *
 */
function stonex_get_archive_post_type() {
    $postname = isset( get_queried_object()->name ) ? get_queried_object()->name : '';
    return is_archive() ? $postname : '';
}
function stonex_is_edit_mode() {
    return isset( $_GET['elementor-preview'] );
}

function stonex_header_settings() {

    if ( defined( 'ELEMENTOR_PRO_VERSION' ) && stonex_is_edit_mode() ) {
        return;
    } else if ( defined( 'STONEX_VERSION' ) ) {
        return;
    } else {
        $stonex = get_option( 'stonex' );

        $check_header_post = get_posts( ['post_type' => 'stonex_header'] );

        if ( 0 != count( $check_header_post ) ) {
            printf( '<header class="site-header stonex-elementor-header">' );
            stonex_header_footer_template_query( 'stonex_header' );
            printf( '</header>' );
        } else {
            get_template_part( 'template-parts/headers/header' );
        }
    }
}

/**
 * Keystone Base Footer Query
 *
 */
function stonex_header_footer_template_query( $post_type, $post_id = '' ) {
    global $post;
    $current_page_id = isset( $post->ID ) ? $post->ID : false;
    // Query for blog posts
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => -1,
    );
    if ( empty( $post_id ) ) {
        $argc['p'] = $post_id;
    }
    $footer_query = new WP_Query( $args );
    if ( $footer_query->have_posts() ):
        while ( $footer_query->have_posts() ):
            $footer_query->the_post();
            $include_on = get_post_meta( get_the_ID(), 'stonex_include_on', true );
            $exclude_on = get_post_meta( get_the_ID(), 'stonex_exclude_on', true );
            var_dump($include_on);
            $excluded   = false;
            $output     = '';
            if ( $exclude_on ) {
                $specific_pages = get_post_meta( get_the_ID(), 'stonex_exclude_pages', true ) ? get_post_meta( get_the_ID(), 'stonex_exclude_pages', true ) : [];
                if ( 'entire_website' == $exclude_on || in_array( $current_page_id, $specific_pages ) ) {
                    $excluded = true;
                }
            }

            if ( !$excluded && $include_on ) {
                $specific_pages = get_post_meta( get_the_ID(), 'stonex_include_pages', true ) ? get_post_meta( get_the_ID(), 'stonex_include_pages', true ) : [];

                if ( 'entire_website' == $include_on || in_array( $current_page_id, $specific_pages ) ) {
                    ob_start();
                    the_content();
                    $content = ob_get_clean();
                    $output  = $content;
                }
            }

            printf( '%s', $output );
        endwhile;
        wp_reset_query();
    endif;
}

/**
 * Displays the site description.
 * @param bool $echo Echo or return the html.
 * @return string The HTML to display.
 */
function stonex_site_description( $echo = true ) {
    $description = get_bloginfo( 'description' );

    if ( !$description ) {
        return;
    }

    $wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

    $html = sprintf( $wrapper, esc_html( $description ) );

    $html = apply_filters( 'stonex_site_description', $html, $description, $wrapper );

    if ( !$echo ) {
        return $html;
    }

    printf( $html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function stonex_set_posts_per_page() {
    $stonex = get_option( 'stonex' );

    return isset( $stonex['posts_per_page'] ) ? update_option( 'posts_per_page', (int) $stonex['posts_per_page'] ) : false;
}

add_action( 'init', 'stonex_set_posts_per_page' );

// Select 404 page by id
function stonex_page_template_query( $post_id ) {
    global $post;
    // Query for blog posts
    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'p'              => $post_id,
    );
    $page_query = new WP_Query( $args );
    if ( $page_query->have_posts() ):
        while ( $page_query->have_posts() ):
            $page_query->the_post();

            ob_start();
            the_content();
            $content = ob_get_clean();
            $output  = $content;

            printf( '%s', $output );
        endwhile;
        wp_reset_query();
    endif;
}

function stonex_preloader() {
    $stonex = get_option( 'stonex' );

    $preloader_image = ( isset( $stonex['preloader_image']['url'] ) && '' != $stonex['preloader_image']['url'] ) ? '<img src="' . $stonex['preloader_image']['url'] . '" alt="' . esc_attr__( 'preloader', 'stonex' ) . '" />' : '';

    $preloader_2 = '
    <div class="stonex-preloader-wrap">
        <div class="stonex-preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        </div>
    </div>
    ';

    $preloader_1 = sprintf( '<div class="stonex-preloader-wrap"><div class="stonex-preloader stonex-preloader-style-1">%s</div></div>', esc_html__( 'loading...', 'stonex' ) );
    if ( isset( $stonex['enable_preloader'] ) ) {

        if ( true == $stonex['enable_preloader'] && isset( $stonex['preloader_style'] ) ) {

            switch ( $stonex['preloader_style'] ) {
            case 'default':
                printf( $preloader_1 );
            case 'style-1':
                printf( $preloader_1 );
                break;
            case 'style-2':
                printf( $preloader_2 );
                break;
            case 'custom':
                printf( ' <div class="stonex-preloader-wrap"><div class="stonex-preloader">%s</div></div>', $preloader_image );
                break;
            }

        }

    } else {
        printf( $preloader_1 );
    }
}