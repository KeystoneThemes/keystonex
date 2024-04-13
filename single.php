<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Keystone Base
 */

get_header();
$stonex            = get_option( 'stonex' );
$show_navigation = isset( $stonex['show_post_navigation'] ) ? $stonex['show_post_navigation'] : true;

while ( have_posts() ):
    the_post();

    ob_start();
    ?>

		<div id="primary" class="<?php echo esc_attr( stonex_content_class() ); ?>">
			<main id="main" class="site-main">
			<?php
    get_template_part( 'template-parts/single/post' );

    if ( $show_navigation ) {

        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous post:', 'stonex' ) . '</span> <span class="nav-title">' . ' %title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next post:', 'stonex' ) . '</span> <span class="nav-title">%title ' . '</span>',
            )
        );
    }
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ):
        comments_template();
    endif;

    ?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
    get_sidebar();

    $single_content = ob_get_clean();

    echo apply_filters( 'stonex_single_page_content', $single_content );
endwhile;

get_footer();
