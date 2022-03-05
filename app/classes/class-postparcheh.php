<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 12/22/2019
 * Time: 7:03 AM
 */

class PostParcheh {

	public static function make_parcheh_post_type( ) {

		$labels = array(
			'name'               => _x( 'پارچه ها', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'پارچه', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'پارچه ها', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'پارچه', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'اضافه کردن', 'پارچه', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'اضافه کردن پارچه', 'your-plugin-textdomain' ),
			'new_item'           => __( 'جدید پارچه', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'ویرایش پارچه', 'your-plugin-textdomain' ),
			'view_item'          => __( 'نمایش پارچه', 'your-plugin-textdomain' ),
			'all_items'          => __( 'همه پارچه ها', 'your-plugin-textdomain' ),
			'search_items'       => __( 'جستجوی پارچه ها', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'والد پارچه ها:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'هیچ پارچه ای یافت نشد.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'هیچ پارچه ای در زباله دان یافت نشد.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'parcheh' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies' => array('parchehtype'),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' , 'custom-fields', 'post-formats' )
		);

		register_post_type( 'parcheh', $args );
	}

}