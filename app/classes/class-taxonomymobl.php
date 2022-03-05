<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/26/2019
 * Time: 8:06 PM
 */

class TaxonomyMobl {

	/**
	 * Add custom taxonomies
	 *
	 * Additional custom taxonomies can be defined here
	 * http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	function add_mobl_taxonomies() {
		$labels = array(
			'name' => _x( 'نوع مبل', 'taxonomy general name' ),
			'singular_name' => _x( 'نوع مبل', 'taxonomy singular name' ),
			'search_items' => __( 'جستجو نوع مبل' ),
			'all_items' => __( 'انواع مبل' ),
			'parent_item' => __( 'والد نوع مبل' ),
			'parent_item_colon' => __( 'والد نوع مبل:' ),
			'edit_item' => __( 'ویرایش نوع مبل' ),
			'update_item' => __( 'بروزرسانی نوع مبل' ),
			'add_new_item' => __( 'اضافه کردن نوع مبل جدید' ),
			'new_item_name' => __( 'نوع مبل جدید' ),
			'menu_name' => __( 'نوع مبل' ),
		);
// taxonomy register
		register_taxonomy('mobltype',array('project','onlineproject','sofarepair'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'mobltype' ),
		));

	}

}