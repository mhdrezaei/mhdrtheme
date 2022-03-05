<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 8/25/2019
 * Time: 2:48 PM
 */

class Asset {
	public static function css( $file_name ) {
		$file_url = THEME_URL . '/assets/css/' . $file_name;
		echo $file_url;

	}

	public static function js( $file_name ) {
		$file_url = THEME_URL . '/assets/js/' . $file_name;
		echo $file_url;

	}

	public static function image( $file_name ) {
		$file_url = THEME_URL . '/assets/images/' . $file_name;
		echo $file_url;

	}

	public static function vendor( $file_name ) {
		$file_url = THEME_URL . '/assets/vendors/' . $file_name;
		echo $file_url;

	}
}