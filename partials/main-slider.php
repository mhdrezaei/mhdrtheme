<?php
$slider_info = mhdr_get_option('slider-setting');

?>
<section class="slider-section">



<div class="container">
<div class="row">
<div class="col-md-12">
<div class="slider" >
		<div class="slide" >
			<?php
            foreach ($slider_info as $slide) {
	            ?>
                <div class="slides"  >
                <figure class="slides__shape" >
            <img src="<?php echo $slide['sliderimg']; ?>" alt="<?php echo $slide['slider_title']; ?>" class="slides__shape__img" >
            
          </figure>
          <div class="slides__description">
              <h2 class="slides__title" ><?php echo $slide['slider_title']; ?></h2>
              <p class="slides__summary" >
              <?php echo $slide['slider_description']; ?>
              </p>
              <a href="<?php echo $slide['slider_img_link']; ?>" class="btn btn-blue-accent" >مشاهده مطلب</a>
          </div>

                </div>
	            <?php
            }
                ?>

       


		</div>


        <div class="slicks-controls">
			<a class="slicks-controls__prev pull-left" href="#">
                <svg class="slicks-controls__slider-arrow">
                    <use xlink:href="<?php echo get_template_directory_uri(  )?>/images/sprite.svg#icon-arrow-circle-left" ></use>
                </svg>
            </a>
			<a class="slicks-controls__next pull-right" href="#">
                <svg class="slicks-controls__slider-arrow">
                    <use xlink:href="<?php echo get_template_directory_uri(  )?>/images/sprite.svg#icon-arrow-circle-right" ></use>
                </svg>    
            </a>
		</div>
	</div>

    
    </div>
        </div>
        </div>
</section>
</header>
<div class="end-header">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 70 1440 175"><path fill="#0d71ac" fill-opacity="1" d="M0,128L26.7,112C53.3,96,107,64,160,90.7C213.3,117,267,203,320,202.7C373.3,203,427,117,480,122.7C533.3,128,587,224,640,240C693.3,256,747,192,800,149.3C853.3,107,907,85,960,96C1013.3,107,1067,149,1120,154.7C1173.3,160,1227,128,1280,128C1333.3,128,1387,160,1413,176L1440,192L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path></svg>
</div>
<div class="clearfix"></div>