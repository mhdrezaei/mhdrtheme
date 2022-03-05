<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/16/2019
 * Time: 8:59 PM
 */

class PostProjects {

	public static function mhd_make_projects_post_type( ) {

		$labels = array(
			'name'               => _x( 'Projects', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Project', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Projects', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add new', 'project', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add project', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New project', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit project', 'your-plugin-textdomain' ),
			'view_item'          => __( 'Show project', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All projects', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search projects', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent projects:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No projects found', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No projects found in Trash.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'project' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies' => array('projectstype'),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' , 'trackbacks', 'custom-fields', 'revisions', 'post-formats' )
		);

		register_post_type( 'project', $args );
	}


}