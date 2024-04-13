<?php
// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/* Theme demo data setup */
function keystonex_import_files() {
    if ( !stonekey_tala_check() ) {
        return [];
    }
    $demo_files = get_option( 'stonekey_demo_files', [] );

    return $demo_files;
}
add_filter( 'pt-ocdi/import_files', 'keystonex_import_files' );

function ocdi_after_import( $selected_import ) {
    // all pages
    $all_pages = get_option( 'stonekey_demo_files', [] );

    // if file name equal landing name then set it as front page
    if ( 'Initial Setup' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Landing-01' );

        $blog_page_id = get_page_by_title( 'Blog' );
        update_option( 'page_for_posts', $blog_page_id->ID );

        //Disabling theme setup when it's success..
        update_option( 'keystone_disable_demo_setup', true );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', [
            'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
        ] );
        keystonex_create_demo_menu();
        keystonex_elementor_settings();
    }

    $elem_clear_cache = new \Elementor\Core\Files\Manager();
    $elem_clear_cache->clear_cache();
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );

function keystonex_create_demo_menu() {
    $menuname       = 'Main Menu';
    $bpmenulocation = 'main-menu';
    // Does the menu exist already?
    $menu_exists = wp_get_nav_menu_object( $menuname );

    // If it doesn't exist, let's create it.
    if ( !$menu_exists ) {
        $menu_id = wp_create_nav_menu( $menuname );

        // Set up default BuddyPress links and add them to the menu.
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'   => __( 'Home', 'stonex' ),
            'menu-item-classes' => 'home',
            'menu-item-url'     => home_url( ),
            'menu-item-status'  => 'publish' ) );

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'   => __( 'Blog', 'stonex' ),
            'menu-item-classes' => 'blog',
            'menu-item-url'     => home_url( 'blog' ),
            'menu-item-status'  => 'publish' ) );

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'   => __( 'Contact', 'stonex' ),
            'menu-item-classes' => 'contact',
            'menu-item-url'     => home_url( 'contact' ),
            'menu-item-status'  => 'publish' ) );

        // Grab the theme locations and assign our newly-created menu
        // to the BuddyPress menu location.
        if ( !has_nav_menu( $bpmenulocation ) ) {
            $locations                  = get_theme_mod( 'nav_menu_locations' );
            $locations[$bpmenulocation] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}

