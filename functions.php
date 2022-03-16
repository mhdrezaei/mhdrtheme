<?php
include "constants.php";
include "app/autoloader.php";

// Theme Supports
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support( 'widgets' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "responsive-embeds" );
add_theme_support( "wp-block-styles" );
add_theme_support( "align-wide" );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
add_theme_support( 'custom-logo', array(
	'height'               => 100,
	'width'                => 400,
	'flex-height'          => true,
	'flex-width'           => true,
	'header-text'          => array( 'site-title', 'site-description' ),
	'unlink-homepage-logo' => true,
) );
$args = array(
	'default-color' => 'ffffff',
);
add_theme_support( 'custom-background', $args );
add_editor_style();

// Theme Setup

// contact table

function mhd_create_contact_table(){
	global $wpdb , $table_prefix;
	$table_name = $table_prefix.'contactmhd';
	$charset_collate = $wpdb->get_charset_collate();
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$sql = "CREATE TABLE $table_name (
 id INTEGER NOT NULL AUTO_INCREMENT,
 full_name varchar(250) NOT NULL,
 email varchar(100) NOT NULL,
 subject varchar(250) NOT NULL,
 message TEXT NOT NULL,
 status tinyint(4) NOT NULL,
 created_at datetime NOT NULL,
 PRIMARY KEY (id)
 ) $charset_collate;";
	maybe_create_table( $table_name, $sql );
}
add_action('after_setup_theme','mhd_create_contact_table');



// menus
function mhdr_menus(){
	$arg_menus = array(
		'top-bar-menu' => 'one menu for top bar section',
		'cat-menu' => 'one menu for category menu section',
		'side-cat' => 'one menu for category in sidebar',
		'foot-menu' => 'one menu footer'
	);
	register_nav_menus($arg_menus);
}
add_action('after_setup_theme','mhdr_menus');

// images size
add_image_size('mini-thumbnail','150' , '150',false);
add_image_size('main-thumbnail','227' , '295',false);
add_image_size('post-image','800','500',false);
add_image_size('slider-image','550','550',false);


// Theme enqueue

function mhd_load_assets(){

	if(!is_admin()){
		$security = mhdr_get_option('mhd_captcha_keys');
		wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
		wp_enqueue_style('bootstrap');
		wp_register_style('bootstrap-rtl',get_template_directory_uri().'/css/bootstrap.rtl.min.css');
		wp_enqueue_style('bootstrap-rtl');
		wp_register_style('all-awesome','https://use.fontawesome.com/releases/v5.10.0/css/all.css');
		wp_enqueue_style('all-awesome');
		wp_register_style('bootstrap-tooltip',get_template_directory_uri().'/css/bootstrap-tooltip-custom-class.css');
		wp_enqueue_style('bootstrap-tooltip');
		wp_register_style('slick',get_template_directory_uri().'/css/slick.css');
		wp_enqueue_style('slick');
		wp_register_style('all-style',get_template_directory_uri().'/css/style.css');
		wp_enqueue_style('all-style');
		wp_register_style('responsive',get_template_directory_uri().'/css/responsive.css');
		wp_enqueue_style('responsive');
		wp_register_style('main-style',get_template_directory_uri().'/css/main.css');
		wp_enqueue_style('main-style');
		wp_enqueue_script('jquery');
		wp_enqueue_script('popper',get_template_directory_uri().'/js/popper.min.js','jquery',null,true);
		wp_enqueue_script('bootstrap-tooltip-custom-class',get_template_directory_uri().'/js/bootstrap-tooltip-custom-class.js',array('jquery','popper'),null,true);
		wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js','jquery',null,true);
		wp_enqueue_script('slick',get_template_directory_uri().'/js/slick.js',array('jquery','bootstrap-tooltip-custom-class'),null,true);
		wp_register_script('captcha-keys',get_template_directory_uri().'/js/captcha-keys.js');
		wp_enqueue_script('captcha-keys');
		wp_localize_script('captcha-keys','keys',array(
			'site_key' => $security[0]['mhd_security_key']
		));
		wp_enqueue_script('recaptcha','https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit','',null,true);

		wp_register_script('mhdr',get_template_directory_uri().'/js/mhdr.js','jquery',null,true);
		wp_enqueue_script('mhdr');
		wp_localize_script( 'mhdr', 'data', array(
			'ajax_url'    => admin_url( 'admin-ajax.php' ),
			'spiner' =>  get_template_directory_uri( ).'/images/preloader-small.gif'
		));
	}
	if (!is_home()){
		wp_enqueue_style('sweetalert',get_template_directory_uri().'/css/sweetalert2.min.css');
		wp_enqueue_script('sweetalert',get_template_directory_uri().'/js/sweetalert2.min.js','jquery',null,true);


	}
}

