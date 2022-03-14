<section class="footer-section">
	<div class="head-section">
		<svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1600 240"> <path style="fill:transparent" d="M-3,108.5S398.468,0.5,799.951.5C1201.47,0.5,1603,108.5,1603,108.5v203H-3v-203Z"></path> <path style="fill:transparent" d="M-3,137.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path> <path style="fill:#022f68" d="M-3,164.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path> </svg>
	</div>

	<div class="col-md-12 ">
		<div class="footer">
		<div class="container">
			<div class="row">
			<div class="col-md-5 offset-md-1 col-sm-12">
				<div class="footer__about">
				<div class="footer__about-text">
					<div class="footer__about-logo">
						
					<h3>
						 <a class="footer__brand" href="#">
							<img class="footer__brand--logo" src="<?php echo get_template_directory_uri() ?>/images/brand-logo.png" alt="محمد رضائی">
              				<span class="footer__brand--text">وب سایت شخصی محمد رضائی</span>
            			</a>
					</h3>
		</div>
					<div class="footer__text-about">
                        <?php $foot_info = mhdr_get_footer_option('mhd_footer_information');
                        echo "<p>".$foot_info[0]['mhd_footer_desc']."</p>"
                        ?>
						
					</div>
				</div>
				<div class="footer__social-icons mh_tooltip ">
					<?php
					$social_medias = mhdr_get_footer_option('mhd_social-media-setting');
					foreach ($social_medias as $social_media){
					?>
					<a href="<?php echo $social_media['mhd_social_media_link']?>" class="mh-<?php echo $social_media['mhd_social_media_name']?>" target="_blank" rel="noopener noreferrer" data-toggle="<?php echo $social_media['mhd_social_media_name']?>" data-custom-class="<?php echo $social_media['mhd_social_media_class']?>" title="<?php echo $social_media['mhd_social_media_name']?>" data-toggle="Facebook" >
					<i class="fab <?php echo $social_media['mhd_social_media_icon']?>"></i>
				</a>

                    <?php } ?>

					<a href="#" class="mh-envelope" target="_blank" rel="noopener noreferrer" data-toggle="email" data-custom-class="tooltip-theme" title="Email"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
					</div>
			<div class="col-md-2 col-sm-4 col-4">
				<div class="footer__menu">
				<h4>صفحه ها</h4>
				<div class="footer__menu-link">

				<?php
				if (has_nav_menu('foot-menu')){
					wp_nav_menu(array(
						'theme_location' => 'foot-menu'
					));
				}else{
					echo"You can add menu here";
				}
				?>
							
				</div>
			  </div>
			</div>
			<div class="col-md-2 col-sm-4 col-4">
				<div class="footer__menu">		
				<h4>دسته بندی</h4>
				<div class="footer__menu-link">

				<?php
				if (has_nav_menu('cat-menu')){
					wp_nav_menu(array(
						'theme_location' => 'cat-menu'
					));
				}else{
					echo"You can add menu here";
				}
				?>
					
				</div>
			</div>
			</div>
			<div class="col-md-2 col-sm-4 col-4">
				<div class="footer__menu">
				<h4>پیوند های مفید</h4>
					<div class="footer__menu-link">
					<?php
				if (has_nav_menu('foot-menu')){
					wp_nav_menu(array(
						'theme_location' => 'foot-menu'
					));
				}else{
					echo"You can add menu here";
				}
				?>	

					</div>
					</div>
				</div>
			</div>
				
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 ">
				<div class="footer__second smart_sticky">
					<div class="footer-last ">
						<div class="col-md-6 col-sm-12 col-12">
							<div class="footer-last__copyright ">
								<span class="footer-last__text"><?php echo $foot_info[0]['mhd_footer_copyright']; ?></span>
							</div>
						</div>
				<div class="col-md-6 col-sm-12 col-12">
					<div class="footer-last__policy footer_2_right">
						<a class="footer-last__link" href="#"><span class="footer-last__link-text">Privacy Policy</span></a>&nbsp;/&nbsp;
						<a class="footer-last__link" href="#"><span class="footer-last__link-text " >Advertisement</span></a>
					</div>
				</div>
				</div>
				</div>

			</div>
		</div>

	</div>
					</div>
	</div>
</section>

<?php wp_footer(); ?>
<div class="backdrop"></div>
</body>
</html>