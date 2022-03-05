<?php

add_action( 'cmb2_admin_init', 'mhdr_register_theme_options_metabox_submenu_footer' );

function mhdr_register_theme_options_metabox_submenu_footer() {
	$cmb_options = new_cmb2_box( array(
		'id'           => 'mhdr_option_metabox_footer',
		'title'        => esc_html__( 'Footer section', 'mhdr' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'mhdr_option_footer_section', // The option key and admin menu page slug.
		// 'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'mhdr' ), // Falls back to 'title' (above).
		'parent_slug'     => 'mhdr_options', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'mhdr' ), // The text for the options-page save button. Defaults to 'Save'.
	) );

	$cmb_options->add_field( array(
		'name' => 'Footer information section',
		'desc' => 'Add footer information here',
		'type' => 'title',
		'id'   => 'slider_sec'
	) );
	$group_footer_information = $cmb_options->add_field( array(
		'id'          => 'mhd_footer_information',
		'type'        => 'group',
		'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'footer information', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another Social Media',
			'remove_button'     => 'Remove Social Media',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );
	$cmb_options->add_group_field( $group_footer_information, array(
		'name' => 'Logo for footer',
		'id'   => 'mhd_footer_logo',
		'type' => 'file',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_footer_information, array(
		'name' => 'description in footer',
		'id'   => 'mhd_footer_desc',
		'type' => 'textarea',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_footer_information, array(
		'name' => 'Copyright text',
		'id'   => 'mhd_footer_copyright',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );



	// Social Media
	$cmb_options->add_field( array(
		'name' => 'Social Setting',
		'desc' => 'Add Social Media here',
		'type' => 'title',
		'id'   => 'social_sec'
	) );
	$group_social_media_setting = $cmb_options->add_field( array(
		'id'          => 'mhd_social-media-setting',
		'type'        => 'group',
		'repeatable'  => true, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => 'Social Media {#}', // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => 'Add Another Social Media',
			'remove_button'     => 'Remove Social Media',
			'sortable'          => true,
			'closed'         => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );
	$cmb_options->add_group_field( $group_social_media_setting, array(
		'name' => 'Social Media name',
		'id'   => 'mhd_social_media_name',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_social_media_setting, array(
		'name' => 'Social Media link',
		'id'   => 'mhd_social_media_link',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_social_media_setting, array(
		'name' => 'Social Media icon',
		'desc'    => '<a href="https://fontawesome.com/v4.7/icons/" target="_blank">click here to find icon class</a>',
		'id'   => 'mhd_social_media_icon',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_options->add_group_field( $group_social_media_setting, array(
		'name'    => 'Social Media Class',
		'id'      => 'mhd_social_media_class',
		'type'    => 'radio_inline',
		'options' => array(
			'tooltip-primary' => 'dark blue',
			'tooltip-info' => 'light blue',
			'tooltip-purple' => 'purple',
			'tooltip-danger' => 'red',
			'tooltip-theme' => 'theme color',
		),
		'tooltip-primary' => 'dark blue',
	) );
}


function mhdr_get_footer_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'mhdr_option_footer_section', $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'mhdr_option_footer_section', $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}