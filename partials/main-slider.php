<?php
$slider_info = mhdr_get_option('slider-setting');
$i = 0;
?>
<section class="slider-section">

	<div class="slider">
		<div class="slid">
			<?php

            foreach ($slider_info as $slide) {
//	            $val = array_values($slide);




                if ( ( $i / 2 ) == 0 ) {

	            ?>

                <svg viewBox="25 50 120 120" aria-selected="false" class="first-svg" xmlns="http://www.w3.org/2000/svg"
                     width="800" height="500">
                    <defs>
                        <pattern id="img<?php echo $i; ?>" x="230" y="250" class="first-pattern" color-rendering="optimizeSpeed"
                                 color-interpolation="linearRGB" color-profile="#fff" color="#fff"
                                 patternUnits="userSpaceOnUse" width="500" height="500">
                            <image href="<?php echo $slide['sliderimg']; ?>" x="188"
                                   y="192" width="136" height="165"/>
                        </pattern>
                    </defs>
                    <a href="<?php echo $slide['slider_img_link'] ?>">
                    <path fill="url(#img<?php echo $i; ?>)" stroke="white" stroke-width="2"
                          d="M35.1,-43.6C38.1,-39.3,28,-21.2,31.8,-4.9C35.5,11.5,53.1,26.2,53.2,35C53.2,43.8,35.7,46.8,19.2,52.8C2.8,58.7,-12.5,67.7,-26.7,65.8C-40.9,63.9,-53.8,51.2,-65.1,35.7C-76.3,20.1,-85.9,1.6,-81,-12.3C-76.2,-26.2,-57,-35.7,-41.1,-37.7C-25.2,-39.7,-12.6,-34.3,1.7,-36.4C16.1,-38.4,32.1,-47.9,35.1,-43.6Z"
                          transform="translate(100 100)"></path>
                    </a>
                </svg>


	            <?php
            }else{
				?>

                <svg viewBox="55 40 100 135" aria-selected="false" xmlns="http://www.w3.org/2000/svg" width="800"
                     height="500">
                    <defs>
                        <pattern id="img<?php echo $i; ?>" x="250" y="250" color="#fff" patternUnits="userSpaceOnUse" width="500"
                                 height="500">
                            <image href="<?php echo $slide['sliderimg']; ?>" x="192" y="192"
                                   width="130" height="130"/>
                        </pattern>
                    </defs>
                    <a href="<?php echo $slide['slider_img_link'] ?>">
                    <path fill="url(#img<?php echo $i; ?>)" stroke="white" stroke-width="2"
                          d="M49.1,-52.5C62.1,-47.6,69.9,-30.7,71.3,-13.9C72.6,2.8,67.4,19.3,57.6,30.4C47.8,41.5,33.5,47,17.7,56C1.9,64.9,-15.3,77.1,-23.7,71.4C-32.1,65.6,-31.7,41.8,-38.6,24.7C-45.5,7.7,-59.8,-2.7,-59.2,-11.2C-58.6,-19.6,-43.1,-26.2,-30.7,-31.2C-18.4,-36.2,-9.2,-39.5,4.4,-44.8C18.1,-50.1,36.1,-57.3,49.1,-52.5Z"
                          transform="translate(100 100)"></path>
                    </a>
                </svg>


				<?php
			}
            $i++;
            } ?>


