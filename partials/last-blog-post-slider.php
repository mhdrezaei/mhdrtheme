<section class="last-blog-posts">
	<div class="col-md-12 col-sm-12 ">
		<div class="last-blog-posts__title">
			<h3>Last Blog post </h3>
			<hr>
		</div>
		<div class="clearfix"></div>
		<div  class="container">
			<div id="last-blog-post" class="last-blog-posts__main">
				<div id="slider" class="last-blog-posts__slider">


				<?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'paged'          => get_query_var( 'paged' )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()){
                while ($query->have_posts()) {
	                $query->the_post();

	                ?>

				<div class="col-md-4 col-sm-12 ">
                        <div class="last-blog-posts__container">
                            <div class="last-blog-posts__content">
                                <a href="<?php the_permalink(); ?>">
                                <?php $image_id = get_post_thumbnail_id(); ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ) ?>">
                                    <h4><?php the_title() ?></h4>
                                    <p><i class="fa fa-calendar-times"></i> <?php the_date() ?> </p>
                                </a>
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
		



	</div>
	<div class="last-blog-posts__control">

		<a class="slick-prev" href="#"><i class="fa fa-arrow-circle-left"></i></a>
		<a class="slick-next" href="#"><i class="fa fa-arrow-circle-right"></i> </a>

	</div>

</section>
<div class="clearfix"></div>