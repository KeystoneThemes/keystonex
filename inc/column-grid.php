<?php

if ( !function_exists( 'stonex_content_wrap_calc' ) ) {
    /**
     * Keystone Base content wrap classes list
     *
     */
    function stonex_content_wrap_calc( $type_layout ) {
        $wrap_class = array(
            'col-lg-8',
            'col-md-12',
            'col-sm-12',
            'content-area',
        );
        if ( 'no_sidebar' == $type_layout && !is_single() ) {
            $wrap_class = array(
                'col-lg-12',
                'col-md-12',
                'col-sm-12',
                'content-area',
            );
        } elseif ( 'no_sidebar' === $type_layout && is_single() ) {
            $wrap_class = array(
                'col-lg-8',
                'col-md-12',
                'col-sm-12',
                'content-area',
            );
        } elseif ( 'left_sidebar' === $type_layout ) {
            $wrap_class[] = 'order-lg-2';
            $wrap_class[] = 'order-md-2';
        }
        return $wrap_class;
    }
}

if ( !function_exists( 'stonex_column_wrap_calc' ) ) {
    /**
     * Keystone Base clumn wrap  list
     *
     */
    function stonex_column_wrap_calc() {

        $stonex    = get_option( 'stonex' );
        $columns = isset( $stonex['blog_grid'] ) ? $stonex['blog_grid'] : '';

        switch ( $columns ) {
        case 'one-column':
            $gride = 'col-12';
            break;
        case 'two-column':
            $gride = 'col-md-6 col-sm-12';
            break;

        default:
            $gride = 'col-lg-4 col-md-6 col-sm-12';
            break;
        }

        return $gride;
    }
}

if ( !function_exists( 'stonex_content_class' ) ) {
    /**
     * Keystone Base content class init
     */
    function stonex_content_class() {

        $stonex                 = get_option( 'stonex' );
        $archive_sidebar      = isset( $stonex['blog_layout'] ) ? $stonex['blog_layout'] : '';
        $post_default_sidebar = isset( $stonex['single_page_layout'] ) ? $stonex['single_page_layout'] : '';
        $page_default_sidebar = isset( $stonex['blog_layout'] ) ? $stonex['blog_layout'] : '';

        if ( is_single() ) {
            $content_class = stonex_content_wrap_calc( $post_default_sidebar );
        } elseif ( is_page_template( 'template-full.php' ) ) {
            $content_class = stonex_content_wrap_calc( 'no_sidebar' );
        } elseif ( is_page_template( 'template-full-width.php' ) ) {
            $content_class = stonex_content_wrap_calc( 'no_sidebar' );
        } elseif ( is_page() ) {
            $content_class = stonex_content_wrap_calc( $page_default_sidebar );
        } else {
            $content_class = stonex_content_wrap_calc( $archive_sidebar );

        }

        $content_class = apply_filters( 'stonex_content_class', $content_class );

        $content_class = implode( ' ', $content_class );
        return $content_class;
    }
}

if ( !function_exists( 'stonex_sidebar_wrap_calc' ) ) {
    /**
     * Keystone Base sidebar classes list
     */
    function stonex_sidebar_wrap_calc( $type_layout ) {
        $wrap_class = array(
            'col-lg-4',
            'col-md-10',
            'col-sm-12',
            'widget-area',
        );
        if ( 'left_sidebar' === $type_layout ) {
            $wrap_class[] = 'order-lg-1';
            $wrap_class[] = 'order-md-1';
        }
        return $wrap_class;
    }
}

if ( !function_exists( 'stonex_sidebar_class' ) ) {
    /**
     * Keystone Base sidebar class init
     */
    function stonex_sidebar_class() {

        $stonex                 = get_option( 'stonex' );
        $archive_sidebar      = isset( $stonex['blog_layout'] ) ? $stonex['blog_layout'] : '';
        $post_default_sidebar = isset( $stonex['single_page_layout'] ) ? $stonex['single_page_layout'] : '';
        $page_default_sidebar = isset( $stonex['blog_layout'] ) ? $stonex['blog_layout'] : '';

        if ( is_single() ) {
            $sidebar_class = stonex_sidebar_wrap_calc( $post_default_sidebar );
        } elseif ( is_page() ) {
            $sidebar_class = stonex_sidebar_wrap_calc( $page_default_sidebar );
        } else {
            $sidebar_class = stonex_sidebar_wrap_calc( $archive_sidebar );
        }

        $sidebar_class = apply_filters( 'stonex_sidebar_class', $sidebar_class );
        $sidebar_class = implode( ' ', $sidebar_class );
        return $sidebar_class;
    }
}