<!---->
<!--            <svg viewBox="25 50 120 120" aria-selected="false" class="first-svg" xmlns="http://www.w3.org/2000/svg" width="800" height="500">-->
<!--				<defs>-->
<!--					<pattern id="img3" x="230" y="250" class="first-pattern" color-rendering="optimizeSpeed" color-interpolation="linearRGB" color-profile="#fff" color="#fff" patternUnits="userSpaceOnUse" width="500" height="500">-->
<!--						<image  href="--><?php //echo get_template_directory_uri().'/images/mhd3.jpg' ?><!--" x="188" y="192" width="136" height="165" />-->
<!--					</pattern>-->
<!--				</defs>-->
<!--				<path fill="url(#img3)"  stroke="white" stroke-width="2" d="M35.1,-43.6C38.1,-39.3,28,-21.2,31.8,-4.9C35.5,11.5,53.1,26.2,53.2,35C53.2,43.8,35.7,46.8,19.2,52.8C2.8,58.7,-12.5,67.7,-26.7,65.8C-40.9,63.9,-53.8,51.2,-65.1,35.7C-76.3,20.1,-85.9,1.6,-81,-12.3C-76.2,-26.2,-57,-35.7,-41.1,-37.7C-25.2,-39.7,-12.6,-34.3,1.7,-36.4C16.1,-38.4,32.1,-47.9,35.1,-43.6Z" transform="translate(100 100)" ></path>-->
<!--			</svg>-->
<!--			<svg viewBox="55 40 100 135" aria-selected="false" xmlns="http://www.w3.org/2000/svg" width="800" height="500">-->
<!--				<defs>-->
<!--					<pattern id="img2" x="250" y="250"  color="#fff" patternUnits="userSpaceOnUse" width="500" height="500">-->
<!--						<image href="--><?php //echo get_template_directory_uri().'/images/mhd.jpg' ?><!--" x="192" y="192" width="130" height="130" />-->
<!--					</pattern>-->
<!--				</defs>-->
<!--				<path fill="url(#img2)"   stroke="white" stroke-width="2" d="M49.1,-52.5C62.1,-47.6,69.9,-30.7,71.3,-13.9C72.6,2.8,67.4,19.3,57.6,30.4C47.8,41.5,33.5,47,17.7,56C1.9,64.9,-15.3,77.1,-23.7,71.4C-32.1,65.6,-31.7,41.8,-38.6,24.7C-45.5,7.7,-59.8,-2.7,-59.2,-11.2C-58.6,-19.6,-43.1,-26.2,-30.7,-31.2C-18.4,-36.2,-9.2,-39.5,4.4,-44.8C18.1,-50.1,36.1,-57.3,49.1,-52.5Z" transform="translate(100 100)" ></path>-->
<!--				<!--                            <image href="images/layer6.png" height="200" width="200"/>-->-->
<!--			</svg>-->
<!--			<svg viewBox="25 50 120 120" aria-selected="false" class="first-svg" xmlns="http://www.w3.org/2000/svg" width="800" height="500">-->
<!--				<defs>-->
<!--					<pattern id="img1" x="250" y="250" class="first-pattern" color-rendering="optimizeSpeed" color-interpolation="linearRGB" color-profile="#fff" color="#fff" patternUnits="userSpaceOnUse" width="500" height="500">-->
<!--						<image  href="--><?php //echo get_template_directory_uri().'/images/mhd2.jpg' ?><!--" x="192" y="192" width="130" height="130" />-->
<!--					</pattern>-->
<!--				</defs>-->
<!--				<path fill="url(#img1)"  stroke="white" stroke-width="2" d="M35.1,-43.6C38.1,-39.3,28,-21.2,31.8,-4.9C35.5,11.5,53.1,26.2,53.2,35C53.2,43.8,35.7,46.8,19.2,52.8C2.8,58.7,-12.5,67.7,-26.7,65.8C-40.9,63.9,-53.8,51.2,-65.1,35.7C-76.3,20.1,-85.9,1.6,-81,-12.3C-76.2,-26.2,-57,-35.7,-41.1,-37.7C-25.2,-39.7,-12.6,-34.3,1.7,-36.4C16.1,-38.4,32.1,-47.9,35.1,-43.6Z" transform="translate(100 100)" ></path>-->
<!--			</svg>-->
<!--			<svg viewBox="55 40 100 135" aria-selected="false" xmlns="http://www.w3.org/2000/svg" width="800" height="500">-->
<!--				<defs>-->
<!--					<pattern id="img2" x="250" y="250"  color="#fff" patternUnits="userSpaceOnUse" width="500" height="500">-->
<!--						<image href="--><?php //echo get_template_directory_uri().'/images/mhd.jpg' ?><!--" x="192" y="192" width="130" height="130" />-->
<!--					</pattern>-->
<!--				</defs>-->
<!--				<path fill="url(#img2)"   stroke="white" stroke-width="2" d="M49.1,-52.5C62.1,-47.6,69.9,-30.7,71.3,-13.9C72.6,2.8,67.4,19.3,57.6,30.4C47.8,41.5,33.5,47,17.7,56C1.9,64.9,-15.3,77.1,-23.7,71.4C-32.1,65.6,-31.7,41.8,-38.6,24.7C-45.5,7.7,-59.8,-2.7,-59.2,-11.2C-58.6,-19.6,-43.1,-26.2,-30.7,-31.2C-18.4,-36.2,-9.2,-39.5,4.4,-44.8C18.1,-50.1,36.1,-57.3,49.1,-52.5Z" transform="translate(100 100)" ></path>-->
<!--				<!--                            <image href="images/layer6.png" height="200" width="200"/>-->-->
<!--			</svg>-->


		</div>
		<div class="slider-controls">
			<a class="slicks-prev pull-left" href="#"><i class="fa fa-arrow-circle-left"></i></a>
			<a class="slicks-next pull-right" href="#"><i class="fa fa-arrow-circle-right"></i> </a>
		</div>

	</div>

</section>
</header>
<div class="end-header">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 70 1440 175"><path fill="#0d71ac" fill-opacity="1" d="M0,128L26.7,112C53.3,96,107,64,160,90.7C213.3,117,267,203,320,202.7C373.3,203,427,117,480,122.7C533.3,128,587,224,640,240C693.3,256,747,192,800,149.3C853.3,107,907,85,960,96C1013.3,107,1067,149,1120,154.7C1173.3,160,1227,128,1280,128C1333.3,128,1387,160,1413,176L1440,192L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path></svg>
</div>
<div class="clearfix"></div>