<?php
/**
 * Plugin Name: Newsletter Consent Fields
 * Plugin URI: https://www.creode.co.uk
 * Description: This plugin exposes an opt-in form to the registration and checkout forms to collect a customers newsletter consent.
 * Author: Creode
 *
 * @package Newsletter_Consent_Fields
 */

/**
 * Cla
 */
class Newsletter_Consent_Renderer {
	/**
	 * Renders the consent field for newsletters.
	 *
	 * @param string  $field_name The key to use for the form field.
	 * @param string  $text The text to display next to the checkbox.
	 * @param boolean $required Whether the field is required.
	 */
	public static function render_consent_field( $field_name, $text, $required ) {
		require __DIR__ . '/../templates/newsletter-consent-checkbox.php';
	}
}
