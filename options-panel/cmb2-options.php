<?php
/**
 * This snippet has been updated to reflect the official supporting of options pages by CMB2
 * in version 2.2.5.
 *
 * If you are using the old version of the options-page registration,
 * it is recommended you swtich to this method.
 */
add_action( 'cmb2_admin_init', 'mhdr_register_theme_options_metabox' );

/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function mhdr_register_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'mhdr_option_metabox',
		'title'        => esc_html__( 'Site Options', 'mhdr' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'mhdr_options', // The option key and admin menu page slug.
		// 'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'mhdr' ), // Falls back to 'title' (above).
		// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'mhdr' ), // The text for the options-page save button. Defaults to 'Save'.
	) );

	/*
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */

	$cmb_options->add_field( array(
		'name' => __( 'Site title', 'mhdr' ),
		'desc' => __( 'field description (optional)', 'mhdr' ),
		'id'   => 'mhd_site_title',
		'type' => 'text',
		'default' => 'وب سایت شخصی محمد رضائی',
	) );
	$cmb_options->add_field( array(
		'name' => 'Select Logo',
		'id'   => 'mhd_site_logo_img',
		'type' => 'file',
		'default' => get_template_directory_uri().'/images/brand-logo.png'
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );


	$cmb_options->add_field( array(
		'name'    => __( 'Test Color Picker', 'mhdr' ),
		'desc'    => __( 'field description (optional)', 'mhdr' ),
		'id'      => 'test_colorpicker',
		'type'    => 'colorpicker',
		'default' => '#bada55',
	) );

	// Slider Setting Section
	$cmb_options->add_field( array(
		'name' => 'Slider Setting',
		'desc' => 'Add slides here',
		'type' => 'title',
		'id'   => 'slider_sec'
	) );
	$group_slider_setting = $cmb_options->add_field( array(
		'id'          => 'slider-setting',
		'type'        => 'group',
		'repeatable'  => true, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'Slides {#}', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another slide',
			'remove_button'     => 'Remove slide',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$cmb_options->add_group_field( $group_slider_setting, array(
		'name' => 'slide title',
		'id'   => 'slider_title',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_options->add_group_field( $group_slider_setting, array(
		'name' => 'slider description',
		'id'   => 'slider_description',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_options->add_group_field( $group_slider_setting, array(
		'name' => 'slide link',
		'id'   => 'slider_img_link',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_slider_setting, array(
		'name' => 'slider_image',
		'id'   => 'sliderimg',
		'type' => 'file',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	// +++ End Slider Setting Section +++

	// General introduce sections
	$cmb_options->add_field( array(
		'name' => 'General introduce setting',
		'desc' => 'introduce yourself generaly',
		'type' => 'title',
		'id'   => 'intro_gen_sec'
	) );
	$group_general_introduce = $cmb_options->add_field( array(
		'id'          => 'general_introduce_setting',
		'type'        => 'group',
		'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'introduce generaly section', // since version 1.1.4, {#} gets replaced by row number
			'closed'         => true, // true to have the groups closed by default
		),
	) );
	$cmb_options->add_group_field( $group_general_introduce, array(
		'name' => 'introduce yorself',
		'id'   => 'mhd_introduce_desc',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_general_introduce, array(
		'name' => 'image for inroduce',
		'id'   => 'mhd_intro_generaly_img',
		'type' => 'file',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_general_introduce, array(
		'name' => 'introduce yorself with details',
		'id'   => 'mhd_introduce_desc_details',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_general_introduce, array(
		'name' => 'image for inroduce detail',
		'id'   => 'mhd_intro_detail_img',
		'type' => 'file',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	// +++ End General introduce sections +++

	// Service sections
	$cmb_options->add_field( array(
		'name' => 'Services information',
		'desc' => 'add your services',
		'type' => 'title',
		'id'   => 'mhd_services_section '
	) );
	$group_services_section = $cmb_options->add_field( array(
		'id'          => 'mhd_services_setting',
		'type'        => 'group',
		'repeatable'  => true, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'Service {#}', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another service',
			'remove_button'     => 'Remove service',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );
	$cmb_options->add_group_field( $group_services_section, array(
		'name' => 'title service',
		'id'   => 'mhd_service_title',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_services_section, array(
		'name' => 'service description',
		'id'   => 'mhd_service_desc',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_services_section, array(
		'name' => 'image for service',
		'id'   => 'mhd_service_img',
		'type' => 'file',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	// +++ End Services sections +++
	// Service sections
	$cmb_options->add_field( array(
		'name' => 'Capability information',
		'desc' => 'add your Capability',
		'type' => 'title',
		'id'   => 'mhd_capability_section '
	) );
	$group_capability_section = $cmb_options->add_field( array(
		'id'          => 'mhd_capability_setting',
		'type'        => 'group',
		'repeatable'  => true, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'Capability {#}', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another Capability',
			'remove_button'     => 'Remove Capability',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );
	$cmb_options->add_group_field( $group_capability_section, array(
		'name' => 'title capability',
		'id'   => 'mhd_capability_title',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_capability_section, array(
		'name' => 'capability percent',
		'id'   => 'mhd_percent_capability',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	// Contact information And location Service sections
	$cmb_options->add_field( array(
		'name' => 'Contact information',
		'desc' => 'add your Contact information And location',
		'type' => 'title',
		'id'   => 'mhd_contact_section '
	) );
	$group_contact_section = $cmb_options->add_field( array(
		'id'          => 'mhd_contact_setting',
		'type'        => 'group',
		'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'Contact information', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another Capability',
			'remove_button'     => 'Remove Capability',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );
	$cmb_options->add_group_field( $group_contact_section, array(
		'name' => 'Phone Number',
		'id'   => 'mhd_phone_number',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_contact_section, array(
		'name' => 'Email Address',
		'id'   => 'mhd_email_address',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_contact_section, array(
		'name' => 'Address',
		'id'   => 'mhd_address',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_contact_section, array(
		'name' => 'SRC map location(URL)',
		'id'   => 'mhd_map_location',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	// Google Captcha keys
	$cmb_options->add_field( array(
		'name' => 'Google Captcha keys',
		'desc' => 'add Google Captcha keys',
		'type' => 'title',
		'id'   => 'mhd_captcha_keys_section '
	) );
	$group_captcha_keys = $cmb_options->add_field( array(
		'id'          => 'mhd_captcha_keys',
		'type'        => 'group',
		'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'Google captcha keys', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another Capability',
			'remove_button'     => 'Remove Capability',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );
	$cmb_options->add_group_field( $group_captcha_keys, array(
		'name' => 'Site key',
		'id'   => 'mhd_security_key',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_captcha_keys, array(
		'name' => 'Secret key',
		'id'   => 'mhd_secret_key',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );



}


/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function mhdr_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'mhdr_options', $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'mhdr_options', $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}

