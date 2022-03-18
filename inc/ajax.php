<?php
function mhd_like_post() {
	$post_id = intval( $_POST['post_id'] );
	if ( intval( $post_id ) ) {
		$likes = update_like_post( $post_id );
		if ( $likes ) {
			$result = array( 'success' => true, 'count' => $likes );
			setcookie( 'postlike-' . $post_id, 1, time() + ( 7 * 86400 ), '/' );
		} else {
			$result = array( 'success' => false, 'count' => 0 );
		}
		wp_die( json_encode( $result ) );
	}
}
add_action( 'wp_ajax_like_post', 'mhd_like_post' );
add_action( 'wp_ajax_nopriv_like_post', 'mhd_like_post' );


// custom search

add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

	$keyword =  esc_attr( $_POST['keyword'] );

	if($keyword == ''){
		?>
		<p class="search__not-found">موردی یافت نشد</p>
		<?php
		die();
	}
    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); 
            $result = array(
			'title'   => get_the_title(),
			'link' => get_the_permalink()
		);
		wp_send_json( $result );
		?>
          

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}

function mhd_contact_form() {
	wp_verify_nonce( 'ajax_req', 'nonce' );
	$full_name       = sanitize_text_field( $_POST['fullname'] );
	$email           = sanitize_text_field( $_POST['email'] );
	$subject         = sanitize_text_field( $_POST['subject'] );
	$message         = sanitize_text_field( $_POST['message'] );
	$mywy_options    = mhdr_get_option( 'mhd_captcha_keys' );
	$secret          = $mywy_options[0]['mhd_secret_key'];
	$response        = $_POST["captcha"];
	$verify          = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}" );
	$captcha_success = json_decode( $verify );
	if ( empty( $full_name ) || empty( $email ) || empty( $message ) || empty( $response ) ) {
		$result = array(
			'error'   => true,
			'message' => __( 'All fields marked with star(*) are required !!!', 'myway' )
		);
		wp_send_json( $result );
	} elseif ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		$result = array(
			'error'   => true,
			'message' => __( 'Please enter a valid email address !!!', 'myway' )
		);
		wp_send_json( $result );
	} elseif ( $captcha_success->success == false ) {
		$result = array(
			'error'   => true,
			'message' => __( 'reCaptcha is Expired please wait!!', 'myway' )
		);
		wp_send_json( $result );
	} else {

		global $wpdb, $table_prefix;
		$data = array(
			'full_name'  => $full_name,
			'email'      => $email,
			'subject'    => $subject,
			'message'    => $message,
			'created_at' => date( 'Y-m-d H:i:s' ),
			'status'     => 0
		);
		$send = $wpdb->insert( $table_prefix . 'contactmhd', $data, array( '%s', '%s', '%s', '%s', '%s', '%d' ) );
      $admin_mail = get_bloginfo('admin_email');
          $headers = "From: " .$email."\r\n";
         wp_mail( $admin_mail, $subject, $message ,$headers );
		if ( ! is_wp_error( $send ) ) {
			$result = array(
				'success' => true,
				'message' => __( 'Your message has been successfully sent !', 'mhdrtheme' )

			);
			wp_send_json( $result );          
		} else {
			$result = array(
				'error'   => true,
				'message' => __( 'somthing is wrong!!', 'myway' )
			);
			wp_send_json( $result );
		}
	}
}






add_action( 'wp_ajax_mhd_contact_form', 'mhd_contact_form' );
add_action( 'wp_ajax_nopriv_mhd_contact_form', 'mhd_contact_form' );



function mhd_submit_ajax_comment() {
	$mywy_options    = mhdr_get_option( 'mhd_captcha_keys' );
	$secret          = $mywy_options[0]['mhd_secret_key'];
	$response        = $_POST["g-recaptcha-response"];
	$verify          = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}" );
	$captcha_success = json_decode( $verify );
	if ( $captcha_success->success == false ) {
		$result = array(
			'error'   => true,
			'message' => __( 'reCaptcha is Expired please wait!!', 'myway' )
		);
		wp_send_json( $result );
	}
	$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
	if ( is_wp_error( $comment ) ) {
		$error_data = intval( $comment->get_error_data() );
		if ( ! empty( $error_data ) ) {
			wp_die( '<p>' . $comment->get_error_message() . '</p>', __( 'Comment Submission Failure', 'myway' ), array(
				'response'  => $error_data,
				'back_link' => true
			) );
		} else {
			wp_die( 'Unknown error' );
		}
	}

	/*
	 * Set Cookies
	 */
	$user = wp_get_current_user();
	do_action( 'set_comment_cookies', $comment, $user );

	/*
	 * If you do not like this loop, pass the comment depth from JavaScript code
	 */
	$comment_depth  = 1;
	$comment_parent = $comment->comment_parent;
	while ( $comment_parent ) {
		$comment_depth ++;
		$parent_comment = get_comment( $comment_parent );
		$comment_parent = $parent_comment->comment_parent;
	}

	/*
	 * Set the globals, so our comment functions below will work correctly
	 */
	$GLOBALS['comment']       = $comment;
	$GLOBALS['comment_depth'] = $comment_depth;

	/*
	 * Here is the comment template, you can configure it for your website
	 * or you can try to find a ready function in your theme files
	 */
	$comment_html = '<li style="background-color: #00deff99;" ' . comment_class( '', null, null, false ) . ' id="comment-' . get_comment_ID() . '">
		<div class="comment-body" id="div-comment-' . get_comment_ID() . '">
			
				<div class="comment-author vcard">
					' . get_avatar( $comment, 32 ) . '
					<cite class="fn">' . get_comment_author_link() . '</cite> <span class="says">گفت:</span>
				</div>
				<div class="comment-metadata">
					<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">' . sprintf( '%1$s at %2$s', get_comment_date(), get_comment_time() ) . '</a>';

	if ( $edit_link = get_edit_comment_link() ) {
		$comment_html .= '<span class="edit-link"><a class="comment-edit-link" href="' . $edit_link . '">Edit</a></span>';
	}

	$comment_html .= '</div>';
	if ( $comment->comment_approved == '0' ) {
		$comment_html .= '<div class="comment-awaiting-moderation">Your comment is awaiting moderation.</div>';
	}

	$comment_html .= '
			' . apply_filters( 'comment_text', get_comment_text( $comment ), $comment ) . '
		</div>
	</li>';
	echo $comment_html;

	die();

}




add_action( 'wp_ajax_ajaxcomments', 'mhd_submit_ajax_comment' );
add_action( 'wp_ajax_nopriv_ajaxcomments', 'mhd_submit_ajax_comment' );