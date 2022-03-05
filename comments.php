<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
	die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'myway'); ?></p>
	<?php
	return; }

if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses');?> <?php printf('to “%s”', the_title('', '', false)); ?></h3>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<ol class="commentlist">
		<?php
		wp_list_comments(array(

		));
		?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<?php
	if ( ! comments_open() ) :
		echo"<p class='nocomments'>Comments are closed.</p>";
	endif;

else :
	if ( comments_open() ) :

	else :
		echo"<p class='nocomments'>Comments are closed.</p>";
	endif;
endif;
$args = array(
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>'<p class="comment-form-author">' . '<input id="author" placeholder="Your Name *" name="author" class="form-control " type="text" value="' .
			           esc_attr( $commenter['comment_author'] ) . '" size="30" />'.
			           '</p>'
		,
			'email'  => '<p class="comment-form-email">' . '<input id="email" placeholder="Your Email Address *" class="form-control " name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			            '" size="30" />'  .
			            '</p>',
			'url'    => '<p class="comment-form-url">' .
			            '<input id="url" name="url" placeholder="Your Website URL" class="form-control " type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
			            '</p>'
		)
	),
	'comment_field' => '<p class="comment-form-comment">' .
	                   '<textarea id="comment" class="form-control " name="comment" placeholder="Your comment text here *" cols="45" rows="8" aria-required="true"></textarea>' .
	                   '</p>
                        <p>
                         <div id="recaptchafield0"></div>
                        </p>
                            ',
	'comment_notes_after' => '',
	'title_reply' => '<div class="crunchify-text"> <h5>Please Post Your Comments & Reviews</h5></div>',
	'class_submit' => 'main-btn blue'
);

comment_form($args);
?>