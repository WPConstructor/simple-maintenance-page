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
 * Register the plugin settings.
 */
function wpcn_smp_register_settings() {
	register_setting(
		'wpcn_smp_settings_group',
		'wpcn_smp_enabled',
		array(
			'type'              => 'boolean',
			'sanitize_callback' => 'wpcn_smp_sanitize_enabled',
			'default'           => false,
		)
	);

	add_settings_section(
		'wpcn_smp_main_section',
		__( 'Maintenance Mode', 'wpcn-simple-maintenance-page' ),
		'wpcn_smp_section_description',
		'wpcn-simple-maintenance-page'
	);

	add_settings_field(
		'wpcn_smp_enabled',
		__( 'Maintenance Mode', 'wpcn-simple-maintenance-page' ),
		'wpcn_smp_enabled_field',
		'wpcn-simple-maintenance-page',
		'wpcn_smp_main_section'
	);
}
add_action( 'admin_init', 'wpcn_smp_register_settings' );

/**
 * Sanitize the maintenance mode setting.
 *
 * @param mixed $value Submitted setting.
 * @return bool
 */
function wpcn_smp_sanitize_enabled( $value ) {
	return (bool) $value;
}

/**
 * Display the settings section description.
 */
function wpcn_smp_section_description() {
	echo '<p>';
	esc_html_e(
		'Enable maintenance mode to display a maintenance page to visitors who are not administrators.',
		'wpcn-simple-maintenance-page'
	);
	echo '</p>';
}

/**
 * Display the maintenance mode checkbox.
 */
function wpcn_smp_enabled_field() {
	$enabled = (bool) get_option( 'wpcn_smp_enabled', false );
	?>
	<label for="wpcn_smp_enabled">
		<input
			type="checkbox"
			id="wpcn_smp_enabled"
			name="wpcn_smp_enabled"
			value="1"
			<?php checked( $enabled ); ?>
		/>
		<?php
		esc_html_e(
			'Enable maintenance mode',
			'wpcn-simple-maintenance-page'
		);
		?>
	</label>

	<p class="description">
		<?php
		esc_html_e(
			'Administrators can continue using the website normally.',
			'wpcn-simple-maintenance-page'
		);
		?>
	</p>
	<?php
}

/**
 * Register the settings page under Settings.
 */
function wpcn_smp_add_settings_page() {
	add_options_page(
		__( 'Simple Maintenance Page', 'wpcn-simple-maintenance-page' ),
		__( 'Simple Maintenance Page', 'wpcn-simple-maintenance-page' ),
		'manage_options',
		'wpcn-simple-maintenance-page',
		'wpcn_smp_render_settings_page'
	);
}
add_action( 'admin_menu', 'wpcn_smp_add_settings_page' );

/**
 * Render the settings page.
 */
function wpcn_smp_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(
			esc_html__(
				'You do not have permission to access this page.',
				'wpcn-simple-maintenance-page'
			)
		);
	}

	$enabled = (bool) get_option( 'wpcn_smp_enabled', false );
	?>
	<div class="wrap">
		<h1>
			<?php
			esc_html_e(
				'WPConstructor Simple Maintenance Page',
				'wpcn-simple-maintenance-page'
			);
			?>
		</h1>

		<form method="post" action="options.php">
			<?php
			settings_fields( 'wpcn_smp_settings_group' );
			do_settings_sections( 'wpcn-simple-maintenance-page' );
			submit_button();
			?>
		</form>

		<hr />

		<h2>
			<?php
			esc_html_e(
				'Current Status',
				'wpcn-simple-maintenance-page'
			);
			?>
		</h2>

		<?php if ( $enabled ) : ?>
			<p>
				<strong style="color: #b32d2e;">
					<?php
					esc_html_e(
						'Maintenance mode is enabled.',
						'wpcn-simple-maintenance-page'
					);
					?>
				</strong>
			</p>
		<?php else : ?>
			<p>
				<strong style="color: #008a20;">
					<?php
					esc_html_e(
						'Maintenance mode is disabled.',
						'wpcn-simple-maintenance-page'
					);
					?>
				</strong>
			</p>
		<?php endif; ?>
	</div>
	<?php
}
