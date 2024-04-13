<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Keystone Base
 */
$stonex_classes = array(
	"stonex-default-hentry",
	"stonex-default-hentry",
	"stonex-blog-wrap"
);
if ( !has_post_thumbnail() ) {
	$stonex_classes[] = "stonex-hentry-without-thumbnail";
} 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($stonex_classes); ?>>
	<div class="entry-media">
		<?php stonex_post_thumbnail(); ?>
		<?php if ( is_sticky() ) : ?>
			<span class="dashicons dashicons-admin-post"></span>
		<?php endif; ?>
	</div>
	<div class="stonex-blog-content stonex-blog-content-2">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title stonex-blog-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title stonex-blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php if( !has_post_thumbnail() && is_sticky() ) :?>
				<span class="dashicons dashicons-admin-post"></span>
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			if ( is_singular() ) :
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'stonex' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					esc_html( get_the_title() )
				) );
			else :
				echo '<p>' . wp_kses_post( get_the_excerpt() ) . '</p>';
			endif;
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stonex' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
