
<header class="header">
<div class="navigation">
      <input type="checkbox" class="navigation__check" id="nav-check">
      <label for="nav-check" class="navigation__button">
        <span class="navigation__icon">
			
		<svg class="navigation__icon--svg">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/images/sprite.svg#icon-menu"></use>
				</svg>
				
		</span>
		<span class="navigation__circle"></span>
		
      </label>
      <div class="navigation__background"></div>

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

<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">

			<nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
			  <?php $header_info = mhdr_get_option('mhd_site_logo_img'); ?>
			  
            <a class="navbar-brand" href="#">
				<img class="navbar__brand--logo" src="<?php echo ($header_info) ? $header_info : get_template_directory_uri().'/images/brand-logo.png' ?>"  alt="محمد رضائی">
              <span class="navbar__brand-text"><?php echo mhdr_get_option('mhd_site_title'); ?></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="تبديل التنقل">
			<svg class="navbar__svg">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/images/sprite.svg#icon-menu"></use>
				</svg>
			<!-- <span class="navbar-toggler-icon"></span> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
			<?php
                    if (has_nav_menu('top-bar-menu')){
                        wp_nav_menu(array(
	                        'theme_location' => 'top-bar-menu'
                        ));
                    }else{
                        echo"You can add menu here";
                    }
			?>
              
              <form class="d-flex navbar__form">
                <input id="search_input" class="navbar__input" name="s" type="text" autocomplete="off" placeholder="جستجو..." aria-label="جستجو...">
				<p id="result" class="navbar__result" ></p>
                <button class="navbar__btn" type="submit">
				<svg class="navbar__svg--search">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/images/sprite.svg#icon-search"></use>
				</svg>
				</button>
              </form>
            </div>
          </div>
        </nav>


</div>
</div>

