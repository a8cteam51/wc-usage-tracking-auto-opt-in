<?php

defined( 'ABSPATH' ) || exit;

// Allow disabling tracking via a constant.
if ( defined( 'WPCOMSP_SENSEI_TRACKING' ) && ! WPCOMSP_SENSEI_TRACKING ) {
	return;
}

/**
 * Sensei Usage Tracking Auto-opt-in.
 *
 * @since   1.0.0
 * @version 1.0.0
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
