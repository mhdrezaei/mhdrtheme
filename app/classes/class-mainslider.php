<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/16/2019
 * Time: 11:51 PM
 */

class MainSlider {

	public static function make_slid_post_type( ) {

		$labels = array(
			'name'               => _x( 'اسلاید ها', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'اسلاید', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'اسلاید ها', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'اسلاید', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'اضافه کردن', 'اسلاید', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'اضافه کردن اسلاید', 'your-plugin-textdomain' ),
			'new_item'           => __( 'جدید اسلاید', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'ویرایش اسلاید', 'your-plugin-textdomain' ),
			'view_item'          => __( 'نمایش اسلاید', 'your-plugin-textdomain' ),
			'all_items'          => __( 'همه اسلاید ها', 'your-plugin-textdomain' ),
			'search_items'       => __( 'جستجوی اسلاید ها', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'والد اسلاید ها:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'هیچ اسلایدی یافت نشد.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'هیچ اسلایدی در زباله دان یافت نشد.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'slider' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'slider', $args );
	}


}