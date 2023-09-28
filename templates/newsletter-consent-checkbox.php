<?php
/**
 * Newsletter Consent Renderer Class.
 *
 * @package Newsletter_Consent_Fields
 */

// phpcs:ignore WordPress.Security.NonceVerification.Missing
$is_checked = isset( $_POST[ $field_name ] ) ? (bool) $_POST[ $field_name ] : false;

?>

<p class="form-row form-row-wide newsletter-consent">
	<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="<?php echo sanitize_key( $field_name ); ?>" type="checkbox" name="<?php echo sanitize_key( $field_name ); ?>" value="1" <?php echo $is_checked ? 'checked' : ''; ?> <?php echo $required ? 'required' : ''; ?> />
	<label for="<?php echo sanitize_key( $field_name ); ?>" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
		<?php

		echo wp_kses(
			$text,
			array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'target' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'span'   => array(
					'class' => array(),
				),
			)
		);
		?>
	</label>
</p>
