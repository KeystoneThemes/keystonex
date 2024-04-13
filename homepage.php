<?php
/**
* Template Name:    
*/
get_header(); ?>

<?php
// WP_Query arguments
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$stonex_args = [
    'post_type'              => ['post'], 
    'post_status'            => ['publish'],
    'posts_per_page'         => '5',
	'paged' => $paged,
];
 
// The Query
$stonex_query = new WP_Query($stonex_args);
?>
<div id="primary" class="<?php echo esc_attr( stonex_content_class() ); ?>">
	<main id="main" class="site-main">
	<?php
	if ( $stonex_query->have_posts() ) :
		?>
		<div class="row posts-row blog-content-area">
			<?php
				/* Start the Loop */
				while ( $stonex_query->have_posts() ) :
					$stonex_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					?>
						<div class="<?php echo esc_attr( stonex_column_wrap_calc() ); ?>">
						<?php 
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
							<div class="post-single-item">
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
								<div class="post-content">
									<div class="stonex-blog-content stonex-blog-content-2">
										<header class="entry-header">
											<?php
											if ('post' === get_post_type()) :
											?>
												<div class="entry-meta">
													<?php
													stonex_posted_on();~
													stonex_entry_footer();
													?>
												</div><!-- .entry-meta -->
											<?php endif;

											if (is_singular()) :
												the_title('<h1 class="entry-title stonex-blog-title">', '</h1>');
											else :
												the_title('<h2 class="entry-title stonex-blog-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
											endif;
											?>
										</header><!-- .entry-header -->

										<?php stonex_read_more(); ?>
									</div>
								</div>
							</div>

						</article><!-- #post-<?php the_ID(); ?> -->
					</div>
					<?php

				endwhile;  
				?>
				
				<?php wp_reset_query(); ?>
		</div>

		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'stonex' ); ?></h1>
				<div class="nav-links custom">
					<?php $total_pages = $stonex_query->max_num_pages;
					if ($total_pages > 1){
						$current_page = max(1, get_query_var('paged'));
						echo paginate_links(array(
							'base' => get_pagenum_link(1) . '%_%',
							'format' => '/page/%#%',
							'current' => $current_page,
							'total' => $total_pages,
						));
					}  ?>
			</div>
		</nav>

	<?php 
	else :
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
