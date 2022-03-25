<div class="col-md-4 col-sm-12 ">
	<div class="sidebar-section">					
		<div class="sidebar">
			<div class="sidebar__widget">
				<div class="sidebar__search-blog widget">
					<form role="search" method="get" class="sidebar__search-form" action="">
						<input type="search" class="sidebar__search-field" placeholder="جستجو..." value="" name="s">
						<button name="submit" type="submit" class="sidebar__search-submit">بگرد</button>
					</form>

				</div>
			<!--      Categories Sidebar           -->
			<div class="sidebar__widget">
				<div class="sidebar__widget--title">
					<h4>دسته بندی</h4>
				</div>
				<div class="sidebar__widget--categories">
					<?php
					if(has_nav_menu('side-cat')){

						wp_nav_menu(array('theme_location' =>'side-cat'));
					}
					?>

				</div>


			</div>
			<!--      Least post blog             -->
			<div class="sidebar__widget">
				<div class="sidebar__widget--title">
					<h4>آخرین مطالب</h4>
				</div>
				<div class="sidebar__lastpost widget">

					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'orderby'        => 'date',
						'order'          => 'DESC'
					);
					$query = new WP_Query($args);
					if ($query->have_posts()){
					while ($query->have_posts()) {
						$query->the_post();
						?>
						<div class="col-md-12 col-12 ">
							<div class="sidebar__lastpost--post-item">
							<div class="col-md-12 col-12">
								<div class="sidebar__lastpost--thumbnail-widget">
								<a class="sidebar__lastpost--link-img-post" href="<?php the_permalink(); ?>">
								<?php $image_id = get_post_thumbnail_id(); ?>
									<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ) ?>" class="img-responsive">
									<i class="fas fa-link"></i>
								</a>
								</div>
							</div>
							<div class=" col-md-12 col-12">
								<div class="sidebar__lastpost--detail" >
									<div class="col-md-12 ">
										<div class="sidebar__lastpost--detail--title-post" >
										<h3>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="sidebar__lastpost--post-meta">	
									<i class="fa fa-calendar-times"></i><span><?php the_date(); ?></span>
									</div>
								</div>
									</div>
						</div>
						</div>
						<div class="clearfix"></div>
						<?php
					}
					}
					?>
				</div>
				</div>
			</div>



		</div>
		<!--      portfolio section              -->
		<div class="sidebar__widget">
			<div class="sidebar__widget--title">
				<h4>پروژه ها</h4>
			</div>
			<?php
			$new_project = new WP_Query( 'post_type=project&posts_per_page=5' );
			if ( $new_project->have_posts() ):
			while ( $new_project->have_posts() ): $new_project->the_post();
			$terms = get_the_terms( $post->ID, 'projectstype' );
			?>
			<div class="col-12 col-md-12">
			<div class="sidebar__widget--portfolio widget">
				
				
				<a class="sidebar__widget--portfolio-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h4 class="sidebar__widget--portfolio-link-title"><?php the_title(); ?></h4>
					<?php $image_id = get_post_thumbnail_id(); ?>
					<img src="<?php the_post_thumbnail_url(); ?>" data-src="<?php the_post_thumbnail_url(); ?>" class="portfolio-img-sb img-responsive img-rounded" alt="<?php echo esc_attr( get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ) ?>" >
					<i class="fas fa-link"></i>
				</a>
			</div>
			</div>
			<?php endwhile;

			?>
			<?php else: echo 'there is not any project exist...'; ?>
			<?php endif;
			?>


				<div class="clearfix"></div>
			</div>


			</div>
		</div>
	</div>
</div>
</div>