<?php

/**
 * Page Start
 *
 * @since 1.0.0
 */

if ( !function_exists( 'stonex_page_wrap_start' ) ):
    function stonex_page_wrap_start() {
        $page_attr = array(
            'class' => array( 'site', 'logisitco_page_wrap' ),
            'id'    => 'page',
        );
        $page_attr = apply_filters( 'stonex_page_attr', $page_attr );
        echo '<div ' . stonex_set_attributes( $page_attr ) . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__( 'Skip to content', 'stonex' ) . '</a>';
    }
endif;

/**
 * Page End
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_page_wrap_end' ) ):
    function stonex_page_wrap_end() {
        echo '</div><!-- #page -->';

    }
endif;

/**
 * Page End
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_gdpr' ) ):
    function stonex_gdpr() {
        $stonex = get_option( 'stonex' );
        if ( isset( $stonex['enable_gdpr'] ) && true == $stonex['enable_gdpr'] ) {
            ?>
			            <div class="grt-cookie">
			            <div class="grt-cookies-msg">
			                <p>
			                    <?php printf( '%s', $stonex['gdpr_letter'] )?>
			                </p>
			            </div>
			            <span class="grt-cookie-button"></span>

			            </div>

				<?php
    }
    }
endif;

/**
 * Content wrap start
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_content_start' ) ):
    function stonex_content_start() {
        echo '<div id="content" class="site-content">';
    }
endif;

/**
 * Content wrap end
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_content_end' ) ):
    function stonex_content_end() {
        echo '</div><!-- #content -->';
    }
endif;

/**
 * Content wrap start
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_content_inner_start' ) ):
    function stonex_content_inner_start() {
        $stonex = get_option( 'stonex' );

        if ( is_page_template( "template-full.php" ) || is_page_template( 'elementor_header_footer' ) || is_page_template( 'elementor_canvas' ) || ( is_404() && ( isset( $stonex['404_section'] ) && $stonex['404_section'] ) ) ) {
            return;
        }

        echo '<div class="container">';
        echo '<div class="row blog-content-row justify-content-center">';
    }
endif;

/**
 * Content wrap end
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_content_inner_end' ) ):
    function stonex_content_inner_end() {
        if ( is_page_template( "template-full.php" ) || is_page_template( 'elementor_header_footer' ) || is_page_template( 'elementor_canvas' ) ) {
            return;
        }

        echo '</div> <!-- .container -->';
        echo '</div> <!-- .row -->';
    }
endif;

/**
 * Custom hooks functions are define about general section.
 *
 * @package Keystone Base
 * @since 1.0.0
 */

/**
 * Header banner section start
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_banner_section_start' ) ):
    function stonex_banner_section_start() {
        if ( is_page_template( "template-full.php" ) || is_page_template( "homepage.php" ) || is_page_template( 'elementor_header_footer' ) || is_page_template( 'elementor_canvas' ) ) {
            return;
        }

        global $stonexObj;

        $breadcrumb_attr = apply_filters( 'stonex_breadcrumb_class', $stonexObj->stonex_breadcrumb_bridge() );
    }
endif;

/**
 * Header banner title
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_banner_title' ) ):
    function stonex_banner_title() {
        if ( is_page_template( "template-full.php" ) || is_page_template( 'elementor_header_footer' ) || is_page_template( 'elementor_canvas' ) ) {
            return;
        }

    }
endif;

/**
 * Header banner section end
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_banner_section_end' ) ):
    function stonex_banner_section_end() {
        if ( is_page_template( "template-full.php" ) || is_page_template( 'elementor_header_footer' ) ) {
            return;
        }

        echo '</div>';
        echo '</div>';
        echo '</section><!-- .blog-breadcrumb-->';
    }
endif;

/**
 * Footer section start
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_footer_section_start' ) ):
    function stonex_footer_section_start() {
        echo '<footer id="colophon" class="site-footer stonex-section bg-cloud-burst">';
    }
endif;

/**
 * Footer section widget area
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_footer_section_bottom' ) ):
    function stonex_footer_section_bottom() {
        ?>
				        <div class="stonex-copyright text-center">
				            <?php
    $copyright = get_theme_mod( 'stonex_copyright_text', 'Keystone Base' );
        if ( $copyright ):
            $allowed_html = array(
                'a'      => array(
                    'href'  => array(),
                    'title' => array(),
                ),
                'br'     => array(),
                'em'     => array(),
                'strong' => array(),
            );
            ?>
								                    <p class="stonex-copywright">
								                        <?php echo wp_kses( $copyright, $allowed_html ); ?>
								                    </p>
								                <?php endif;?>
				            </div><!-- .stonex-footer-bottom -->
				        <?php
    }
endif;

/**
 * Footer section widget area
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_footer_section_widgets' ) ):
    function stonex_footer_section_widgets() {
        if ( is_active_sidebar( 'footer-widget-area' ) ):
            $footer_layout = get_theme_mod( 'footer_widget_layout', 'column_four' );
            ?>
								            <div class="stonex-footer-top p-t-b-95 p-sm-t-b-70 stonex-footer-<?php echo esc_attr( $footer_layout ); ?>">
								                <div class="container">
								                    <div class="row">
								                        <?php dynamic_sidebar( 'footer-widget-area' );?>
								                    </div><!-- .row -->
								                </div><!-- .container -->
								            </div>
								            <!--.stonex-footer-top -->
								        <?php
    endif;
    }
endif;

/**
 * stonex Footer Settings
 *
 */
function stonex_footer_settings() {
    if ( defined( 'ELEMENTOR_PRO_VERSION' ) && stonex_is_edit_mode() ) {
        return;
    } else if ( defined( 'STONEX_VERSION' ) ) {
        return;
    } else {
        $check_footer_post = get_posts( ['post_type' => 'stonex_footer'] );
        if ( 0 != count( $check_footer_post ) ) {
            stonex_header_footer_template_query( 'stonex_footer' );
        } else {
            stonex_footer_section_widgets();
            stonex_footer_section_bottom();
        }
    }
}

/**
 * Footer section end
 *
 * @since 1.0.0
 */
if ( !function_exists( 'stonex_footer_section_end' ) ):
    function stonex_footer_section_end() {
        echo '</footer><!-- #colophon-->';
    }
endif;

/**
 * Page Wrapper
 *
 * @since 1.0.0
 */
add_action( 'stonex_before_page', 'stonex_page_wrap_start' );
add_action( 'stonex_after_page', 'stonex_page_wrap_end' );

/**
 * Main content wrapper
 *
 * @since 1.0.0
 */
add_action( 'stonex_content_start', 'stonex_content_start', 10 );
add_action( 'stonex_content_start', 'stonex_content_inner_start', 20 );
add_action( 'stonex_content_end', 'stonex_content_inner_end', 10 );
add_action( 'stonex_content_end', 'stonex_content_end', 20 );

/**
 * Managed functions for Header section hooking
 *
 * @since 1.0.0
 */
add_action( 'stonex_header_section', 'stonex_header_settings', 10 );

/**
 * Managed functions for top banner hook
 *
 * @since 1.0.0
 */
add_action( 'stonex_banner_section', 'stonex_banner_section_start', 10 );
add_action( 'stonex_banner_section', 'stonex_banner_title', 20 );
add_action( 'stonex_banner_section', 'stonex_banner_section_end', 30 );

/**
 * Managed functions for footer area hook
 *
 * @since 1.0.0
 */
add_action( 'stonex_footer_before', 'stonex_footer_section_start' );
add_action( 'stonex_footer_before', 'stonex_footer_settings' );
add_action( 'stonex_footer_after', 'stonex_footer_section_end' );