<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Keystone Base
 */
?>
<?php
/**
 * stonex_content_end hook
 *
 * @since 1.0.0
 */
do_action( 'stonex_content_end' );

/**
 * stonex_footer_before hook
 *
 * @since 1.0.0
 */
do_action( 'stonex_footer_before' );

/**
 * stonex_footer_settings hook
 *
 * @since 1.0.0
 */
do_action( 'stonex_footer_settings' );

/**
 * stonex_footer_bottom hook
 *
 * @since 1.0.0
 */
do_action( 'stonex_footer_bottom' );

/**
 * stonex_footer_after hook
 *
 * @since 1.0.0
 */
do_action( 'stonex_footer_after' );

/**
 * stonex_after_page
 * 
 * @since 1.0.0
 */
do_action( 'stonex_after_page' );

wp_footer(); ?>

</body>
</html>
