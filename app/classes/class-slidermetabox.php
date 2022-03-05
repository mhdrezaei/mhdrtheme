<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/17/2019
 * Time: 1:02 PM
 */

class SliderMetaBox {

	public static function register_project_slider_meta_box(  ) {

		add_meta_box( 'project_slider_meta_box',
			'گالری تصاویر',
			'SliderMetaBox::project_slider_content_handler',
			array('project','onlineproject','parcheh','sofarepair'),

			'side',
			'low'
		);


	}

	public static function project_slider_content_handler( $post ) {

		$slider_image = get_post_meta( $post->ID, 'slider_images', 'true' );
		View::renderfile( 'admin.metabox.project.slider', array( 'slider_images' => $slider_image ) );


	}

	public static function save_project_slider( $post_id ) {
		if(isset($_POST['sliders']) && count($_POST['sliders']) > 0){
			update_post_meta($post_id,'slider_images', $_POST['sliders']);
		}
	}


}