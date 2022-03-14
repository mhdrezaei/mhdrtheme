<section class="introduce-section">
	<div class="container-fluid" >
        <?php
        $introduce = mhdr_get_option('general_introduce_setting');
        ?>
		<div class="col-md-12 col-sm-12">
			<div class="introduce">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="introduce__img img-light">
			<svg class="introduce__svg" viewBox="0 0 180 220" xmlns="http://www.w3.org/2000/svg">
					<defs>
						<pattern id="img5" x="225" y="250" class="first-pattern" color-rendering="optimizeSpeed" color-interpolation="linearRGB" color-profile="#fff" color="#fff" patternUnits="userSpaceOnUse" width="500" height="500">
							<image  href="<?php echo $introduce[0]['mhd_intro_generaly_img']?>" x="188" y="172" width="160" height="150" />
						</pattern>
					</defs>
					<path fill="url(#img5)" stroke="#095891" stroke-width="2" d="M50.2,-46.9C57.8,-30.5,51.7,-10,47.1,10.9C42.4,31.8,39.2,53.2,25.6,63.8C12.1,74.3,-11.7,74.1,-32.8,65.1C-54,56.1,-72.4,38.4,-77.6,17.3C-82.7,-3.9,-74.6,-28.5,-59.5,-46.6C-44.4,-64.7,-22.2,-76.3,-0.4,-76C21.3,-75.6,42.6,-63.3,50.2,-46.9Z" transform="translate(100 100)" />
				</svg>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 ">
				<div class="introduce__text">
				<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
					<path fill="#00fff369" d="M60.1,-48.8C73.3,-46.9,76.3,-23.4,65.5,-10.8C54.7,1.8,30.1,3.7,16.9,9C3.7,14.3,1.8,23,-10.1,33.1C-22,43.2,-43.9,54.5,-59.8,49.2C-75.6,43.9,-85.3,22,-82,3.3C-78.6,-15.3,-62.2,-30.6,-46.4,-32.4C-30.6,-34.3,-15.3,-22.8,4.1,-26.9C23.4,-31,46.9,-50.6,60.1,-48.8Z" transform="translate(100 100)" />
				</svg>
				<h2 class="introduce__title" >من کی هستم؟</h2>
<p class="introduce__description" ><?php echo $introduce[0]['mhd_introduce_desc'] ?></p>
			</div>
			</div>
		</div>
		</div>
		</div>
	</div>
	</div>
</section>
<div class="clearfix"></div>