add_action('wp_loaded' ,'mhd_load_assets');


// breadcrumb
function get_breadcrumb() {
	echo '<a href="' . home_url() . '" rel="nofollow"><span><i class="fa fa-home"></span></i></a>';
	if ( is_category() || is_single() ) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		the_category( ' &bull; ' );
		
		if ( is_single() ) {
			echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
			the_title();
		}
		

	}elseif ( is_tag() ) {
		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
		echo '<i class="fas fa-tags"></i>';
		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
		echo single_tag_title('', false);
	}
	
	elseif ( is_page() ) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		echo the_title();

	}
	elseif (is_search()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}


// ********************* post view **************************
function mhd_update_post_view($post_id){
	$view_post = get_post_meta($post_id,'post_view_count',true);
	$view_post++;
	update_post_meta($post_id , 'post_view_count',$view_post);
}
function mhd_get_post_view($post_id) {
	$view_post = get_post_meta( $post_id, 'post_view_count', true );

	return $view_post;
}

// **************** likes ****************************
function count_like_post($post_id){
	if (intval($post_id)) {

		$count_like = get_post_meta( $post_id, 'like_post',true);
		return $count_like;
	}
	return 0;
}
function update_like_post($post_id){
	$count_like = count_like_post($post_id);
	$count_like++;
	$like =update_post_meta($post_id,'like_post',$count_like);
	return $count_like;

}
// ******************* text comment form *********************************
function mhd_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields','mhd_move_comment_field_to_bottom');

function mhd_ajax_comments_scripts() {
	if ( is_single() ) {
		wp_register_script( 'ajax_comment', get_template_directory_uri() . '/js/ajax-comment.js', array( 'jquery' ) );
		wp_localize_script( 'ajax_comment', 'misha_ajax_comment_params', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		) );
		wp_enqueue_script( 'ajax_comment' );
	}
}
add_action( 'wp_enqueue_scripts', 'mhd_ajax_comments_scripts' );

// Custom Next/Previous Page
add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');
/**
 * Add prev and next links to a numbered link list
 */
function wp_link_pages_args_prevnext_add($args)
{
	global $page, $numpages, $more, $pagenow;

	if (!$args['next_or_number'] == 'next_and_number')
		return $args; # exit early

	$args['next_or_number'] = 'number'; # keep numbering for the main part
	if (!$more)
		return $args; # exit early

	if($page-1) # there is a previous page
		$args['before'] .= _wp_link_page($page-1)
		                   . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
		;

	if ($page<$numpages) # there is a next page
		$args['after'] = _wp_link_page($page+1)
		                 . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
		                 . $args['after']
		;

	return $args;
}
// Project Post type

add_action( 'init', 'PostProjects::mhd_make_projects_post_type' );


// Slider metabox

add_action( 'add_meta_boxes', 'SliderMetaBox::register_project_slider_meta_box' );
add_action( 'save_post', 'SliderMetaBox::save_project_slider' );

add_action( 'add_meta_boxes', 'DemoPathMetaBoxes::register_demo_path_meta_box' );
add_action( 'save_post', 'DemoPathMetaBoxes::save_demo_path' );

add_action( 'add_meta_boxes', 'VersionMetaBox::register_project_version_meta_box' );
add_action( 'save_post', 'VersionMetaBox::save_project_version' );

add_action( 'add_meta_boxes', 'TechnologiesMetaBox::register_technologies_meta_box' );
add_action( 'save_post', 'TechnologiesMetaBox::save_technologies' );

add_action( 'add_meta_boxes', 'ProgressProjectMetaBoxes::register_progress_onlineproject_meta_box' );
add_action( 'save_post', 'ProgressProjectMetaBoxes::save_onlineproject_progress' );




// include & require
require_once dirname( __FILE__ ) . '/cmb2/init.php';
require_once dirname( __FILE__ ) . '/options-panel/cmb2-options.php';
require_once dirname( __FILE__ ) . '/options-panel/footer-options.php';
include get_template_directory().'/inc/ajax.php';