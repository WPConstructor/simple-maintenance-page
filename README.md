<h1 align="center">WPConstructor Simple Maintenance Page</h1>
<p align="center"><img src="https://wpconstructor.com/assets/images/logos/github/wpconstructor-simple-maintenance-page.png" alt="Simple Maintenance Page Logo" width="400"></p>

A simple WordPress plugin that displays a maintenance page to non-administrators when maintenance mode is enabled.

## Features

- **Simple maintenance mode:** Enable or disable maintenance mode with a checkbox in the WordPress admin.
- **Administrator access:** Administrators can continue browsing the website normally.
- **Visitor protection:** Visitors who are not logged in see the maintenance page while maintenance mode is enabled.
- **HTTP 503 status:** Returns `503 Service Unavailable` with a `Retry-After` header when displaying the maintenance page.
- **Responsive design:** The maintenance page adapts to mobile and desktop screens.
- **Lightweight:** No external dependencies, JavaScript, or additional CSS files.
- **WordPress settings:** Uses the built-in WordPress Settings API.

## Requirements

- WordPress 5.0 or later
- PHP 7.4 or later

## Installation

### Manual installation

1. Download or clone this repository.
2. Copy the `wpcn-simple-maintenance-page` directory into your WordPress installation's `wp-content/plugins/` directory.
3. Log in to your WordPress admin dashboard.
4. Navigate to **Plugins → Installed Plugins**.
5. Activate **WPConstructor Simple Maintenance Page**.

## Usage

### Enable maintenance mode

1. Navigate to **Settings → Simple Maintenance Page** in your WordPress dashboard.
2. Select **Enable maintenance mode**.
3. Click **Save Changes**.

Maintenance mode is now enabled.

### Disable maintenance mode

1. Navigate to **Settings → Simple Maintenance Page**.
2. Clear the **Enable maintenance mode** checkbox.
3. Click **Save Changes**.

Your website will return to normal operation for visitors.

## Maintenance page

When maintenance mode is enabled, visitors see a simple page displaying:

**We'll Be Back Soon!**

Our website is currently undergoing maintenance. Please check back soon.

The page uses a minimal, responsive design and does not depend on your active WordPress theme.

## Access and behavior

| User or request | Behavior |
|---|---|
| Administrator with the `manage_options` capability | Can browse the website normally |
| Logged-in user without the `manage_options` capability | Sees the maintenance page |
| Logged-out visitor | Sees the maintenance page |
| WordPress admin dashboard | Remains accessible |
| WordPress AJAX requests | Not blocked by the plugin |
| WordPress REST API requests | Not blocked by the plugin |
| WordPress cron requests | Not blocked by the plugin |
| Maintenance mode disabled | Website operates normally |

The maintenance page returns HTTP status `503 Service Unavailable` and includes a `Retry-After: 3600` header to indicate that the service may become available again in approximately one hour.

## Configuration

Maintenance mode is controlled by the WordPress option:

`wpcn_smp_enabled`

The option is enabled when its value is truthy and disabled otherwise.

The settings page is available under **Settings → Simple Maintenance Page** and requires the `manage_options` capability.

## Caching

If your website uses a caching plugin, reverse proxy, or content delivery network (CDN), cached pages may prevent visitors from seeing the maintenance page immediately.

Clear the relevant caches after enabling or disabling maintenance mode if necessary.

## Limitations

- The maintenance page is intentionally simple and does not provide a visual editor.
- The plugin does not block access to the WordPress administration area.
- AJAX, REST API, and cron requests are excluded from maintenance handling.
- Users with the `manage_options` capability can access the frontend normally.
- The plugin does not automatically clear external caches.

## License

WPConstructor Simple Maintenance Page is licensed under the GNU General Public License v3.0 or later (GPL-3.0-or-later).

See the [LICENSE](LICENSE) file for the complete license text.

## Author

**WPConstructor**

Website: https://wpconstructor.com/

## Support

For questions, bug reports, or suggestions, visit the [issues](https://github.com/WPConstructor/simple-maintenance-page/issues) page.