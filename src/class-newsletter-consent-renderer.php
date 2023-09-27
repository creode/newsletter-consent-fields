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
	 * @param string $post_key The key to use for the form field.
	 */
	public static function render_consent_field( $post_key ) {
		$copy = 'I agree to receive occasional updates from ' . get_bloginfo( 'name' ) . ' in line with the <a href="/privacy-policy" target="_blank">Privacy Policy.</a>';

		if ( get_option( 'options_newsletter_opt-in_text') ) {
			$copy = get_option( 'options_newsletter_opt-in_text' );
		}

		require __DIR__ . '/../templates/newsletter-consent-checkbox.php';
	}
}
