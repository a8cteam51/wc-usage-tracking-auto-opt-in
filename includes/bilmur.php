<?php

defined( 'ABSPATH' ) || exit;

// Only load if the constant is defined and true.
if ( ! defined( 'WPCOMSP_BILMUR_TRACKING' ) || ! WPCOMSP_BILMUR_TRACKING ) {
	return;
}

/**
 * Bilmur RUM data collector
 */
add_action(
	'wp_enqueue_scripts',
	static function() {
		wp_enqueue_script( 'wpcomsp-bilmur', 'https://s0.wp.com/wp-content/js/bilmur.min.js?m=202215', array(), '1.0.0', true );
	}
);

add_filter(
	'script_loader_tag',
	function( $tag, $handle ) {
		if ( 'wpcomsp-bilmur' !== $handle ) {
			return $tag;
		}

		// TODO: Values for provider and service TBD. Here's the placeholder for now.
		return str_replace( ' src', ' data-provider="" data-service="" src', $tag );
	},
	10,
	2
);
