<?php

class VersionMetaBox {

	public static function register_project_version_meta_box() {

		add_meta_box( 'project_version_meta_box',
			'Project Version',
			'VersionMetaBox::project_version_content_handler',
			array('project'),
			'side',
			'low'
		);

	}

	public static function project_version_content_handler( $post ) {
		$project_version = get_post_meta( $post->ID, 'project_version', 'true' );
		View::renderfile( 'admin/metabox/project/projectversion', array( 'project_version' => $project_version ) );


	}

	public static function save_project_version( $post_id ) {

		if(isset($_POST['project_version'])){
			update_post_meta($post_id,'project_version',$_POST['project_version']);
		}

	}

}