<?php
get_header();
get_template_part('/partials/top-menu');
get_template_part('/partials/head-pages');

?>
</header>

<div class="main-content">
	<div class="container">
		<div class="col-md-12 col-sm-12 main-content-single-page">
			<?php
			get_sidebar();
			if (have_posts()){
			while (have_posts()) {
			the_post();
			$id_post = get_the_ID();
			mhd_update_post_view( $id_post );
			?>
            <div class="col-md-8 col-sm-12 main-content-single-post">

			<div class="col-md-12 col-sm-12 single-post">
				<div class="post-content">
                    <div class="head-single-post">
                        <div><i class="fa fa-calendar-times"></i> <?php the_date(); ?>&nbsp; </div>
                        <div class="top-single-author"><i class="fa fa-user"></i> <?php the_author(); ?>&nbsp;</div>
                        <div><i class="fa fa-comment"></i> <?php comments_number(); ?> </div>
                        <div><i class="fa fa-eye"></i>&nbsp;<?php echo mhd_get_post_view($id_post) ?> </div>
                    </div>
				<?php the_content(); ?>
				</div>
                <div class="like-post-div">
                        <span class="like-post">
                        <span>do you like it?</span>&nbsp;
                        <a <?php echo isset( $_COOKIE[ 'postlike-' . get_the_ID() ] ) ? 'data-liked="1" style="color:#fc5130"' : 'data-liked="0"' ?>
                                href="#" data-id="<?php echo get_the_ID(); ?>" class="like-post">
                            <i class="fa fa-heart" aria-hidden="true"></i><?php echo count_like_post( get_the_ID() ); ?></a>
                        </span>
                </div>
				<div class="clearfix"></div>
				<div class="author-info">
					<div class="author-img"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?></div>
					<div class="author-personal">
						<div class="author-name"><?php echo get_the_author_meta( 'display_name' ) ?></div>
						<div class="author-description">
							<p><?php echo get_the_author_meta( 'description' ) ?></p></div>
					</div>
					<div class="clearfix"></div>
					<div class="other-post"><p><?php echo get_the_author_posts_link() ?></p></div>
				</div>
				<div class="clearfix"></div>

                        <div class="category-tag">
                            <p class="category-post"><i class="fa fa-bars"></i>
	                            <?php the_category( ' ' ) ?>
                            </p>


                            <p class="tag-post"><i class="fa fa-tags"></i>
	                            <?php the_tags( '', ' ', '' ) ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                                </div>
                <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12 related-posts">
                    <h3>Related Posts </h3>
                    <hr>
                <?php     $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) {
                setup_postdata($post); ?>

                    <div class="col-md-4 col-sm-12 related-post">
                        <div class="rel-post">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive">
                                <h4><?php the_title() ?></h4>
                                <p><i class="fa fa-calendar-times"></i> <?php the_date() ?> </p>
                            </a>
                        </div>


                    </div>


                <?php }


				wp_reset_postdata(); ?>

                </div>



			</div>
                <div id="commentCourse" class="col-md-12 col-sm-12">
                    <h3>Comments </h3>
                    <hr>
	                <?php comments_template(); ?>
                </div>

                <?php
			}
			}

			?>
		</div>
	</div>
</div>












<div class="clearfix"></div>
<?php get_footer(); ?>