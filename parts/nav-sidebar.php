<!-- Begin Sidebar -->

<?php
	global $post; // Setup the global variable $post
	//Get the top-level page slug for sidebar/widget content conditionals
	$ancestors = get_post_ancestors( $post->ID ); // Get the array of ancestors
	$ancestor_id = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
	$the_ancestor = get_page( $ancestor_id );
	$ancestor_url = get_permalink($post->post_parent);
	$ancestor_title = $the_ancestor->post_title;
	
	if ( is_page() && $post->post_parent  ) {
		// Make sure we are on a page and that the page is a parent.
		$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );	
	} else {
		$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	}
	if ( $kiddies ) { ?>

		<div class="sidebar navigation-sidebar" aria-labelledby="sidebar-navigation">
			<div class="offset-gutter sidenav" id="sidebar-navigation" role="navigation" aria-label="Sidebar Menu">
				<h5 class="grey">Also in 
				<?php if (is_home() ) :?>
					<span class="white">About</span>
				<?php else : ?>
					<span class="white"><?php echo $ancestor_title; ?></span>
				<?php endif;?>
				</h5>
			</div>
			<?php wp_nav_menu( array( 
				'theme_location' => 'main-nav', 
				'menu_class' => 'nav', 
				'container_class' => '',
				'sub_menu' => true,
			)); ?>
		</div>

	<?php } ?>
	<?php if (is_page(array('results', 'prior-student-projects')) || is_singular('profile')) : ?>
		<div class="sidebar navigation-sidebar" aria-labelledby="sidebar-navigation">
			<div class="offset-gutter" id="sidebar-navigation" role="navigation" aria-label="Sidebar Menu">
				<h5 class="grey">Also in <span class="white">Undergraduate Students</span>
				</h5>
			</div>
			<?php wp_nav_menu( array( 
				'menu' => 'Undergraduate', 
				'menu_class' => 'nav', 
				'container_class' => '',
			)); ?>
		</div>
	<?php endif;?>
<!-- End Sidebar -->


<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

	<div class="sidebar widget-sidebar" aria-label="Sidebar Widget">

		<?php dynamic_sidebar( 'sidebar1' ); ?>
		
	</div>

<?php endif; ?>