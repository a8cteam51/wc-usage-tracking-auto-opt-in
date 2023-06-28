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

/**
 * Bilmur RUM data collector
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_script( 'bilmur', 'https://s0.wp.com/wp-content/js/bilmur.min.js?m=202215', array(), '1.0.0', true );
	}
);

add_filter(
	'script_loader_tag',
	function( $tag, $handle ) {
		if ( 'bilmur' !== $handle ) {
			return $tag;
		}

		// TODO: Values for provider and service TBD. Here's the placeholder for now.
		return str_replace( ' src', ' data-provider="" data-service="" src', $tag );
	},
	10,
	2
);
