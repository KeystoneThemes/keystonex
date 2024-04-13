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
if (!has_post_thumbnail()) {
	$stonex_classes[] = "stonex-hentry-without-thumbnail";
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($stonex_classes); ?>>
	<div class="post-single-item search-pge">
		<div class="post-thumbnail">
			<div class="entry-media">
				<?php stonex_post_thumbnail(); ?>
				<?php
				if (is_sticky()) {
					echo '<span class="sticky-text" >' . esc_html__('Sticky', 'stonex') . '</span>';
				}
				?>
			</div>
		</div>
		<div class="stonex-blog-content">
			<header class="entry-header">
				<?php
				
				if (is_singular()) {
					the_title('<h1 class="entry-title stonex-blog-title">', '</h1>');
				}
				else {
					the_title('<h2 class="entry-title stonex-blog-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				}
				?>
				<?php
				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta">
						<?php
						stonex_category();
						stonex_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php endif; 
				echo '<p>' .  wp_kses_post( get_the_excerpt() ) . '</p>';

				?>
			</header><!-- .entry-header -->

			<?php $show_redmore = get_theme_mod('stonex_redmore_show', 'hide');
				if('show' == $show_redmore): ?>
				<?php stonex_read_more(); ?>
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->