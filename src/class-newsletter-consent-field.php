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
 * Main Consent field class.
 */
class Newsletter_Consent_Field {
	/**
	 * Key used for form to post newsletter signup status.
	 *
	 * @var string
	 */
	protected $field_name = 'newsletter_consent_field';

	/**
	 * Determine if consent is required.
	 *
	 * @var boolean
	 */
	protected $required = false;

	/**
	 * Adds checkbox field to certain areas of the site.
	 */
	public function render_newsletter_checkbox_field() {
		Newsletter_Consent_Renderer::render_consent_field( $this->field_name, $this->get_consent_text(), $this->required );
	}

	/**
	 * Gets the consent text for the newsletter.
	 *
	 * @return string The consent text.
	 */
	protected function get_consent_text() {
		$text = 'I agree to receive occasional updates from ' . get_bloginfo( 'name' ) . ' in line with the <a href="/privacy-policy" target="_blank">Privacy Policy.</a>';
		if ( get_option( 'options_newsletter_opt-in_text' ) ) {
			$text = get_option( 'options_newsletter_opt-in_text' );
		}

		return $text;
	}

	/**
	 * Handles the newsletter submission process for all forms.
	 *
	 * @param string $email_address Email address of user who may be subscribing.
	 * @param string $newsletter_source Section of the website where the user checked the consent form.
	 */
	public function handle_newsletter_submission( $email_address, $newsletter_source ) {
		// Ignore PHPCS as this is handled by the woocommerce_register_post action.
		// phpcs:ignore WordPress.Security.NonceVerification.Missing
		$subscription_status = isset( $_POST[ $this->field_name ] ) ? (int) $_POST[ $this->field_name ] : 0;
		do_action( 'newsletter_consent_fields_handle_submission', $subscription_status, $email_address, $newsletter_source );
	}
}
