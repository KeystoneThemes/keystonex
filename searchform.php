<?php
/**
 * Keystone Base Search Form
 *
 * @package Keystone Base
 * @since 1.0
 * @version 1.0
 */
?>
<form role="search" method="get" class="stonex-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'stonex' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'stonex' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'stonex' ); ?>" />
	</label>
	<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'stonex' ); ?>"><i class="ti-search"></i></button>
</form>
