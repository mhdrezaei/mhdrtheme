<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/26/2019
 * Time: 8:06 PM
 */

class TaxonomyProject {

	/**
	 * Add custom taxonomies
	 *
	 * Additional custom taxonomies can be defined here
	 * http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	public static function add_project_taxonomies() {
		$labels = array(
			'name' => _x( 'نوع پروژه', 'taxonomy general name' ),
			'singular_name' => _x( 'نوع پروژه', 'taxonomy singular name' ),
			'search_items' => __( 'جستجو نوع پروژه' ),
			'all_items' => __( 'انواع پروژه' ),
			'parent_item' => __( 'والد نوع پروژه' ),
			'parent_item_colon' => __( 'والد نوع پروژه:' ),
			'edit_item' => __( 'ویرایش نوع پروژه' ),
			'update_item' => __( 'بروزرسانی نوع پروژه' ),
			'add_new_item' => __( 'اضافه کردن نوع پروژه جدید' ),
			'new_item_name' => __( 'نوع پروژه جدید' ),
			'menu_name' => __( 'نوع پروژه' ),
		);
// taxonomy register
		register_taxonomy('projecttype',array('project'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'projecttype' ),
		));

	}

}