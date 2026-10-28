<?php
/**
 * Plugin Name: WPConstructor Simple Maintenance Page
 * Description: Displays a simple maintenance page to non-administrators when maintenance mode is enabled.
 * Version: 0.1.0
 * Author: WPConstructor
 * Author URI: https://wpconstructor.com/
 * License: GPL-3.0-or-later
 * Text Domain: wpcn-simple-maintenance-page
 *
 * @package WPConstructor\SimpleMaintenancePage
 */

if ( ! defined( 'WPINC' ) ) {
	die();
}

if ( is_admin() ) {
	require_once __DIR__ . '/src/settings.php';
}

require_once __DIR__ . '/src/display.php';
