<section class="resome-section">
	<div class="head-resome-section">
		<svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1600 172">
			<path style="fill:transparent" d="M-3,108.5S398.468,0.5,799.951.5C1201.47,0.5,1603,108.5,1603,108.5v203H-3v-203Z"></path>
			<path style="fill:transparent" d="M-3,137.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path>
			<path style="fill:#f9f9f9" d="M-3,164.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path>
		</svg>
	</div>

	<div class="resome">
		<select class="select-res">
            <option value="what-done-i">What done i?</option>
            <option value="what-do-i">What do i?</option>
			<option value="who-am-i">Who am i?</option>
			<option value="where-am-i">Where am i?</option>
		</select>
        <div id="what-do-i" class="col-md-12 col-sm-12 resome-content ">

        <div class="container">
				<div id="" class="col-md-6 col-sm-12 resome-content-left ">
					<img src="<?php echo get_template_directory_uri().'/images/double-like.png' ?>" class="img-responsive" alt=""></div>
				<div class="col-md-6 col-sm-12 resome-content-right ">
					<div class="title-resome"><h3>What did i done?</h3></div>
					<div class="resome-text">
                        <?php
                        $capability_infos = mhdr_get_option('mhd_capability_setting');
                        foreach ($capability_infos as $capability_info){
                        ?>
                        <div class="progress">
                            <div class="progress-value" style="width: <?php echo $capability_info['mhd_percent_capability'];  ?>">
                                <span><?php echo $capability_info['mhd_capability_title'];  ?></span>
                            </div>
                        </div>
                        <?php } ?>

					</div>
				</div>
			</div>

		</div>

        <div id="who-am-i" class="col-md-12 col-sm-12 resome-content">
			<div class="container">
				<div class="col-md-6 col-sm-12 resome-content-left ">
					<?php
					$introduce = mhdr_get_option('general_introduce_setting');
					?>
                    <img class="img-responsive" src="<?php echo $introduce[0]['mhd_intro_detail_img']?>" alt=""></div>
				<div class="col-md-6 col-sm-12 resome-content-right ">
					<div class="title-resome"><h3>Who am i?</h3></div>
					<div class="resome-text">
						<p ><?php echo $introduce[0]['mhd_introduce_desc_details']?></p>
					</div>
				</div>
			</div>

		</div>

		<div id="what-done-i" class="col-md-12 col-sm-12 resome-content resome-block ">
			<div class="container">
                <div class="slider-project">
                <?php
				$new_project = new WP_Query( 'post_type=project&posts_per_page=10' );
				if ( $new_project->have_posts() ):
				while ( $new_project->have_posts() ): $new_project->the_post();
				$terms = get_the_terms( $post->ID, 'projectstype' );
				?>

                <div class="slid-project">
                    <div class="col-md-6 col-sm-12 resome-content-left ">
                        <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
                    <div class="col-md-6 col-sm-12 resome-content-right ">
                        <div class="title-resome"><h3><?php the_title() ?></h3></div>
                        <div class="resome-text">
                            <p class="excerpt"><?php the_excerpt(); ?></p>
                            <p class="techno"><?php $project_techno_images = ShowProject::technologies( get_the_ID() ); ?>
	                            <?php if ( $project_techno_images && count( $project_techno_images ) ): ?>
		                            <?php foreach ( $project_techno_images as $techno ): ?>
                                        <span><?php echo $techno?></span>
		                            <?php endforeach; ?>
	                            <?php endif; ?></p>
                        </div>
                        <div class="view-live">
                            <a class="btn-live" href="<?php echo $version = ShowProject::demo_path( get_the_ID() );?>">Live view</a>
                        </div>
                    </div>
                </div>

				<?php endwhile;

					?>
				<?php else: echo 'there is not any project exist...'; ?>
				<?php endif;
				?>
			</div>

            </div>

            <div class="project-slider-control">

                <a class="slick-prev-p" href="#"><i class="fa fa-arrow-circle-left"></i></a>
                <a class="slick-next-p" href="#"><i class="fa fa-arrow-circle-right"></i> </a>

            </div>


        </div>

		<div id="where-am-i" class="col-md-12 col-sm-12 resome-content">
			<div class="container">
				<div class="col-md-6 col-sm-12 resome-content-left ">
<!--                    <img class="img-responsive" src="--><?php //echo get_template_directory_uri().'/images/show-left-side-blue.png' ?><!--" alt="">-->
                    <?php
                    $contact_info = mhdr_get_option('mhd_contact_setting');
                    ?>
                    <p class="map-contact">
                        <iframe src="<?php echo $contact_info[0]['mhd_map_location']; ?> " width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </p>

                </div>
				<div class="col-md-6 col-sm-12 resome-content-right ">
					<div class="title-resome"><h3>Where am i?</h3></div>
					<div class="resome-text">
						<p><?php echo $contact_info[0]['mhd_address']; ?></p>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-12 col-sm-12 resome-tabs">
			<div class="container">
                <div id="what-done-i" class="col-md-3 col-sm-3 resome-tab active ">
					<i class="fa fa-file-code"></i>
					<span>what done i?</span>

				</div>
                <div id="what-do-i" class="col-md-3 col-sm-3 resome-tab">

                    <i class="fa fa-magic"></i>
                    <span>what do i?</span>

                </div>
				<div id="who-am-i" class="col-md-3 col-sm-3 resome-tab">
					<i class="fa fa-user"></i>
					<span>who am i?</span>

				</div>

				<div id="where-am-i" class="col-md-3 col-sm-3 resome-tab">

					<i class="fa fa-map-marked"></i>
					<span>where am i?</span>

				</div>
			</div>

		</div>
	</div>
</section>
<div class="clearfix"></div>