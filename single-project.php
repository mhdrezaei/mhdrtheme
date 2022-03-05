<?php
get_header();
get_template_part('/partials/top-menu');
get_template_part('/partials/head-pages');
?>
</header>

<div class="main-content">
	<div class="container">
		<div class="col-md-12 col-sm-12 single-portfilio">
<?php
if ( have_posts() ):
	while ( have_posts() ): the_post();
		?>

			<div class="col-md-7 col-sm-12 portfolio-description">
				<div class="portfolio-content">
					<p class="portfolio-desc">
						<?php the_content(); ?>
					</p>
				</div>
				<div class="info-portfolio">
					<ol class="list">
						<li class="item">
							<h2 class="headline">Number one</h2><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, distinctio ad corporis, laboriosam unde provident, architecto tenetur ea odio debitis delectus explicabo eum obcaecati vitae facere iusto laborum consequuntur neque.</span>
						</li>
						<li class="item">
							<h2 class="headline">Number two</h2><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, distinctio ad corporis, laboriosam unde provident, architecto tenetur ea odio debitis delectus explicabo eum obcaecati vitae facere iusto laborum consequuntur neque.</span>
						</li>
						<li class="item">
							<h2 class="headline">Number three</h2><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, distinctio ad corporis, laboriosam unde provident, architecto tenetur ea odio debitis delectus explicabo eum obcaecati vitae facere iusto laborum consequuntur neque.</span>
						</li>
					</ol>
				</div>
			</div>
			<div class="col-md-5 col-sm-12 portfolio-images">
				<div class="portfolio-slider" >
		<?php $project_slider_images = ShowProject::get_slider_images( get_the_ID() ); ?>
		<?php if ( $project_slider_images && count( $project_slider_images ) ): ?>
			<?php foreach ( $project_slider_images as $image ): ?>
					<div > <img src="<?php echo $image;  ?>" alt="<?php $image_id = ShowProject::pippin_get_image_id($image);
						$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
						if($alt) echo $alt; ?>" class="img-responsive" ></div>
			<?php endforeach; ?>
		<?php endif; ?>
				</div>
				<div class="view-live">
					<a class="btn-live" href="<?php echo $version = ShowProject::demo_path( get_the_ID() );?>">Live view</a>
				</div>
				<div class="portfolio-cat-tag">
					<div class="cat">
						<p><i class="fa fa-bars"></i><a href="#">Wordpress</a><a href="#">Themes</a></p>
					</div>
					<div class="tag">
						<p><i class="fa fa-tags"></i><a href="#">Wordpress</a><a href="#">Themes</a></p>
					</div>
				</div>
                <div class="portfolio-version">
                    <p>version : <?php echo $version = ShowProject::price_project( get_the_ID() );?></p>
                </div>
                <div class="portfolio-technologies">

                    <p>technologies :
	                    <?php $project_techno_images = ShowProject::technologies( get_the_ID() ); ?>
	                    <?php if ( $project_techno_images && count( $project_techno_images ) ): ?>
	                    <?php foreach ( $project_techno_images as $techno ): ?>
                        <span><?php echo $techno?></span>
		                    <?php endforeach; ?>
	                    <?php endif; ?>
                    </p>
                </div>
			</div>

		</div>
	</div>
</div>


<div class="clearfix"></div>

<?php get_footer(); ?>

<?php endwhile; ?>
<?php endif; ?>
