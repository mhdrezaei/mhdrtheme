<?php

class TechnologiesMetaBox {

	public static function register_technologies_meta_box(  ) {

		add_meta_box( 'project_technologies_type_meta_box',
			'Technologies :',
			'TechnologiesMetaBox::technologies_content_handler',
			array('project'),
			'side',
			'low'
		);


	}

	public static function technologies_content_handler( $post ) {

		$technologies = get_post_meta( $post->ID, 'technologies', 'true' );
		View::renderfile( 'admin/metabox/project/technologies', array( 'technologies' => $technologies ) );


	}

	public static function save_technologies( $post_id ) {
		if(isset($_POST['technologies']) && ($_POST['technologies'])!=null){
			update_post_meta($post_id,'technologies', $_POST['technologies']);
		}
	}


}