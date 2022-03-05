<section class="footer-section">

	<div class="col-md-12 footer">
		<div class="container">
			<div class="col-md-5 col-md-12 about">
				<div class="about-text">
					<div class="about-logo"><h3>Mohammad Rezaei</h3></div>
					<div class="text-about">
						<?php $foot_info = mhdr_get_footer_option('mhd_footer_information');
						echo "<p>".$foot_info[0]['mhd_footer_desc']."</p>"

						?>
						<p>
						</p>
					</div>
				</div>
				<div class="social-icons mh_tooltip ">
					<?php
					$social_medias = mhdr_get_footer_option('mhd_social-media-setting');
					foreach ($social_medias as $social_media){
						?>
						<a href="<?php echo $social_media['mhd_social_media_link']?>" class="mh-<?php echo $social_media['mhd_social_media_name']?>" target="_blank" rel="noopener noreferrer" data-toggle="<?php echo $social_media['mhd_social_media_name']?>" data-custom-class="<?php echo $social_media['mhd_social_media_class']?>" title="<?php echo $social_media['mhd_social_media_name']?>" data-toggle="Facebook" ><i class="fab <?php echo $social_media['mhd_social_media_icon']?>"></i></a>

					<?php } ?>
					<!--                    <a href="#" class="mh-twitter" target="_blank" rel="noopener noreferrer" data-toggle="Twitter" data-custom-class="tooltip-info" title="Twitter"><i class="fab fa-twitter"></i></a>-->
					<!--                    <a href="#" class="mh-linkedin" target="_blank" rel="noopener noreferrer" data-toggle="Linkedin" data-custom-class="tooltip-primary" title="Linkedin"><i class="fab fa-linkedin"></i></a>-->
					<!--                    <a href="#" class="mh-instagram" target="_blank" rel="noopener noreferrer" data-toggle="Instagram" data-custom-class="tooltip-purple" title="Instagram"><i class="fab fa-instagram"></i></a>-->
					<!--                    <a href="#" class="mh-telegram" target="_blank" rel="noopener noreferrer" data-toggle="Telegram" data-custom-class="tooltip-info" title="Telegram"><i class="fab fa-telegram-plane"></i></a>-->
					<!--                    <a href="#" class="mh-youtube" target="_blank" rel="noopener noreferrer" data-toggle="Youtube" data-custom-class="tooltip-danger" title="Youtube"><i class="fab fa-youtube"></i></a>-->
					<a href="#" class="mh-envelope" target="_blank" rel="noopener noreferrer" data-toggle="Email" data-custom-class="tooltip-theme" title="Email"><i class="fa fa-envelope"></i></a>
				</div>
			</div>
			<div class="col-md-2 col-sm-4 footer-menu">

				<h4>Useful links</h4>
				<div class="footer-menu-link">
					<ul>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Purchase now</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Purchase now</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Support</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Portfolio</a></li>
						<li><a href=""><i class="fas fa-caret-right mr8"></i>Web Design</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>App Download</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2 col-sm-4 footer-menu">

				<h4>Useful links</h4>
				<div class="footer-menu-link">
					<ul>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Purchase now</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Purchase now</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Support</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Portfolio</a></li>
						<li><a href=""><i class="fas fa-caret-right mr8"></i>Web Design</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>App Download</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2 col-sm-4 footer-menu">

				<h4>Useful links</h4>
				<div class="footer-menu-link">
					<ul>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Purchase now</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Purchase now</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Support</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>Portfolio</a></li>
						<li><a href=""><i class="fas fa-caret-right mr8"></i>Web Design</a></li>
						<li><a href="#"><i class="fas fa-caret-right mr8"></i>App Download</a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 footer_2 smart_sticky">
				<div class="col-md-6 col-sm-12">
					<div class="elm_icon_text">

						<span class="it_text " style="font-size:14px;color:rgba(255,255,255,0.7);"><?php echo $foot_info[0]['mhd_footer_copyright']; ?></span>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="elms_right footer_2_right">
						<a class="elm_icon_text" href="#">
							<span class="it_text">Privacy Policy</span></a>&nbsp;/
						<a class="elm_icon_text" href="#">
							<span class="it_text " >Advertisement</span>
						</a>


					</div>
				</div>

			</div>
		</div>

	</div>
	</div>
</section>

<?php wp_footer(); ?>

</body>
</html>