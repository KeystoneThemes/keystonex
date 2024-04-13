<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Keystone Base
 */

if ( !is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
$stonex                      = get_option( 'stonex' );
$stonex_archive_sidebar      = isset( $stonex['blog_layout'] ) ? $stonex['blog_layout'] : 'right_sidebar';
$stonex_post_default_sidebar = isset( $stonex['single_page_layout'] ) ? $stonex['single_page_layout'] : 'right_sidebar';
$stonex_page_default_sidebar = isset( $stonex['single_page_layout'] ) ? $stonex['single_page_layout'] : 'right_sidebar';

if ( is_single() ) {
    if ( 'no_sidebar' === $stonex_post_default_sidebar ) {
        return;
    }
} elseif ( is_page() ) {
    if ( 'no_sidebar' === $stonex_page_default_sidebar ) {
        return;
    }
} else {
    if ( 'no_sidebar' === $stonex_archive_sidebar ) {
        return;
    } 
}
?>

<aside id="secondary" class="<?php echo esc_attr( stonex_sidebar_class() ); ?>">
	<div class="stonex-sidebar-wrap">
		<?php
dynamic_sidebar( 'sidebar-1' );
?>
	</div>
</aside><!-- #secondary -->