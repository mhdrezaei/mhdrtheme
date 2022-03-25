<?php /* Template Name: blog */ ?>
<?php
get_header();
get_template_part( '/partials/top-menu' );
get_template_part( '/partials/head-pages' );
?>


</header>

<div class="blog__main-content">
    <div class="col-md-12 col-sm-12">
        <div class="container">
            <div class="row">   
                <div class="col-md-8 col-sm-12 ">
                    <div class="main-side">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'paged'          => get_query_var( 'paged' )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()){
                while ($query->have_posts()) {
	                $query->the_post();
	                ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="blog__post" > 
                            <div class="col-md-12 col-sm-12 ">
                                <div class="blog__post--img">
                                    <a class="blog__post--thumbnail" href="<?php the_permalink(); ?>">
                                    <?php $image_id = get_post_thumbnail_id(); ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ) ?>">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                            </div>
                            
                        <div class="col-md-12 col-sm-12 ">
                            <div class="blog__post--info">
                                <div class="blog__post--title"><h2><?php the_title() ?></h2></div>
                                <div class="blog__post--excerpt"><p><?php the_excerpt(); ?></p></div>
                                <div class="blog__see-more">
                                <a class="btn btn-blue-accent" href="<?php the_permalink(); ?>">ادامه مطلب</a>
                                </div>
                            </div>
                            
                                <div class="blog__post--metadata">
                                            <div><i class="fa fa-calendar-times"></i> <?php the_date(); ?>&nbsp; </div>
                                            <div class="top-single-author"><i class="fa fa-user"></i> <?php the_author(); ?>&nbsp;</div>
                                            <div><i class="fa fa-comment"></i> <?php comments_number(); ?> </div>
                                            <div><i class="fa fa-eye"></i>&nbsp;<?php echo mhd_get_post_view(get_the_id()) ?> </div>                            
                                        </div>


                            </div>
                        </div>
                    </div>

	                <?php
                }
            }
            ?>

            <div class="pagination">
		        <?php
		        $temp_query  = $wp_query;
		        $wp_query    = null;
		        $wp_query    = $query;
		        $total_pages = $wp_query->max_num_pages;
		        get_template_part( 'partials/pagination' );

		        ?>

            </div>
            </div>
            </div>
    <?php get_sidebar(); ?>

    </div>
    </div>
    </div>
</div>


<div class="clearfix"></div>
<?php get_footer(); ?>