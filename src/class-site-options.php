<?php

namespace plugins\newsletter_consent_fields\src;

class Site_Options
{
	protected $options = array(
		array(
			'key'       => 'field_6513edb345bb0',
			'label'     => 'Newsletter Consent',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'   => 'field_6513edbf39712',
			'label' => 'Newsletter Opt-In Text',
			'name'  => 'newsletter_opt-in_text',
			'type'  => 'textarea',
		),
	);

	public function __construct()
	{
		$this->add_site_options();
	}

	protected function add_site_options()
	{
		add_filter( 'sipsmith_site_options', function( $site_options ) {
			if( ! isset( $site_options['fields'] ) ) {
				return $site_options;
			}

			$site_options['fields'] = array_merge(
				$site_options['fields'],
				$this->options
			);

			return $site_options;
		} );
	}
}
