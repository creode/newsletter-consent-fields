<?php
/**
 * Newsletter Consent Renderer Class.
 *
 * @package Newsletter_Consent_Fields
 */

// phpcs:ignore WordPress.Security.NonceVerification.Missing
$is_checked = isset( $_POST[ $post_key ] ) ? (bool) $_POST[ $post_key ] : false;

?>

<p class="form-row form-row-wide newsletter-consent">
	<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="<?php echo sanitize_key( $post_key ); ?>" type="checkbox" name="<?php echo sanitize_key( $post_key ); ?>" value="1" <?php echo $is_checked ? 'checked' : ''; ?> />
	<label for="<?php echo sanitize_key( $post_key ); ?>" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
		<?php

		echo wp_kses(
			$copy,
			array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'target' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
			)
		);
		?>
	</label>
</p>
