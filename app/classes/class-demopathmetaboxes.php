<?php

class DemoPathMetaBoxes {

	public static function register_demo_path_meta_box(  ) {

		add_meta_box( 'project_demo_path_meta_box',
			'Demo Path',
			'DemoPathMetaBoxes::demo_path_content_handler',
			array('project'),
			'side',
			'low'
		);


	}

	public static function demo_path_content_handler( $post ) {

		$demo_path = get_post_meta( $post->ID, 'demo_path', 'true' );
		View::renderfile( 'admin/metabox/project/demopath', array( 'demo_path' => $demo_path ) );


	}

	public static function save_demo_path( $post_id ) {
		if(isset($_POST['demo_path']) && ($_POST['demo_path'])!=null){
			update_post_meta($post_id,'demo_path', $_POST['demo_path']);
		}
	}


}