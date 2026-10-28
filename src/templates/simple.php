<?php
/**
 * Template simple.
 *
 * @version 1.0.0
 * @since 0.1.0
 *
 * @package WPConstructor\SimpleMaintenancePage
 */

?>
<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1"
		/>

		<title>
			<?php
			esc_html_e(
				'Under Maintenance',
				'wpcn-simple-maintenance-page'
			);
			?>
		</title>

		<style>
			body {
				margin: 0;
				padding: 20px;
				min-height: 100vh;
				box-sizing: border-box;
				display: flex;
				align-items: center;
				justify-content: center;
				background: #f5f5f5;
				color: #333;
				font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
					Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif;
				text-align: center;
			}

			.wpcn-smp-container {
				max-width: 560px;
				padding: 40px;
				background: #fff;
				border-radius: 8px;
				box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
			}

			.wpcn-smp-container h1 {
				margin-top: 0;
				margin-bottom: 20px;
				font-size: 30px;
				line-height: 1.3;
			}

			.wpcn-smp-container p {
				margin-bottom: 0;
				color: #666;
				font-size: 17px;
				line-height: 1.7;
			}

			@media (max-width: 480px) {
				.wpcn-smp-container {
					padding: 25px;
				}

				.wpcn-smp-container h1 {
					font-size: 25px;
				}
			}
		</style>
	</head>

	<body>
		<main class="wpcn-smp-container">
			<h1>
				<?php
				esc_html_e(
					'We’ll Be Back Soon!',
					'wpcn-simple-maintenance-page'
				);
				?>
			</h1>

			<p>
				<?php
				esc_html_e(
					'Our website is currently undergoing maintenance. Please check back soon.',
					'wpcn-simple-maintenance-page'
				);
				?>
			</p>
		</main>
	</body>
</html>
