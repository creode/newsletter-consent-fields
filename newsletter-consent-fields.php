<?php
/**
 * Plugin Name: Newsletter Consent Fields
 * Plugin URI: https://www.creode.co.uk
 * Description: This plugin creates newsletter consent fields in certain part of the site.
 * Author: Creode

 * Author URI: https://www.creode.co.uk
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Newsletter_Consent_Fields
 */

use plugins\newsletter_consent_fields\src\Site_Options;

require_once WP_PLUGIN_DIR . '/newsletter-consent-fields/src/class-newsletter-consent-field.php';
require_once WP_PLUGIN_DIR . '/newsletter-consent-fields/src/class-site-options.php';
require_once WP_PLUGIN_DIR . '/newsletter-consent-fields/src/class-newsletter-consent-renderer.php';

new Site_Options();
new Newsletter_Consent_Field();
