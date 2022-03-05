<div class="col-md-4 col-sm-12 sidebar-section">
	<div class="sidebar">
		<div class="sidebar-widget">
			<div class="search-blog widget">
				<form role="search" method="get" class="search-form" action="">
					<input type="search" class="search-field" placeholder="Search …" value="" name="s">
					<button name="submit" type="submit" class="search-submit">Search</button>
				</form>

			</div>
			<!--      Categories Sidebar           -->
			<div class="sidebar-widget">
				<div class="widget-title">
					<h4>Categoris</h4>
				</div>
				<div class="categories">
					<?php
					if(has_nav_menu('side-cat')){

						wp_nav_menu(array('theme_location' =>'side-cat'));
					}
					?>
<!--					<ul>-->
<!--						<li><a href="">Backend</a></li>-->
<!--						<li><a href="">Frontend</a></li>-->
<!--						<li><a href="">Wordpress</a></li>-->
<!--						<li><a href="">Plugin</a></li>-->
<!--						<li><a href="">Theme</a></li>-->
<!--					</ul>-->
				</div>


			</div>
			<!--      Least post blog             -->
			<div class="sidebar-widget">
				<div class="widget-title">
					<h4>least Post</h4>
				</div>
				<div class="last-blog-post-sidebar widget">

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
						<div class="col-md-12 col-xs-12 post-item">
							<div class="col-md-3 col-xs-3 thumbnail-widget">
								<a class="link-img-post" href="<?php the_permalink(); ?>">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="" class="img-responsive">
									<i class="fas fa-link"></i>
								</a>
							</div>
							<div class=" col-md-9 col-xs-9 post-detail">
								<div class="col-md-12 title-post-lp-widget"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>

								<div class="col-md-12 post-meta"><i class="fa fa-calendar-times"></i><?php the_date(); ?></div>
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
		<!--      portfolio section              -->
		<div class="sidebar-widget">
			<div class="widget-title">
				<h4>Portfolio</h4>
			</div>
			<div class="portfolio widget">
				<a class="portfolio-link-sb" href="#" title="">
					<img width="150" height="150" src="images/f1-150x150.jpg" data-src="" class="portfolio-img-sb img-responsive img-rounded" alt="" >
					<i class="fas fa-link"></i>
				</a>
				<a class="portfolio-link-sb" href="#" title="">
					<img width="150" height="150" src="images/f1-150x150.jpg" data-src="" class="portfolio-img-sb img-responsive img-rounded" alt="" >
					<i class="fas fa-link"></i>
				</a>
				<a class="portfolio-link-sb" href="#" title="">
					<img width="150" height="150" src="images/f1-150x150.jpg" data-src="" class="portfolio-img-sb img-responsive img-rounded" alt="" >
					<i class="fas fa-link"></i>
				</a>
				<a class="portfolio-link-sb" href="#" title="">
					<img width="150" height="150" src="images/f1-150x150.jpg" data-src="" class="portfolio-img-sb img-responsive img-rounded" alt="" >
					<i class="fas fa-link"></i>
				</a>
				<a class="portfolio-link-sb" href="#" title="">
					<img width="150" height="150" src="images/f1-150x150.jpg" data-src="" class="portfolio-img-sb img-responsive img-rounded" alt="" >
					<i class="fas fa-link"></i>
				</a>
				<a class="portfolio-link-sb" href="#" title="">
					<img width="150" height="150" src="images/f1-150x150.jpg" data-src="" class="portfolio-img-sb img-responsive img-rounded" alt="" >
					<i class="fas fa-link"></i>
				</a>
				<div class="clearfix"></div>
			</div>


		</div>
	</div>
</div>
