<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 12/23/2019
 * Time: 7:37 AM
 */

class ShowParcheh {
	const SUITABLE_FOR_META_KEY = 'suitable_for' ;
	const PARCHEH_TYPE_META_KEY = 'parcheh_type';

	public static function suitable_for( $post_id ) {

		$suitable_for = get_post_meta( $post_id, self::SUITABLE_FOR_META_KEY, true );
		if ( ( $suitable_for ) != null ) {
			return $suitable_for;
		}

	}

	public static function type_parcheh( $post_id ) {

		$type_parcheh = get_post_meta( $post_id, self::PARCHEH_TYPE_META_KEY, true );
		if ( ( $type_parcheh ) != null ) {
			return $type_parcheh;
		}

	}


}