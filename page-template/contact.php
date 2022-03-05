<?php /* Template Name: contact */ ?>
<?php
get_header();
get_template_part( '/partials/top-menu' );
get_template_part( '/partials/head-pages' );
?>
</header>
<?php $contact_info = mhdr_get_option('mhd_contact_setting') ?>
<div class="main-contact">
<div class="col-md-12 col-sm-12 main-contact-page">
	<div class="col-md-6 col-sm-12 col-xs-12 form-contact">

		<h2>Contact Form</h2>
		<hr>

		<div class="form-contact-sec">
			<form method="post" name="contact" id="contact_form">
				<div class="form-group">
					<p>
						<input class="form-control" type="text" name="full_name_contact"
						       id="full_name_contact" placeholder="Your Name *">
					</p>

				</div>
				<div class="form-group">
					<p>
						<input class="form-control" type="email" name="email_contact" id="email_contact"
						       placeholder="Email Address *">
					</p>

				</div>
				<div class="form-group">
					<p>
						<input class="form-control" type="text" name="subject" id="subject"
						       placeholder="Subject">
					</p>

				</div>
				<div class="form-group">
					<p>
						<textarea id="message_contact" name="message_contact" class="form-control" placeholder="Your message" rows="10"></textarea>
					</p>
				</div>
				<div class="form-group">

					<div id="recaptchafield0"></div>

				</div>
				<div class="form-group">
					<p style="text-align: center">

						<input id="submit_contact" type="submit" class="main-btn blue" value="Send">
					</p>
				</div>
			</form>
		</div>

	</div>
	<div class="col-md-6 col-sm-12 col-xs-12 info-contact">
		<P><i class="fa fa-phone"></i><span><?php echo $contact_info[0]['mhd_phone_number']?></span> </P>
		<P><i class="fa fa-envelope"></i><span><?php echo $contact_info[0]['mhd_email_address']?></span> </P>
		<P><i class="fa fa-map-marked"></i><span><?php echo $contact_info[0]['mhd_address']?></span> </P>
		<p class="map-contact"><iframe src="<?php echo $contact_info[0]['mhd_map_location']?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
	</div>
</div>
</div>



<div class="clearfix"></div>
<?php get_footer('simple') ?>