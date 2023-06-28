<?php

defined( 'ABSPATH' ) || exit;

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
