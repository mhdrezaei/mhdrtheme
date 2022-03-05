<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/16/2019
 * Time: 8:34 PM
 */

class Initializer {

	public static function setup(  ) {

		add_theme_support('post-thumbnails');
		add_theme_support( 'title-tag' );
		add_image_size('homepic','330','300','1');
		add_image_size('sample','570','300','1');
		add_image_size('single','670','350','1');

	}

}