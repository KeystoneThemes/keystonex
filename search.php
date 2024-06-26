<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Keystone Base
 */
get_header();
?>
<div id="primary" class="<?php echo esc_attr( stonex_content_class() ); ?>">
	<main id="main" class="site-main">
	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif; ?>
		<div class="row posts-row search-content-area">
		<?php 
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			* Include the Post-Type-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Type name) and that will be used instead.
			*/ ?>
			<div class="<?php echo esc_attr( stonex_column_wrap_calc() ); ?>">
				<?php get_template_part( 'template-parts/content','search' ); ?>
			</div>
<?php
		endwhile;
	    wp_reset_postdata();
		?>
		</div>
		<?php 
		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
