<?php
get_header();
get_template_part('/partials/top-menu');
get_template_part('/partials/head-pages');
?>
</header>

<div class="single-portfilio-main-content">
	<div class="container">
		<div class="col-md-12 col-sm-12 ">
			<div class="single-portfilio">
				<div class="row">
<?php
if ( have_posts() ):
	while ( have_posts() ): the_post();
		?>

			<div class="col-md-7 col-sm-12 ">
				<div class="single-portfilio__description">
				<div class="single-portfilio__content">
					<p class="single-portfilio__desc">
						<?php the_content(); ?>
					</p>
				</div>
				<div class="single-portfilio__info">
					
				</div>
			</div>
			</div>
			<div class="col-md-5 col-sm-12 ">
				<div class="single-portfilio__images">
				<div class="single-portfilio__slider" >
		<?php $project_slider_images = ShowProject::get_slider_images( get_the_ID() ); ?>
		<?php if ( $project_slider_images && count( $project_slider_images ) ): ?>
			<?php foreach ( $project_slider_images as $image ): ?>
					<div > <img src="<?php echo $image;  ?>" alt="<?php $image_id = ShowProject::pippin_get_image_id($image);
						$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
						if($alt) echo $alt; ?>" class="img-responsive" >
					</div>
			<?php endforeach; ?>
		<?php endif; ?>
				</div>
				<div class="single-portfilio__view-live">
					<a class="btn-live" href="<?php echo $version = ShowProject::demo_path( get_the_ID() );?>">Live view</a>
				</div>
				<div class="single-portfilio__cat-tag">
					<div class="single-portfilio__cat">
						<p><i class="fa fa-folder"></i><a href="#">Wordpress</a><a href="#">Themes</a></p>
					</div>
					<div class="single-portfilio__tag">
						<p><i class="fa fa-tags"></i><a href="#">Wordpress</a><a href="#">Themes</a></p>
					</div>
				</div>
                <div class="single-portfilio__version">
                    <p>version : <?php echo $version = ShowProject::price_project( get_the_ID() );?></p>
                </div>
                <div class="single-portfilio__technologies">

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
		</div>
	</div>
</div>


<div class="clearfix"></div>

<?php get_footer(); ?>

<?php endwhile; ?>
<?php endif; ?>
