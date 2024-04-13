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
    "stonex-blog-wrap",
);
$stonex           = get_option( 'stonex' );
$show_excerpt   = isset( $stonex['show_excerpt'] ) ? $stonex['show_excerpt'] : true;
$show_date      = isset( $stonex['show_date'] ) ? $stonex['show_date'] : true;
$show_category  = isset( $stonex['show_category'] ) ? $stonex['show_category'] : true;
$show_readmore  = isset( $stonex['show_readmore'] ) ? $stonex['show_readmore'] : false;
$stonex_classes[] = isset( $stonex['blog_grid'] ) ? $stonex['blog_grid'] : '';
if ( !has_post_thumbnail() ) {
    $stonex_classes[] = "stonex-hentry-without-thumbnail";
}
?>
<article id="post-<?php the_ID();?>" <?php post_class( $stonex_classes );?>>
	<div class="post-single-item">
		<div class="post-thumbnail">
			<div class="entry-media">
				<?php stonex_post_thumbnail();?>
				<?php
if ( is_sticky() ) {
    echo '<span class="sticky-text" >' . esc_html__( 'Sticky', 'stonex' ) . '</span>';
}
?>
			</div>
		</div>
		<div class="stonex-blog-content">
			<header class="entry-header">
				<?php

if ( is_singular() ) {
    the_title( '<h1 class="entry-title stonex-blog-title">', '</h1>' );
} else {
    the_title( '<h2 class="entry-title stonex-blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
}
?>
				<?php
if ( 'post' === get_post_type() ):
?>
					<div class="entry-meta">
						<?php
if ( $show_category ) {
    stonex_category();
}

if ( $show_date ) {
    stonex_posted_on();
}
?>
					</div><!-- .entry-meta -->
				<?php endif;
if ( $show_excerpt ) {
    echo '<p>' . wp_kses_post( get_the_excerpt() ) . '</p>';
}

?>
			</header><!-- .entry-header -->

			<?php if ( true == $show_readmore ): ?>
	<?php stonex_read_more();?>
			<?php endif;?>
		</div>
	</div>
</article><!-- #post-<?php the_ID();?> -->