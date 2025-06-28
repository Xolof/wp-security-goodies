<?php
/**
 * Plugin Name:     WP Security Goodies
 * Plugin URI:      https://github.com/xolof/wp-security-goodies
 * Description:     Some fixes to improve the security of your WordPress site.
 * Author:          Olof Johansson
 * Author URI:      https://oljo.online
 * Text Domain:     wsg
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wp_security_goodies
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Disable XML-RPC
 *
 * This filter disables the XML-RPC functionality in WordPress.
 * It is a common security measure to prevent brute force attacks
 * and other vulnerabilities associated with XML-RPC.
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Disable REST API for non-logged-in users
 */
add_filter( 'rest_authentication_errors', function( $result ) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});

