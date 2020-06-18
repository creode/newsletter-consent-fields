<p class="form-row form-row-wide newsletter-consent">
	<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="newsletter_consent_field" type="checkbox" name="<?php echo sanitize_key( $post_key ); ?>" value="1">
	<label for="newsletter_consent_woocommerce_newsletter" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
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