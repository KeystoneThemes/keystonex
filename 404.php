
<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Keystone Base
 */

get_header();
$stonex = get_option( 'stonex' );
ob_start();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="error-404 not-found">
			<div class="error-content">
				<h1><?php echo esc_html__( '404', 'stonex' ) ?></h1>
				<h2><?php echo esc_html__( 'Page not found', 'stonex' ); ?></h2>
				<p><?php echo esc_html__( 'We’re sorry, the page you have looked for does not exist in our database! Please go to our home page.', 'stonex' ); ?></p>
				<a class="btn btn-primary go-home-btn" href="<?php echo get_home_url(); ?>"><?php echo esc_html__( 'Go Back Home', 'stonex' ); ?> </a>
			</div>
		</section><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
$content = ob_get_clean();
// var_dump( $stonex['404_section'] );
if ( isset( $stonex['404_section'] ) && $stonex['404_section'] ) {
    stonex_page_template_query(  (int) $stonex['404_section'] );
} else {
    echo $content;
}
get_footer();
