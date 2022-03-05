<?php /* Template Name: projects */

get_header();
get_template_part('/partials/top-menu');
get_template_part('/partials/head-pages');
?>

</header>

<div class="main-content">
	<div class="container">
		<div class="col-md-12 col-sm-12 all-portfolio">

			<?php
			$new_project = new WP_Query( 'post_type=project&posts_per_page=10' );
			if ( $new_project->have_posts() ):
			while ( $new_project->have_posts() ): $new_project->the_post();
			$terms = get_the_terms( $post->ID, 'projectstype' );
			?>

			<div class="col-md-6 col-sm-12 portfolio-grid mgb20">
				<div class="portfolio-post">
					<a class="link-portfilio" href="<?php the_permalink(); ?>">
						<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
						<i class="fa fa-link"></i>
						<h2><?php the_title(); ?></h2>
						<p>Theme</p>
					</a>
				</div>


			</div>

			<?php endwhile;

			?>
			<?php else: echo 'there is not any project exist...'; ?>
			<?php endif;
			?>

		</div>
	</div>
</div>












<div class="clearfix"></div>
<?php get_footer(); ?>