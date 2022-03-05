<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 12/22/2019
 * Time: 3:34 PM
 */

class TaxonomyParcheh {

	function add_parcheh_taxonomies() {
		$labels = array(
			'name' => _x( 'نوع پارچه', 'taxonomy general name' ),
			'singular_name' => _x( 'نوع پارچه', 'taxonomy singular name' ),
			'search_items' => __( 'جستجو نوع پارچه' ),
			'all_items' => __( 'انواع پارچه' ),
			'parent_item' => __( 'والد نوع پارچه' ),
			'parent_item_colon' => __( 'والد نوع پارچه:' ),
			'edit_item' => __( 'ویرایش نوع پارچه' ),
			'update_item' => __( 'بروزرسانی نوع پارچه' ),
			'add_new_item' => __( 'اضافه کردن نوع پارچه جدید' ),
			'new_item_name' => __( 'نوع پارچه جدید' ),
			'menu_name' => __( 'نوع پارچه' ),
		);
// taxonomy register
		register_taxonomy('parchehtype','parcheh', array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'parchehtype' ),
		));

	}

}