<?php /* Template Name: about */ ?>
<?php
get_header();
get_template_part( '/partials/top-menu' );
get_template_part( '/partials/head-pages' );
?>
	</header>
<?php $contact_info = mhdr_get_option('mhd_contact_setting') ?>
	<div class="main-about">
		<div class="col-md-12 col-sm-12 main-about-page">
			<div class="container">
				<?php if (have_posts()){
				while (have_posts()) {
				the_post();
				$id_post = get_the_ID();
				mhd_update_post_view( $id_post );
				?>
				<div class="about-us">
					<div class=" col-md-12 about-capability">
						<div class="about-content" >
							<?php the_content(); ?>
						</div>
						<div class="col-md-12 about-content">
						<div class="col-md-6 col-sm-12 about-img">
							<img src="<?php echo get_template_directory_uri().'/images/double-like.png' ?>" class="img-responsive" alt="">

					</div>
						<div class="col-md-6 col-sm-12 about-cap"> <?php
							$capability_infos = mhdr_get_option('mhd_capability_setting');
							foreach ($capability_infos as $capability_info){
								?>
								<div class="progress">
									<div class="progress-value" style="width: <?php echo $capability_info['mhd_percent_capability'];  ?>">
										<span><?php echo $capability_info['mhd_capability_title'];  ?></span>
									</div>
								</div>
							<?php } ?></div>
						</div>
					</div>
					</div>
				</div>
				<?php
				}
				}
				?>
			</div>
		</div>





	<div class="clearfix"></div>
<?php get_footer('simple') ?>