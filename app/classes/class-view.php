<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 9/6/2019
 * Time: 1:32 AM
 */

class View {

	public static function __callStatic( $name, $argument ) {

		switch ( $name ) {
			case 'render':
				self::render_view( $argument[0], $argument[1] );
				break;

			case'renderfile' :
				self::render_view_by_include( $argument[0], $argument[1] );
				break;

		}
	}

	private static function render_view( $view_name, $data = null ) {
		get_template_part( 'views/' . $view_name);
	}

	public static function render_view_by_include( $view_name, $data = null ) {

		$view_name = str_replace( '.', DIRECTORY_SEPARATOR, $view_name );
		$view_file_path = THEME_VIEW.DIRECTORY_SEPARATOR.$view_name.'.php';
		if(is_file($view_file_path) && is_readable($view_file_path)){
			! empty($data) ? extract($data) : null;
			include $view_file_path;
		}


	}
}
