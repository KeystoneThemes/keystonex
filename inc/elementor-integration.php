<?php

$kit_id            = get_option( 'elementor_active_kit' );
$elmentor_new_meta = get_post_meta( $kit_id, '_elementor_page_settings' );
$elmentor_new_meta = [

    'system_colors' => [
        '_id'   => 'primary',
        'name'  => 'Primary',
        'color' => '#00000',
    ],

];

$elmentor_old_meta = get_post_meta( $kit_id, '_elementor_page_settings' );

function stonex_update_globals_from_elementor() {
    $stonex = get_option( 'stonex' );

    $kit_id = get_option( 'elementor_active_kit' );
    //Helper Function => wil return meta array with needed changes

    $meta_old = get_post_meta( $kit_id, '_elementor_page_settings', true );

    if ( !is_wp_error( $meta_old ) && is_array( $meta_old ) ) {
        $meta_new = $meta_old;
    } else {
    }
    $meta_new = [
        'system_colors'     => [],
        'system_typography' => [],
        '__globals__'       => [],
    ];

    $meta_new['system_colors'][0] = [
        '_id'   => 'stonex_primary',
        'title' => 'Primary',
        'color' => $stonex['primary_color']['color'],
    ];
    $meta_new['system_colors'][1] = [
        '_id'   => 'stonex_secondary',
        'title' => 'Secondary',
        'color' => $stonex['secondary_color']['color'],
    ];
    $meta_new['system_colors'][2] = [
        '_id'   => 'stonex_accent',
        'title' => 'Accent',
        'color' => $stonex['accent_color']['color'],
    ];
    $meta_new['system_colors'][3] = [
        '_id'   => 'stonex_headline',
        'title' => 'Headline',
        'color' => $stonex['heading_color']['color'],
    ];

    $meta_new['system_colors'][4] = [
        '_id'   => 'stonex_body',
        'title' => 'Body',
        'color' => $stonex['body_color']['color'],
    ];
    $meta_new['system_colors'][5] = [
        '_id'   => 'stonex_dark',
        'title' => 'Dark Background',
        'color' => $stonex['dark_bg']['color'],
    ];
    $meta_new['system_colors'][6] = [
        '_id'   => 'stonex_light',
        'title' => 'Light Background',
        'color' => $stonex['light_bg']['color'],
    ];
    $meta_new['system_colors'][7] = [
        '_id'   => 'stonex_white',
        'title' => 'White Background',
        'color' => $stonex['white_bg']['color'],
    ];

    // Neutral
    $meta_new['system_colors'][8] = [
        '_id'   => 'stonex_neutral_1',
        'title' => 'Neutral 01',
        'color' => $stonex['neutral_1']['color'],
    ];
    $meta_new['system_colors'][9] = [
        '_id'   => 'stonex_neutral_2',
        'title' => 'Neutral 02',
        'color' => $stonex['neutral_2']['color'],
    ];
    $meta_new['system_colors'][10] = [
        '_id'   => 'stonex_neutral_3',
        'title' => 'Neutral 03',
        'color' => $stonex['neutral_3']['color'],
    ];
    $meta_new['system_colors'][11] = [
        '_id'   => 'stonex_neutral_4',
        'title' => 'Neutral 04',
        'color' => $stonex['neutral_4']['color'],
    ];
    $meta_new['system_colors'][12] = [
        '_id'   => 'stonex_neutral_5',
        'title' => 'Neutral 05',
        'color' => $stonex['neutral_5']['color'],
    ];
    $meta_new['system_colors'][13] = [
        '_id'   => 'stonex_neutral_6',
        'title' => 'Neutral 06',
        'color' => $stonex['neutral_6']['color'],
    ];
    $meta_new['system_colors'][14] = [
        '_id'   => 'stonex_neutral_7',
        'title' => 'Neutral 07',
        'color' => $stonex['neutral_7']['color'],
    ];
 
    // Semantic
    $meta_new['system_colors'][15] = [
        '_id'   => 'stonex_success',
        'title' => 'Success',
        'color' => $stonex['success']['color'],
    ];
    $meta_new['system_colors'][16] = [
        '_id'   => 'stonex_warning',
        'title' => 'Warning',
        'color' => $stonex['warning']['color'],
    ];
    $meta_new['system_colors'][17] = [
        '_id'   => 'stonex_info',
        'title' => 'Info',
        'color' => $stonex['info']['color'],
    ];
    $meta_new['system_colors'][18] = [
        '_id'   => 'stonex_danger',
        'title' => 'Danger',
        'color' => $stonex['danger']['color'],
    ];
    $meta_new['system_typography'][0] = [
        '_id'                    => 'uicore_primary',
        'title'                  => 'Primary',
        'typography_font_family' => $stonex['primary_fonts']['font-family'],
        'typography_font_weight' => ( $stonex['primary_fonts']['font-weight'] === 'regular' ) ? 'normal' : $stonex['primary_fonts']['font-weight'],
        'typography_typography'  => 'custom',
    ];
    $meta_new['system_typography'][1] = [
        '_id'                    => 'uicore_secondary',
        'title'                  => 'Secondary',
        'typography_font_family' => $stonex['secondary_fonts']['font-family'],
        'typography_font_weight' => ( $stonex['secondary_fonts']['font-weight'] === 'regular' ) ? 'normal' : $stonex['secondary_fonts']['font-weight'],
        'typography_typography'  => 'custom',
    ];
    $meta_new['system_typography'][2] = [
        '_id'                    => 'uicore_text',
        'title'                  => 'Text',
        'typography_font_family' => $stonex['text_fonts']['font-family'],
        'typography_font_weight' => ( $stonex['text_fonts']['font-weight'] === 'regular' ) ? 'normal' : $stonex['text_fonts']['font-weight'],
        'typography_typography'  => 'custom',
    ];
    $meta_new['system_typography'][3] = [
        '_id'                    => 'uicore_accent',
        'title'                  => 'Accent',
        'typography_font_family' => $stonex['accent_fonts']['font-family'],
        'typography_font_weight' => ( $stonex['accent_fonts']['font-weight'] === 'regular' ) ? 'normal' : $stonex['accent_fonts']['font-weight'],
        'typography_typography'  => 'custom',
    ];

    // body
    $meta_new['body_typography_typography']     = 'Custom';
    $meta_new['body_typography_font_family']    = trim( $stonex['body_typography']['font-family'] );
    $meta_new['body_typography_font_weight']    = $stonex['body_typography']['font-weight'];
    $meta_new['body_typography_text_transform'] = $stonex['body_typography']['body_typography_typography']['t'];
    $meta_new['body_color']                     = $stonex['body_typography']['color'];
    $meta_new['body_typography_font_size']      = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['body_typography']['font-size'], 'px' ),
    );
   /* $meta_new['body_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['body_typography']['letter-spacing'], 'px' ),
    );
    $meta_new['body_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['body_typography']['line-height'], 'px' ),
    ); */

    // h1
    $meta_new['h1_typography_typography']     = 'Custom';
    $meta_new['h1_typography_font_family']    = trim( $stonex['h1_typography']['font-family'] );
    $meta_new['h1_typography_font_weight']    = $stonex['h1_typography']['font-weight'];
    $meta_new['h1_typography_text_transform'] = $stonex['h1_typography']['h1_typography_typography']['t'];
    $meta_new['h1_color']                     = $stonex['h1_typography']['color'];
    $meta_new['h1_typography_font_size']      = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h1_typography']['font-size'], 'px' ),
    );
   /* $meta_new['h1_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h1_typography']['letter-spacing'], 'px' ),
    );
    $meta_new['h1_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h1_typography']['line-height'], 'px' ),
    ); */

    // h2
    $meta_new['h2_typography_typography']     = 'Custom';
    $meta_new['h2_typography_font_family']    = trim( $stonex['h2_typography']['font-family'] );
    $meta_new['h2_typography_font_weight']    = $stonex['h2_typography']['font-weight'];
    $meta_new['h2_typography_text_transform'] = $stonex['h2_typography']['h2_typography_typography']['t'];
    $meta_new['h2_color']                     = $stonex['h2_typography']['color'];
    $meta_new['h2_typography_font_size']      = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h2_typography']['font-size'], 'px' ),
    );
 /*   $meta_new['h2_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h2_typography']['letter-spacing'], 'px' ),
    );
    $meta_new['h2_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h2_typography']['line-height'], 'px' ),
    ); */

    // h3
    $meta_new['h3_typography_typography']     = 'Custom';
    $meta_new['h3_typography_font_family']    = trim( $stonex['h3_typography']['font-family'] );
    $meta_new['h3_typography_font_weight']    = $stonex['h3_typography']['font-weight'];
    $meta_new['h3_typography_text_transform'] = $stonex['h3_typography']['h3_typography_typography']['t'];
    $meta_new['h3_color']                     = $stonex['h3_typography']['color'];

    $meta_new['h3_typography_font_size'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h3_typography']['font-size'], 'px' ),
    );
 /*   $meta_new['h3_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h3_typography']['letter-spacing'], 'px' ),
    );
    $meta_new['h3_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h3_typography']['line-height'], 'px' ),
    ); */

    // h4
    $meta_new['h4_typography_typography']     = 'Custom';
    $meta_new['h4_typography_font_family']    = trim( $stonex['h4_typography']['font-family'] );
    $meta_new['h4_typography_font_weight']    = $stonex['h4_typography']['font-weight'];
    $meta_new['h4_typography_text_transform'] = $stonex['h4_typography']['h4_typography_typography']['t'];
    $meta_new['h4_color']                     = $stonex['h4_typography']['color'];

    $meta_new['h4_typography_font_size'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h4_typography']['font-size'], 'px' ),
    );
  /*  $meta_new['h4_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h4_typography']['letter-spacing'], 'px' ),
    );
    $meta_new['h4_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h4_typography']['line-height'], 'px' ),
    ); */

    // h5
    $meta_new['h5_typography_typography']     = 'Custom';
    $meta_new['h5_typography_font_family']    = trim( $stonex['h5_typography']['font-family'] );
    $meta_new['h5_typography_font_weight']    = $stonex['h5_typography']['font-weight'];
    $meta_new['h5_typography_text_transform'] = $stonex['h5_typography']['h5_typography_typography']['t'];
    $meta_new['h5_color']                     = $stonex['h5_typography']['color'];

    $meta_new['h5_typography_font_size'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h5_typography']['font-size'], 'px' ),
    );
 /*   $meta_new['h5_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h5_typography']['letter-spacing'], 'px' ),
    );
    $meta_new['h5_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h5_typography']['line-height'], 'px' ),
    ); */

    // h6
    $meta_new['h6_typography_typography']     = 'Custom';
    $meta_new['h6_typography_font_family']    = trim( $stonex['h6_typography']['font-family'] );
    $meta_new['h6_typography_font_weight']    = $stonex['h6_typography']['font-weight'];
    $meta_new['h6_typography_text_transform'] = $stonex['h6_typography']['h6_typography_typography']['t'];
    $meta_new['h6_color']                     = $stonex['h6_typography']['color'];
    $meta_new['h6_typography_font_size']      = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h6_typography']['font-size'], 'px' ),
    );
    $meta_new['h6_typography_letter_spacing'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h6_typography']['letter-spacing'], 'px' ),
    );
 /*   $meta_new['h6_typography_line_height'] = array(
        "unit" => "px",
        "size" => (int) rtrim( $stonex['h6_typography']['line-height'], 'px' ),
    );
    $meta_new['container_width'] = array(
        "unit" => "px",
        "size" => '1320'
    ); */

    $result = update_post_meta( $kit_id, '_elementor_page_settings', $meta_new );

    //update site kit css (will generate the new css with the new globals)
    if ( class_exists( '\Elementor\Plugin' ) ) {

        $elem_clear_cache = new \Elementor\Core\Files\Manager();

        $elem_clear_cache->clear_cache();
    }

    return $result;
}
add_action( 'redux/options/stonex/saved', 'stonex_update_globals_from_elementor' );

$stonex = get_option( 'stonex' );

add_filter( 'elementor/fonts/groups', function ( $font_groups ) {
    $font_groups['stonex_fonts'] = __( 'Keystone Base Fonts', 'stonex' );
    return $font_groups;
} );

add_filter( 'elementor/fonts/additional_fonts', function ( $additional_fonts ) {
    $additional_fonts['Circular Std'] = 'stonex_fonts';
    return $additional_fonts;
} );
