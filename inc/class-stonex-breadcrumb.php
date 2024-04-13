<?php

namespace STONEX\Inc\Classes;

// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class STONEX_Main {
    public function stonex_breadcrumb_bridge() {
        $stonex = get_option( 'stonex' );

        if ( isset( $stonex['breadcrumb_on'] ) ):
            if ( $stonex['breadcrumb_on'] == true ):
                $this->stonex_get_the_breadcrumbs();
            endif;
        else:
            $this->stonex_get_the_breadcrumbs();
        endif;
    }

    /**
     *
     * Breadcrumb
     * @return breadcrumb
     */
    public function stonex_get_the_breadcrumbs() {
        $stonex = get_option( 'stonex' );

        $blog_column = '';
        if ( is_single() ) {
            $blog_column = 'col-lg-12';
        } else if ( is_home() || is_page() ) {
            $blog_column = 'col-lg-12';
        }

        $blog_heading = isset( $stonex['blog_page_title'] ) ? $stonex['blog_page_title'] : 'Welcome to our blog';

        $title             = $this->stonex_generateBreadCrumbTitle();
        $blog_hero_caption = isset( $stonex['blog_page_subtitle'] ) ? ( $stonex['blog_page_subtitle'] ) : 'Read latest news from our blog & learn new things.';

        global $post;
        $singlw_bgimg = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 'full' ) );

        $custom_single_img = get_theme_mod( 'singel_bg_image', get_template_directory_uri() . '/assets/images/blog-single-bg.png' );
        $stonex_header_bg    = get_header_image();
        $single_img        = '';
        if ( is_home() || is_page() ) {
            if ( $stonex_header_bg == true ) {
                $single_img = $stonex_header_bg;
            }
        } else if ( is_single() ) {
            if ( $custom_single_img == true ) {
                $single_img = $custom_single_img;
            } else if ( $singlw_bgimg ) {
                $single_img = $singlw_bgimg[0];
            }
        }
        $output = '<div class="blog-breadcrumb" style="background-image:url(' . esc_url( $single_img ) . ')" >
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="' . $blog_column . '">';
        $blog_breadcrum = isset( $stonex['show_breadcrumbs'] ) ? $stonex['show_breadcrumbs'] : true;
        $single_breadcrum = isset( $stonex['single_breadcrumbs'] ) ? $stonex['single_breadcrumbs'] : true;
        if ( is_home() && $blog_breadcrum ) {
            $output .= $this->stonex_breadcrumbs();
        } else if ( is_single() && $single_breadcrum ) {
            $output .= $this->stonex_breadcrumbs();
        } 
        else if ( is_archive() ) {
            $output .= $this->stonex_breadcrumbs();
        }else if ( is_page() ) {
            $output .= $this->stonex_breadcrumbs();
        }
        if ( $title !== '' && !is_home() ) {
            $output .= '<h1 class="post__title">' . $title . '</h1>';
        } else if ( is_home() ) {
            $output .= '<h1 class="post__title blog-heading">' . wp_kses_post( $blog_heading, 'stonex' ) . '</h1>';
        }

        if ( is_single() ) {
            ob_start();
            stonex_category();
            stonex_posted_on();
            $s_category = ob_get_clean();

            $excerpt = get_the_excerpt();
            $output .= '<div class="entry-meta">'
                . $s_category .
                '</div>';
        } else if ( is_home() ) {
            $output .= '<p class="post__caption front-page">' . esc_html( $blog_hero_caption ) . '</p>';
        }

        $output .= '
                        </div>
                    </div>
                </div>
			</div>';

        printf( '%s', $output );
    }

    public function stonex_generateBreadCrumbTitle() {
        $stonex = get_option( 'stonex' );

        $title = '';

        if ( is_home() || is_front_page() ) {
            $title = isset( $stonex['bp_title'] ) ? esc_html( $stonex['bp_title'] ) : get_the_title( get_option( 'page_for_posts' ) );
        } elseif ( 'case-study' == stonex_get_archive_post_type() ) {
            $title = isset( $stonex['cs_title'] ) ? esc_html( $stonex['cs_title'] ) : esc_html__( 'Case Study', 'stonex' );
        } elseif ( 'job' == stonex_get_archive_post_type() ) {
            $title = isset( $stonex['job_title'] ) ? esc_html( $stonex['job_title'] ) : esc_html__( ' Current job openings', 'stonex' );
        } elseif ( is_page() ) {
            $title = get_the_title();
        } elseif ( is_single() ) {
            $title = get_the_title();
        } elseif ( class_exists( 'WooCommerce' ) && is_product() ) {
            $title = $shop_link;
        } elseif ( function_exists( 'is_shop' ) && is_shop() ) {
            $title = isset( $stonex['shop_title'] ) ? esc_html( $stonex['shop_title'] ) : esc_html__( 'Our Products', 'stonex' );
        } elseif ( is_archive() ) {
            $title = get_the_archive_title();
        } elseif ( is_search() ) {
            $title = esc_html__( 'Search results for: ', 'stonex' ) . get_search_query();
        }

        return $title;
    }

    public static function stonex_breadcrumbs() {

        $stonex = get_option( 'stonex' );

        $sepOpt = ( isset( $stonex['breadcrumb_sep'] ) ? $stonex['breadcrumb_sep'] : '/' );

        /* === OPTIONS === */
        $text['home']     = esc_html__( 'Home', 'stonex' ); // text for the 'Home' link
        $text['shop']     = esc_html__( 'Shop', 'stonex' ); // text for the 'Shop' link
        $text['category'] = esc_html__( 'Archive by Category "%s"', 'stonex' ); // text for a category page
        $text['search']   = esc_html__( 'Search Results for "%s" Query', 'stonex' ); // text for a search results page
        $text['tag']      = esc_html__( 'Posts Tagged "%s"', 'stonex' ); // text for a tag page
        $text['author']   = esc_html__( 'Articles Posted by %s', 'stonex' ); // text for an author page
        $text['404']      = esc_html__( 'Error 404', 'stonex' ); // text for the 404 page
        $text['page']     = esc_html__( 'Page %s', 'stonex' ); // text 'Page N'
        $text['cpage']    = esc_html__( 'Comment Page %s', 'stonex' ); // text 'Comment Page N'

        $wrap_before    = '<div class="breadcrumbs">'; // the opening wrapper tag
        $wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
        $sep            = $sepOpt; // separator between crumbs
        $sep_before     = '<span class="sep">'; // tag before separator
        $sep_after      = '</span>'; // tag after separator
        $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
        $show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $show_current   = 0; // 1 - show current page title, 0 - don't show
        $before         = '<span class="current">'; // tag before the current crumb
        $after          = '</span>'; // tag after the current crumb
        $output         = '';
        /* === END OF OPTIONS === */

        global $post;
        $home_url = esc_url( home_url( '/' ) );

        $link_before    = '<span >';
        $link_after     = '</span>';
        $link_attr      = '';
        $link_in_before = '<span>';
        $link_in_after  = '</span>';
        $link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
        $frontpage_id   = get_option( 'page_on_front' );

        if ( is_page() ) {
            $parent_id = $post->post_parent;
        }
        $sep       = ' ' . $sep_before . $sep . $sep_after . ' ';
        $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;
        if ( class_exists( 'WooCommerce' ) ) {
            $shop_url  = esc_url( get_permalink( wc_get_page_id( 'shop' ) ) );
            $shop_link = $link_before . '<a href="' . $shop_url . '"' . $link_attr . ' class="shop">' . $link_in_before . $link_in_after . '</a>' . $link_after;
        }
        if ( is_home() && is_front_page() ) {
            if ( $show_on_home ) {
                $output .= $wrap_before . $home_link . $wrap_after;
            } elseif ( is_home() ) {
                $output .= $sep;
                $output .= $before . sprintf( '<a href="%s">%s</a>', get_permalink( get_option( 'page_for_posts' ) ) ) . $after;
            }
        } elseif ( is_home() && !is_front_page() ) {
            $output .= $wrap_before . $home_link;

            if ( is_home() ) {
                $output .= $sep;
                $output .= $before . sprintf( '<a href="%s">%s</a>', get_permalink( get_option( 'page_for_posts' ) ), get_the_title( get_option( 'page_for_posts' ) ) ) . $after;
            }
            $output .= $wrap_after;
        } elseif ( class_exists( 'WooCommerce' ) && is_shop() && !is_front_page() ) {
            $output .= $wrap_before . $home_link;

            if ( is_shop() ) {
                $output .= $sep;
                $output .= $before . sprintf( '<a href="%s">%s</a>', get_permalink( wc_get_page_id( 'shop' ) ), wp_title( false, false ) ) . $after;
            }
            $output .= $wrap_after;
        } elseif ( class_exists( 'WooCommerce' ) && is_cart() ) {
            $output .= $wrap_before . $home_link;
            $output .= $sep;
            $output .= $before . sprintf( '<a href="%s">%s</a>', get_permalink(), wp_title( false, false ) ) . $after;
            $output .= $wrap_after;
        } else if ( class_exists( 'WooCommerce' ) && is_checkout() ) {
            $output .= $wrap_before . $home_link;
            $output .= $sep;
            $output .= $before . sprintf( '<a href="%s">%s</a>', get_permalink(), wp_title( false, false ) ) . $after;
            $output .= $wrap_after;
        } else if ( class_exists( 'WooCommerce' ) && is_account_page() ) {
            $output .= $wrap_before . $home_link;
            $output .= $sep;
            $output .= $before . sprintf( '<a href="%s">%s</a>', get_permalink(), wp_title( false, false ) ) . $after;
            $output .= $wrap_after;

        } else {
            $output .= $wrap_before;
            if ( $show_home_link ) {
                $output .= $home_link;
            }

            if ( is_category() ) {
                $cat = get_category( get_query_var( 'cat' ), false );
                if ( $cat->parent != 0 ) {
                    $cats = get_category_parents( $cat->parent, true, $sep );
                    $cats = preg_replace( "#^(.+)$sep$#", "$1", $cats );
                    $cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats );
                    if ( $show_home_link ) {
                        $output .= $sep;
                    }

                    $output .= $cats;
                }
                if ( get_query_var( 'paged' ) ) {
                    $cat = $cat->cat_ID;
                    $output .= $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ) ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_current ) {
                        $output .= $sep . $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                    }
                }
            } elseif ( is_search() ) {
                if ( have_posts() ) {
                    if ( $show_home_link && $show_current ) {
                        $output .= $sep;
                    }

                    if ( $show_current ) {
                        $output .= $before . sprintf( $text['search'], get_search_query() ) . $after;
                    }
                } else {
                    if ( $show_home_link ) {
                        $output .= $sep;
                    }

                    $output .= $before . sprintf( $text['search'], get_search_query() ) . $after;
                }
            } elseif ( is_day() ) {
                if ( $show_home_link ) {
                    $output .= $sep;
                }

                $output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $sep;
                $output .= sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) );
                if ( $show_current ) {
                    $output .= $sep . $before . get_the_time( 'd' ) . $after;
                }
            } elseif ( is_month() ) {
                if ( $show_home_link ) {
                    $output .= $sep;
                }

                $output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );
                if ( $show_current ) {
                    $output .= $sep . $before . get_the_time( 'F' ) . $after;
                }
            } elseif ( is_year() ) {
                if ( $show_home_link && $show_current ) {
                    $output .= $sep;
                }

                if ( $show_current ) {
                    $output .= $before . get_the_time( 'Y' ) . $after;
                }
            } elseif ( is_single() && !is_attachment() ) {
                if ( $show_home_link ) {
                    $output .= $sep;
                }

                if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug      = $post_type->label;
                    if ( $show_current ) {
                        $output .= $before . get_the_title() . $after;
                    }
                    if ( get_post_type_archive_link( get_post_type() ) ) {

                        $output .= sprintf( '<a href="%s">%s</a>', get_post_type_archive_link( get_post_type() ), $slug );
                    } else {
                        $output .= sprintf( '<span>%s</span>', $slug );
                    }
                } else {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug      = 'post' == get_post_type() ? 'Blog' : $post_type->rewrite;
                    $cat       = get_the_category();
                    if ( $cat ) {
                        $cat  = $cat[0];
                        $cats = get_category_parents( $cat, true, $sep );
                        if ( !$show_current || get_query_var( 'cpage' ) ) {
                            $cats = preg_replace( "#^(.+)$sep$#", "$1", $cats );
                        }
                        $cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats );
                    }
                    $output .= sprintf( '<a href="%s">%s</a>', get_post_type_archive_link( get_post_type() ), $slug );
                    if ( get_query_var( 'cpage' ) ) {
                        $output .= $sep . sprintf( $link, get_permalink(), get_the_title() ) . $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                    } else {
                        if ( $show_current ) {
                            $output .= $before . get_the_title() . $after;
                        }
                    }
                }

                // custom post type
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object( get_post_type() );
                if ( get_query_var( 'paged' ) ) {
                    $output .= $sep . sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_current ) {
                        $output .= $sep . $before . $post_type->label . $after;
                    }
                }
            } elseif ( is_attachment() ) {
                if ( $show_home_link ) {
                    $output .= $sep;
                }

                $parent = get_post( $parent_id );
                $cat    = get_the_category( $parent->ID );
                $cat    = $cat[0];
                if ( $cat ) {
                    $cats = get_category_parents( $cat, true, $sep );
                    $cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats );
                    $output .= $cats;
                }
                printf( $link, get_permalink( $parent ), $parent->post_title );
                if ( $show_current ) {
                    $output .= $sep . $before . get_the_title() . $after;
                }
            } elseif ( is_page() && !$parent_id ) {
                if ( $show_current ) {
                    $output .= $sep . $before . get_the_title() . $after;
                }
            } elseif ( is_page() && $parent_id ) {
                if ( $show_home_link ) {
                    $output .= $sep;
                }

                if ( $parent_id != $frontpage_id ) {
                    $breadcrumbs = array();
                    while ( $parent_id ) {
                        $page = get_page( $parent_id );
                        if ( $parent_id != $frontpage_id ) {
                            $breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
                        }
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse( $breadcrumbs );
                    for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
                        $output .= $breadcrumbs[$i];
                        if ( $i != count( $breadcrumbs ) - 1 ) {
                            $output .= $sep;
                        }
                    }
                }
                if ( $show_current ) {
                    $output .= $sep . $before . get_the_title() . $after;
                }
            } elseif ( is_tag() ) {
                if ( get_query_var( 'paged' ) ) {
                    $tag_id = get_queried_object_id();
                    $tag    = get_tag( $tag_id );
                    $output .= $sep . sprintf( $link, get_tag_link( $tag_id ), $tag->name ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_current ) {
                        $output .= $sep . $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                    }
                }
            } elseif ( is_author() ) {
                global $author;
                $author = get_userdata( $author );
                if ( get_query_var( 'paged' ) ) {
                    if ( $show_home_link ) {
                        $output .= $sep;
                    }

                    $output .= sprintf( $link, get_author_posts_url( $author->ID ), $author->display_name ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
                } else {
                    if ( $show_home_link && $show_current ) {
                        $output .= $sep;
                    }

                    if ( $show_current ) {
                        $output .= $before . sprintf( $text['author'], $author->display_name ) . $after;
                    }
                }
            } elseif ( is_404() ) {
                if ( $show_home_link && $show_current ) {
                    $output = $sep;
                }

                if ( $show_current ) {
                    $output .= $before . $text['404'] . $after;
                }
            } elseif ( has_post_format() && !is_singular() ) {
                if ( $show_home_link ) {
                    $output .= $sep;
                }

                $output .= get_post_format_string( get_post_format() );
            }

            $output .= $wrap_after;
        }
        return $output;
    }
}

$stonexObj = new STONEX_Main;