function ocdi_plugin_page_setup( $default_settings ) {

    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Sark Demo', 'stonex' );
    $default_settings['menu_title']  = esc_html__( 'Sark Demo', 'stonex' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'keystonex-demo';

    return $default_settings;
}
// add_filter( 'ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );

function keystonex_elementor_settings() {
    $kit_id = get_option( 'elementor_active_kit' );
    // $meta_old = get_post_meta( $kit_id, '_elementor_page_settings' );

    /**
     * To get this json.
     * use this code
     *
     *   var_dump(json_encode($meta_old))
     */

    $settings = json_decode( '[{"system_colors":[{"_id":"stonex_primary","title":"Primary","color":"#432cf3"},{"_id":"stonex_secondary","title":"Secondary","color":"#2ad590"},{"_id":"stonex_accent","title":"Accent","color":"#f82e2e"},{"_id":"stonex_headline","title":"Headline","color":"#0c1523"},{"_id":"stonex_body","title":"Body","color":"#495460"},{"_id":"stonex_dark","title":"Dark Background","color":"#070b18"},{"_id":"stonex_light","title":"Light Background","color":"#f3f7fa"},{"_id":"stonex_white","title":"White Background","color":"#fff"},{"_id":"stonex_neutral_1","title":"Neutral 01","color":"#ffffff"},{"_id":"stonex_neutral_2","title":"Neutral 02","color":"#eaedf0"},{"_id":"stonex_neutral_3","title":"Neutral 03","color":"#cbd2d9"},{"_id":"stonex_neutral_4","title":"Neutral 04","color":"#b8c1cc"},{"_id":"stonex_neutral_5","title":"Neutral 05","color":"#7f8995"},{"_id":"stonex_neutral_6","title":"Neutral 06","color":"#495460"},{"_id":"stonex_neutral_7","title":"Neutral 07","color":"#0c1523"},{"_id":"stonex_success","title":"Success","color":"#26da42"},{"_id":"stonex_warning","title":"Warning","color":"#ffbb29"},{"_id":"stonex_info","title":"Info","color":"#485aff"},{"_id":"stonex_danger","title":"Danger","color":"#ff3131"}],"system_typography":[{"_id":"uicore_primary","title":"Primary","typography_font_family":"General Sans","typography_font_weight":"700","typography_typography":"custom"},{"_id":"uicore_secondary","title":"Secondary","typography_font_family":"General Sans","typography_font_weight":"600","typography_typography":"custom"},{"_id":"uicore_text","title":"Text","typography_font_family":"General Sans","typography_font_weight":"500","typography_typography":"custom"},{"_id":"uicore_accent","title":"Accent","typography_font_family":"General Sans","typography_font_weight":"400","typography_typography":"custom"}],"__globals__":[],"body_typography_typography":"Custom","body_typography_font_family":"General Sans","body_typography_font_weight":"400","body_color":"#495460","body_typography_font_size":{"unit":"px","size":21,"sizes":[]},"body_typography_letter_spacing":{"unit":"px","size":0,"sizes":[]},"body_typography_line_height":{"unit":"px","size":34,"sizes":[]},"h1_typography_typography":"Custom","h1_typography_font_family":"General Sans","h1_color":"#0c1523","h1_typography_font_size":{"unit":"px","size":110,"sizes":[]},"h1_typography_letter_spacing":{"unit":"px","size":-2,"sizes":[]},"h1_typography_line_height":{"unit":"px","size":100,"sizes":[]},"h2_typography_typography":"Custom","h2_typography_font_family":"General Sans","h2_color":"#0c1523","h2_typography_font_size":{"unit":"px","size":80,"sizes":[]},"h2_typography_letter_spacing":{"unit":"px","size":-2,"sizes":[]},"h2_typography_line_height":{"unit":"px","size":80,"sizes":[]},"h3_typography_typography":"Custom","h3_typography_font_family":"General Sans","h3_color":"#0c1523","h3_typography_font_size":{"unit":"px","size":52,"sizes":[]},"h3_typography_letter_spacing":{"unit":"px","size":0,"sizes":[]},"h3_typography_line_height":{"unit":"px","size":52,"sizes":[]},"h4_typography_typography":"Custom","h4_typography_font_family":"General Sans","h4_color":"#0c1523","h4_typography_font_size":{"unit":"px","size":28,"sizes":[]},"h4_typography_letter_spacing":{"unit":"px","size":0,"sizes":[]},"h4_typography_line_height":{"unit":"px","size":36,"sizes":[]},"h5_typography_typography":"Custom","h5_typography_font_family":"General Sans","h5_color":"#0c1523","h5_typography_font_size":{"unit":"px","size":24,"sizes":[]},"h5_typography_letter_spacing":{"unit":"px","size":0,"sizes":[]},"h5_typography_line_height":{"unit":"px","size":34,"sizes":[]},"h6_typography_typography":"Custom","h6_typography_font_family":"General Sans","h6_color":"#0c1523","h6_typography_font_size":{"unit":"px","size":21,"sizes":[]},"h6_typography_letter_spacing":{"unit":"px","size":0,"sizes":[]},"h6_typography_line_height":{"unit":"px","size":34,"sizes":[]},"custom_colors":[],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"KeystoneX","site_description":"A Premium Elementor WordPress Theme","container_width":{"unit":"px","size":1320,"sizes":[]},"page_title_selector":"h1.entry-title","viewport_md":768,"viewport_lg":1025}]', true );

    return update_post_meta( $kit_id, '_elementor_page_settings', $settings[0] );
}
