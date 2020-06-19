# Newsletter Consent Fields

This plugin adds some newsletter signup fields at the bottom of the registration form and billing area on the checkout page.

## Exposed filters

This plugin exposes the following filters which can be used throughout WordPress:

* `newsletter_consent_field_checkbox_copy` - Allows someone to change the copy of the consent checkbox.

## Exposed actions

This plugin exposes the following actions:

* `newsletter_consent_fields_handle_submission` - Allows you to hook into the submission process of the forms and apply any functionality you would like.
* `newsletter_consent_field_set_user_registration_source` - Allows you to amend the source text for when a user signs up using the registration form.
* `newsletter_consent_field_set_checkout_source` - Allows you to amend the source text for when a user signs up using the checkout form.

## Used Actions

We are using the following actions for this plugin:

* `woocommerce_register_form` - Used to add the marketing consent checkbox underneath the registration form for the website.
* `woocommerce_after_checkout_billing_form` - Used to add the marketing consent checkbox underneath the billing information on the site.
* `woocommerce_register_post` - Used to fire off a function when the user posts registration data to check newsletter.
* `woocommerce_checkout_order_processed` - Used to fire off a function when the order is processed so we can see if to subscribe them to the newsletter.


## Dependencies

This plugin depends on the following libraries:

* `creode/marketing-signup-mailchimp` - This is used to subscribe people to the newsletter.
