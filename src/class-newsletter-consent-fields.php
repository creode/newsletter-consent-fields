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
 * Main Consent fields class.
 */
class Newsletter_Consent_Fields {
	/**
	 * Key used for form to post newsletter signup status.
	 *
	 * @var string
	 */
	private $post_key = 'newsletter_consent_field';

	/**
	 * Constructor for Newsletter Consent Fields Class.
	 */
	public function __construct() {
		$this->register_actions();
	}

	/**
	 * Registers any WordPress actions required for this plugin to function.
	 */
	public function register_actions() {
		add_action( 'woocommerce_register_form', array( $this, 'add_newsletter_checkbox_field' ), 10 );
		add_action( 'woocommerce_after_checkout_billing_form', array( $this, 'add_newsletter_checkbox_field' ), 10 );

		add_action( 'woocommerce_register_post', array( $this, 'process_newsletter_submission_for_registration_form' ), 10, 3 );
		add_action( 'woocommerce_checkout_order_processed', array( $this, 'process_newsletter_submission_for_checkout_form' ), 'handle_newsletter_submission', 10, 2 );
	}

	/**
	 * Adds checkbox field to certain areas of the site.
	 */
	public function add_newsletter_checkbox_field() {
		$default  = 'I agree to receive occasional updates from ' . get_bloginfo( 'name' ) . ' in line with the <a href="/privacy-policy" target="_blank">Privacy Policy.</a>';
		$copy     = apply_filters( 'newsletter_consent_field_checkbox_copy', $default );
		$post_key = $this->post_key;

		require __DIR__ . '/../templates/newsletter-consent-checkbox.php';
	}

	/**
	 * Processes the newsletter submission on a registration form.
	 *
	 * @param array  $sanitized_user_login User login data.
	 * @param string $user_email Email address of user.
	 * @param array  $reg_errors Registration errors.
	 */
	public function process_newsletter_submission_for_registration_form( $sanitized_user_login, $user_email, $reg_errors ) {
		if ( defined( 'WOOCOMMERCE_CHECKOUT' ) ) {
			return; // Ship checkout.
		}

		$newsletter_source = apply_filters( 'newsletter_consent_field_set_user_registration_source', 'User Registration' );

		$this->handle_newsletter_submission( $user_email, $newsletter_source );
	}

	/**
	 * Process newsletter submissions on the checkout form.
	 *
	 * @param int   $order_id ID of order submitted during checkout.
	 * @param array $posted   Sanitized Data posted on the form.
	 */
	public function process_newsletter_submission_for_checkout_form( $order_id, $posted ) {
		if ( ! isset( $posted['billing_email'] ) ) {
			return;
		}

		$newsletter_source = apply_filters( 'newsletter_consent_field_set_checkout_source', 'Checkout Signup' );

		$this->handle_newsletter_submission( $posted['billing_email'], $newsletter_source );
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
		$subscription_status = isset( $_POST[ $this->post_key ] ) ? (int) $_POST[ $this->post_key ] : 0;
		do_action( 'newsletter_consent_fields_handle_submission', $subscription_status, $email_address, $newsletter_source );
	}
}
