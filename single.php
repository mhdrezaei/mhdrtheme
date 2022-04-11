<?php
get_header();
get_template_part('/partials/top-menu');
get_template_part('/partials/head-pages');

?>
</header>

<div class="single">
	
		<div class="col-md-12 col-sm-12 ">
                <div class="container">
                    <div class="row">
                        <?php
                        
                        if (have_posts()){
                        while (have_posts()) {
                        the_post();
                        $id_post = get_the_ID();
                        mhd_update_post_view( $id_post );
                        ?>
                            <div class="col-md-8 col-sm-12 ">
                                
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="single__post">
                                            <div class="single__post--content">
                                                <div class="single__post--header">
                                                    <div><i class="fa fa-calendar-times"></i> <?php the_date(); ?>&nbsp; </div>
                                                    <div class="top-single-author"><i class="fa fa-user"></i> <?php the_author(); ?>&nbsp;</div>
                                                    <div><i class="fa fa-comment"></i> <?php comments_number(); ?> </div>
                                                    <div><i class="fa fa-eye"></i>&nbsp;<?php echo mhd_get_post_view($id_post) ?> </div>
                                                </div>
                                                <div class="single__post--thumbnail">
                                                    <?php $image_id = get_post_thumbnail_id(); ?>
                                                    <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ) ?>">
                                                </div>
                                            <?php the_content(); ?>
                                            </div>
                                                    <div class="single__post--like">
                                                    <span class="single__post--like-post">
                                                    <span>این مطلب رو دوست داشتی؟</span>&nbsp;
                                                    <a <?php echo isset( $_COOKIE[ 'postlike-' . get_the_ID() ] ) ? 'data-liked="1" style="color:#fc5130"' : 'data-liked="0"' ?>
                                                            href="#" data-id="<?php echo get_the_ID(); ?>" class="like-post">
                                                        <i class="fa fa-heart" aria-hidden="true"></i><?php echo count_like_post( get_the_ID() ); ?></a>
                                                    </span>
                                                    </div>
                                            <div class="clearfix"></div>


                                            <div class="single__author-box" >

                                                <figure class="single__author-box__shape" >
                                                    <?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
                                                  <figcaption class="single__author-box__shape--caption" ><?php echo get_the_author_meta( 'display_name' ) ?></figcaption>
                                                </figure>
                                                
                                                  <p class="single__author-box__text" >
                                                    <?php echo get_the_author_meta( 'description' ) ?>                                                  
                                                </p>
                                                
                                              </div>



                                                    <div class="single__post--category-tag">
                                                        <p class="single__post--category-post"><i class="fa fa-bars"></i>
                                                            <?php the_category( ' ' ) ?>
                                                        </p>


                                                        <p class="single__post--tag-post"><i class="fa fa-tags"></i>
                                                            <?php the_tags( '', ' ', '' ) ?>
                                                        </p>
                                                        <div class="clearfix"></div>
                                                    </div>
                                        </div>
                                    </div>
                                
                            </div>

                            <?php get_sidebar();  ?>
                    </div>
                
            <div class="container">    
                <div class="col-md-12 col-sm-12 ">
                    <div class="single__related-posts">
                    <h3>مطالب مرتبط </h3>
                    <hr>
                    <div class="row">
                <?php     $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) {
                setup_postdata($post); ?>

                    <div class="col-md-4 col-sm-12 ">
                        <div class="single__related-post">
                            <div class="single__rel-post">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid">
                                    <h4><?php the_title() ?></h4>
                                    <p><i class="fa fa-calendar-times"></i> <?php the_date() ?> </p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); ?>

                    </div>
                    </div>
                </div>
            </div>


			
           
            <div class="container">    
                <div  class="col-md-12 col-sm-12">
                <div class="comments">   
                <h3>دیدگاه ها</h3>
                    <hr>
	                <?php comments_template(); ?>
                </div>
                </div>
                </div>
                <?php
			}
			}

			?>
		        </div>
            
        

</div>
</div>
</div>













<div class="clearfix"></div>
<?php get_footer(); ?>