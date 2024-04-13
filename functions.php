<?php
/**
 * Keystone Base functions.php file
 *
 * @package Keystone Base
 */

/* define( 'STONEX_VERSION', '1.0' ); */
define( 'STONEX_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'STONEX_LIB_DIR', trailingslashit( get_template_directory() ) . 'lib/' );
define( 'STONEX_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );

/**
 * Keystone Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Keystone Base
 */

if ( !function_exists( 'stonex_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function stonex_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Keystone Base, use a find and replace
         * to change 'stonex' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'stonex', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'stonex-featured-thumb', 350, 230, true );

        register_nav_menus(
            array(
                'main-menu' => esc_html__( 'Main Menu', 'stonex' ),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style( array( 'assets/css/editor-style.css', stonex_fonts_url() ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 180,
                'width'       => 40,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        add_theme_support(
            'custom-header',
            array(
                'flex-width'       => true,
                'width'            => 1920,
                'flex-height'      => true,
                'height'           => 200,
                'wp-head-callback' => 'stonex_header_style',
            )
        );

        // add gutenberg color palette support.
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name'  => __( 'shark', 'stonex' ),
                    'slug'  => 'shark',
                    'color' => '#202427',
                ),
                array(
                    'name'  => __( 'coral red', 'stonex' ),
                    'slug'  => 'coral-red',
                    'color' => '#46DEB1',
                ),
                array(
                    'name'  => __( 'aztec', 'stonex' ),
                    'slug'  => 'aztec',
                    'color' => '#22304A',
                ),
                array(
                    'name'  => __( 'very light gray', 'stonex' ),
                    'slug'  => 'very-light-gray',
                    'color' => '#F8F8F8',
                ),
                array(
                    'name'  => __( 'dove gray', 'stonex' ),
                    'slug'  => 'dove-gray',
                    'color' => '#666666',
                ),
                array(
                    'name'  => __( 'manatee', 'stonex' ),
                    'slug'  => 'manatee',
                    'color' => '#9095A0',
                ),
            )
        );

        // Default block styles.
        add_theme_support( 'wp-block-styles' );

        // Responsive embedded content.
        add_theme_support( 'responsive-embeds' );
        // add theme woocommerce support.
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

    }

endif;
add_action( 'after_setup_theme', 'stonex_setup' );

if ( !function_exists( 'stonex_header_style' ) ):
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @since 1.0
     */
    function stonex_header_style() {

        $stonex_header_text_color = get_header_textcolor();

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $stonex_header_text_color ) {
            return;
        }
        // If we get this far, we have custom styles. Let's do this.
        ?>
					<style type="text/css">
						/*<![CDATA[*/
						<?php
    if ( display_header_text() ) {
            ?>
						.stonex-breadcrumb-content-wrap h1.stonex-breadcrumb-title,
						.stonex-breadcrumb-content-wrap h5.post_meta_output {
							color: #<?php echo esc_attr( $stonex_header_text_color ); ?>
						}
							<?php
    }
        ?>
						/*]]>*/
					</style>
					<?php
    }
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stonex_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'stonex_content_width', 640 );
}
add_action( 'after_setup_theme', 'stonex_content_width', 0 );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Keystone Base 1.0
 */
function stonex_block_editor_styles() {
    // Add custom fonts.
    wp_enqueue_style( 'stonex-fonts', stonex_fonts_url(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'enqueue_block_editor_assets', 'stonex_block_editor_styles' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function stonex_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'stonex_skip_link_focus_fix' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require STONEX_INC_DIR . 'template-functions.php';
/**
 * Implement the Custom Header feature.
 */
require STONEX_INC_DIR . 'theme-options.php';
require STONEX_INC_DIR . 'custom-theme-style-script.php';
require STONEX_INC_DIR . 'elementor-integration.php';

/**
 * Implement the Custom Header feature.
 */
require STONEX_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require STONEX_INC_DIR . 'template-tags.php';

/**
 * Functions which enhance the theme by clumn gride
 */
require STONEX_INC_DIR . 'column-grid.php';

/**
 * Customizer additions.
 */
require STONEX_INC_DIR . 'customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require STONEX_INC_DIR . 'jetpack.php';
}

/**
 * Custom files for hook
 */
require STONEX_INC_DIR . 'hooks/general-hooks.php';
require STONEX_INC_DIR . 'hooks/single-hooks.php';

/*
 * Breadcrumb.
 */
require STONEX_INC_DIR . '/class-stonex-breadcrumb.php';

/*
 * TGM.
 */
require STONEX_INC_DIR . 'plugins/class-tgm-plugin-activation.php';
require STONEX_INC_DIR . 'plugins/install-plugins.php';

/**
 *  Demo Setup.
 */
require STONEX_INC_DIR . '/demo-setup.php';
require STONEX_INC_DIR . '/adb.php';


/**
 * Woocommerce additions.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require_once STONEX_INC_DIR . 'woocommerce.php';
}

require_once  trailingslashit( get_template_directory() ). 'updater.php';







