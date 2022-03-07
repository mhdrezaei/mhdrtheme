
<header class="header">
    <div class="category-menu-section">
        <h3>category</h3>
		<?php
		if (has_nav_menu('side-cat')){
			wp_nav_menu(array(
				'theme_location' => 'side-cat'
			));
		}else{
			echo"You can add menu here";
		}


		?>
    </div>
	<nav class="d-flex justify-content-between align-items-center">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
					 data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					  aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">Mohammad Rezaei</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="show-category">
                        <button type="button" class="navbar-toggle-category">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
					<?php
                    if (has_nav_menu('top-bar-menu')){
                        wp_nav_menu(array(
	                        'theme_location' => 'top-bar-menu'
                        ));
                    }else{
                        echo"You can add menu here";
                    }


                    ?>

				</div><!-- /.navbar-collapse -->


			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div class="clearfix"></div>
