<?php


class AddParchehMetaBox {

	public static function register_suitable_for_meta_box(  ) {

		add_meta_box( 'project_suitable_for_meta_box',
			'مناسب برای',
			'AddParchehMetaBox::suitable_for_content_handler', 'parcheh',
			'side',
			'low'
		);


	}

	public static function suitable_for_content_handler( $post ) {

		$suitable_for = get_post_meta( $post->ID, 'suitable_for', 'true' );
		View::renderfile( 'admin/metabox/parcheh/suitablefor', array( 'suitable_for' => $suitable_for ) );


	}

	public static function save_suitable_for( $post_id ) {
		if(isset($_POST['suitable_for']) && ($_POST['suitable_for'])!=null){
			update_post_meta($post_id,'suitable_for', $_POST['suitable_for']);
		}
	}

}