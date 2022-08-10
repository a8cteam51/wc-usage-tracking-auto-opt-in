<?php
/*
Plugin Name: Usage Tracking Auto-opt-in
Plugin URI: https://github.com/a8cteam51/wc-usage-tracking-auto-opt-in
Description: Automatically opts site into WooCommerce Usage Tracking and Sensei Usage Tracking
Version: 1.0.0
Author: WP Special Projects
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Usage Tracking Auto-opt-in
 */
add_filter(
	'option_woocommerce_allow_tracking',
	function() {
		return 'yes';
	},
	'woocommerce_allow_tracking'
);

/**
 * Sensei Usage Tracking Auto-opt-in
 */
add_filter(
	'option_sensei-settings',
	function( $values ) {
		if ( is_array( $values ) && isset( $values['sensei_usage_tracking_enabled'] ) ) {
			$values['sensei_usage_tracking_enabled'] = true;
		}
		return $values;
	}
);
