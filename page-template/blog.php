<?php /* Template Name: blog */ ?>
<?php
get_header();
get_template_part( '/partials/top-menu' );
get_template_part( '/partials/head-pages' );
?>


</header>

<div class="main-content">
    <div class="container">
    <div class="col-md-12 col-sm-12">
        <div class="col-md-8 col-sm-12 main-side">
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

                    <div class="col-md-12 col-sm-12 post-blog">
                        <div class="col-md-4 col-sm-12 img-post-blog">
                            <a class="thumbnail-post" href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-12 post-info">
                            <div class="title-post"><h2><?php the_title() ?></h2></div>
                            <div class="metadata-post"><span><i class="fa fa-calendar-times"></i> <?php the_date(); ?> </span>
                            </div>
                            <div class="excerpt-post"><p><?php the_excerpt(); ?></p></div>
                            <div class="see-more"><a class="see-more-link" href="<?php the_permalink(); ?>">Read more</a></div>
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
    <?php get_sidebar(); ?>

    </div>
    </div>
</div>


<div class="clearfix"></div>
<?php get_footer(); ?>