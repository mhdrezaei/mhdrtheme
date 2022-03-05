<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/20/2019
 * Time: 11:26 PM
 */

class ProgressProjectMetaBoxes {

	public static function register_progress_onlineproject_meta_box(  ) {

		add_meta_box( 'project_progress_meta_box',
			'Project progress rate',
			'ProgressProjectMetaBoxes::progress_online_project_content_handler',
			'project',
			'side',
			'low'
		);


	}

	public static function progress_online_project_content_handler( $post ) {

		$progress_project = get_post_meta( $post->ID, 'progress_project', 'true' );
		View::renderfile( 'admin/metabox/project/progressproject', array( 'progress_project' => $progress_project ) );


	}

	public static function save_onlineproject_progress( $post_id ) {
		if(isset($_POST['progress_project']) && ($_POST['progress_project'])!=null){
			update_post_meta($post_id,'progress_project', $_POST['progress_project']);
		}
	}


}