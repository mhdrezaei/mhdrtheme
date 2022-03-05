<?php

class Sidebar {

	public static function register_main_sidebar() {

		register_sidebar( array(
			'id'           => 'blog_main_sidebar',
			'name'         => 'blog sidebar',
			'describtion'  => 'blog sidebar desc',
			'before_widget' => '<aside class="widget">',
			'after_widget' => '</aside>',
			'before_title' => '<h4>',
			'after_title'  => '</h4>'
		) );

	}

}