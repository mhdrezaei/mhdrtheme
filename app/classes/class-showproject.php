<?php


class ShowProject {
	const SLIDER_META_KEY = 'slider_images';
	const TYPE_META_KEY = 'type_project';
	const PROGRESS_META_KEY = 'progress_project';
	const DEMOPATH_META_KEY = 'demo_path';
	const PRICE_META_KEY = 'project_version';
	const WOODTYPE_META_KEY = 'technologies';

	public static function type_project( $post_id ) {

		$type_project = get_post_meta( $post_id, self::TYPE_META_KEY, true );
		if ( ( $type_project ) != null ) {
			return $type_project;
		}

	}

	public static function progress_project( $post_id ) {

		$progress_project = get_post_meta( $post_id, self::PROGRESS_META_KEY, true );
		if ( ( $progress_project ) != null ) {
			return $progress_project;
		}

	}

	public static function price_project( $post_id ) {

		$project_price = get_post_meta( $post_id, self::PRICE_META_KEY, true );
		if ( ( $project_price ) != null ) {
			return $project_price;
		}

	}

	public static function technologies( $post_id ) {

		$technologies = get_post_meta( $post_id, self::WOODTYPE_META_KEY, true );
		if ( ( $technologies ) != null ) {
			return $technologies;
		}

	}

	public static function demo_path( $post_id ) {

		$demo_path = get_post_meta( $post_id, self::DEMOPATH_META_KEY, true );
		if ( ( $demo_path ) != null ) {
			return $demo_path;
		}

	}


	public static function get_slider_images( $post_id ) {

		if ( !$post_id ) {
			return 0;
		}
		$slider_images = get_post_meta( $post_id, 'slider_images', true );
		if ( ! empty( $slider_images ) && is_array( $slider_images ) && count( $slider_images ) ) {

			return $slider_images;

		}

		return false;
	}
	function pippin_get_image_id($image_url) {
		global $wpdb;
		$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
		return $attachment[0];
	}
}
