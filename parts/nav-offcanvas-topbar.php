<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar hide-for-print" id="top-bar-menu">

	<div id="mobile-nav">
  		<div class="row">
	        <div class="small-12 columns">
	  			<div class="mobile-logo">
	  				<a href="<?php echo network_site_url(); ?>">
	  					<img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-horizontal.png" alt="ksas logo">
	  				</a>
	  			</div>
	  		</div>
	  	</div>
  		<div class="row">
  			<div class="small-12 columns">	
  				<h1 class="center"><small><?php echo get_bloginfo ( 'description' ); ?></small><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?></a></h1>
  			</div>
  		</div>
	</div>

	<div id="desktop-nav">

		<div class="small-12 columns" id="logo_nav">
			<div class="row">
				<div class="small-12 medium-4 large-3 columns">
					<div class="logo">
						<a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences">
	  						<img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-vertical.png" alt="ksas logo">
						</a>
					</div>
				</div>
				<div class="small-12 medium-5 large-7 columns">
					<h1><a href="<?php echo site_url(); ?>"><small><?php echo get_bloginfo ( 'description' ); ?></small><?php echo get_bloginfo( 'title' ); ?></a></h1>
				</div>
				<div class="small-12 medium-3 large-2 columns">
					<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="search-bar">
	                	<input type="submit" class="icon-search" value="&#xe004;" />
	                	<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search this site" aria-label="search"/>
	                </form>
				</div>
			</div>
		</div>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav_dropdown_depth2(); ?>	
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			 <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			<li><a data-toggle="off-canvas">Menu</a></li>
		</ul>
	</div>
</div>