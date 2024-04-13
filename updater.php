<?php

define( 'STONEX_UPDATE_TRANSIENT', 'stonex-theme-update' );
define( 'STONEX_THEME_SLUG', 'keystonex' );
add_filter( 'site_transient_update_themes', 'stonex_check_theme_updates' );

function stonex_check_theme_updates( $transient ) {
    // Define constants for better flexibility and reusability

    // Get the current theme's directory name and version
    $theme      = wp_get_theme(STONEX_THEME_SLUG);
    $stylesheet = get_template();
    $version    = $theme->get( 'Version' );

    // Check if the update check has already been performed in the last 12 hours
    $remote = get_transient( STONEX_UPDATE_TRANSIENT . $version );
    if ( false === $remote ) {
        // Connect to the remote server where the update information is stored
        $remote = wp_remote_get(
            'https://api.keystonethemes.com/updates/themes/'. STONEX_THEME_SLUG . '/data.json',
            array(
                'timeout' => 10,
                'headers' => array(
                    'Accept' => 'application/json',
                ),
            )
        );

        // Check for errors and invalid data
        if (
            is_wp_error( $remote ) ||
            200 !== wp_remote_retrieve_response_code( $remote )
        ) {
            error_log( 'Error checking for theme updates: ' . print_r( $remote, true ) );
            return $transient;
        }

        $remote_data = wp_remote_retrieve_body( $remote );
        if ( empty( $remote_data ) ) {
            error_log( 'No data returned while checking for theme updates.' );
            return $transient;
        }

        $remote = json_decode( $remote_data );

        if ( !$remote ) {
            error_log( 'Error decoding JSON response while checking for theme updates.' );
            return $transient;
        }

        // Store the result of the update check for 12 hours
        set_transient( STONEX_UPDATE_TRANSIENT . $version, $remote );
    }

    // Create an array of data to return for each theme
    $data = array(
        'theme'       => $stylesheet,
        'url'         => 'https://keystonethemes.com/demos/wp/keystonex',
        'new_version' => $remote->version,
        'package'     => $remote->download_url,
    );

    // Check if there's a new version available and update the transient accordingly

    if ( version_compare( $version, $remote->version, '<' ) ) {
        if ( !isset( $transient->response ) ) {
            return $transient;
        }
        $transient->response[$stylesheet] = $data;
    } else {
        if ( !isset( $transient->no_Update ) ) {
            return $transient;
        }
        $transient->no_update[$stylesheet] = $data;
    }

    return $transient;
}
