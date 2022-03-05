<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 1/16/2020
 * Time: 6:16 PM
 */

class PostRepairSofa {

	public static function make_sofarepair_post_type( ) {

		$labels = array(
			'name'               => _x( 'مبل های تعمیری', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'مبل تعمیری', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'مبل های تعمیری', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'مبل تعمیری', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'اضافه کردن', 'مبل تعمیری', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'اضافه کردن مبل تعمیری', 'your-plugin-textdomain' ),
			'new_item'           => __( 'جدید مبل تعمیری', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'ویرایش مبل تعمیری', 'your-plugin-textdomain' ),
			'view_item'          => __( 'نمایش مبل تعمیری', 'your-plugin-textdomain' ),
			'all_items'          => __( 'همه مبل های تعمیری', 'your-plugin-textdomain' ),
			'search_items'       => __( 'جستجوی مبل های تعمیری', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'والد مبل های تعمیری:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'هیچ مبل تعمیری ای یافت نشد.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'هیچ مبل تعمیری ای در زباله دان یافت نشد.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'sofarepair' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies' => array('mobltype'),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'sofarepair', $args );
	}



}