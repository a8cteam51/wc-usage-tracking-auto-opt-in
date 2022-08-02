<?php
/*
Plugin Name: WooCommerce Usage Tracking Auto-opt-in
Plugin URI: https://github.com/a8cteam51/wc-usage-tracking-auto-opt-in
Description: Automatically opts site into WooCommerce Usage Tracking
Version: 1.0.0
Author: WP Special Projects
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Runs any time the download process for a plugin install or update finishes.
function wc_tracking_optin( $upgrader_object, $hook_extra ) {
	$option = 'woocommerce_allow_tracking';
	if ( get_option( $option ) ) {
		update_option( $option, 'yes' );
	}
}
add_action( 'upgrader_process_complete', 'wc_tracking_optin' );
