<section class="services">
	<div class="service">
		<div class="head-section">
			<svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1600 240"> <path style="fill:transparent" d="M-3,108.5S398.468,0.5,799.951.5C1201.47,0.5,1603,108.5,1603,108.5v203H-3v-203Z"></path> <path style="fill:transparent" d="M-3,137.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path> <path style="fill:#012b64" d="M-3,164.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path> </svg>
		</div>

		<div class="col-md-12">
			<div class="service-list" >
			<div class="container">
				<div class="row">
				<?php
				$services = mhdr_get_option('mhd_services_setting');
				foreach ($services as $service){
					?>
				<div class="col-md-4 col-sm-12 ">
				<div class="service-list__sec" >	
				<div class="service-list__name">
						<div class="service-list__icon"><img src="<?php echo $service['mhd_service_img']; ?>" alt=""></div>
						<div class="service-list__title"><h3><?php echo $service['mhd_service_title']; ?></h3></div>
						<div class="service-list__desc">
                            <p class="service-list__desc-p" ><?php echo $service['mhd_service_desc']; ?></p>
                        </div>
					</div>
				</div>
				</div>
            <?php } ?>
			</div>
			</div>

			<div class="foot-section">
				<svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1600 172">
					<path style="fill:transparent" d="M-3,108.5S398.468,0.5,799.951.5C1201.47,0.5,1603,108.5,1603,108.5v203H-3v-203Z"></path>
					<path style="fill:transparent" d="M-3,137.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path>
					<path style="fill:#f9f9f9" d="M-3,164.5s401.468-108,802.951-108c401.519,0,803.049,108,803.049,108v203H-3v-203Z"></path> </svg>
			</div>
		</div>
		</div>
	</div>

</section>
<div class="clearfix"></div>