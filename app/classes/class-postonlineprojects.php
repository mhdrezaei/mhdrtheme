<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/19/2019
 * Time: 4:55 PM
 */

class PostOnlineProjects {

	public static function make_onlineprojects_post_type( ) {

		$labels = array(
			'name'               => _x( 'پروژه های آنلاین', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'پروژه آنلاین', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'پروژه های آنلاین', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'پروژه آنلاین', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'اضافه کردن', 'پروژه آنلاین', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'اضافه کردن پروژه آنلاین', 'your-plugin-textdomain' ),
			'new_item'           => __( 'جدید پروژه آنلاین', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'ویرایش پروژه آنلاین', 'your-plugin-textdomain' ),
			'view_item'          => __( 'نمایش پروژه آنلاین', 'your-plugin-textdomain' ),
			'all_items'          => __( 'همه پروژه های آنلاین', 'your-plugin-textdomain' ),
			'search_items'       => __( 'جستجوی پروژه های آنلاین', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'والد پروژه های آنلاین:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'هیچ پروژه آنلاینی یافت نشد.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'هیچ پروژه آنلاینی در زباله دان یافت نشد.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'onlineproject' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies' => array('mobltype'),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ,  'post-formats' )
		);

		register_post_type( 'onlineproject', $args );
	}


}