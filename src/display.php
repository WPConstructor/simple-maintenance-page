<?php
/**
 * Settings page for WPConstructor Simple Maintenance Page.
 *
 * Registers the maintenance mode setting, adds the settings page under
 * Settings in the WordPress admin menu, and renders the settings interface.
 *
 * @package WPCN_Simple_Maintenance_Page
 * @since 0.1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die();
}

/**
 * Display the maintenance page to non-administrators.
 */
function wpcn_smp_display_maintenance_page() {
	// Do nothing when maintenance mode is disabled.
	if ( ! get_option( 'wpcn_smp_enabled', false ) ) {
		return;
	}

	// Administrators can access the frontend normally.
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}

	// Do not interfere with admin requests.
	if ( is_admin() ) {
		return;
	}

	// Do not interfere with AJAX, REST API, or cron requests.
	if (
		wp_doing_ajax()
		|| ( defined( 'REST_REQUEST' ) && REST_REQUEST )
		|| wp_doing_cron()
	) {
		return;
	}

	// Return HTTP 503 while maintenance mode is active.
	status_header( 503 );
	header( 'Retry-After: 3600' );
	nocache_headers();
	include __DIR__ . '/templates/simple.php';
	exit;
}
add_action(
	'template_redirect',
	'wpcn_smp_display_maintenance_page',
	0
);
