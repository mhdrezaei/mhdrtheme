<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/19/2019
 * Time: 5:22 PM
 */

class TypeProjectMetaBoxes {

	public static function register_type_onlineproject_meta_box(  ) {

		add_meta_box( 'project_type_meta_box',
			'نوع مبل',
			'TypeProjectMetaBoxes::online_project_content_handler',
			array('project','onlineproject','sofarepair'),
			'side',
			'low'
		);


	}

	public static function online_project_content_handler( $post ) {

		$type_project = get_post_meta( $post->ID, 'type_project', 'true' );
		View::renderfile( 'admin/metabox/project/typeproject', array( 'type_project' => $type_project ) );


	}

	public static function save_onlineproject_type( $post_id ) {
		if(isset($_POST['type_project']) && ($_POST['type_project'])!=null){
			update_post_meta($post_id,'type_project', $_POST['type_project']);
		}
	}


}