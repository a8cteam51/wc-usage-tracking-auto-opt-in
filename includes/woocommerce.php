<?php

defined( 'ABSPATH' ) || exit;

/**
 * WooCommerce Usage Tracking Auto-opt-in.
 *
 * @since   1.0.0
 * @version 1.0.0
 */
add_filter(
	'option_woocommerce_allow_tracking',
	function() {
		return 'yes';
	}
);
