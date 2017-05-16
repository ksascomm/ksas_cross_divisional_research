<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="row">
	
			<main id="main" class="small-12 large-9 columns" role="main">
				<h1 class="page-title">
					<?php _e('Search Results for:', 'jointstheme'); ?> 
					<strong><?php echo esc_attr(get_search_query()); ?></strong>
				</h1>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'search-results' ); ?>
				    
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
				
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
			    <?php endif; ?>

		    </main> <!-- end #main -->

		    <aside class="sidebar small-12 large-3 columns hide-for-print" id="sidebar1"> 
				<div class="widget widget_text">
					<h4 class="widgettitle">Search Krieger Network?</h4>			
					<div class="textwidget">
						<p>You are currently searching on <strong><?php echo bloginfo('name') ;?></strong>. Would you like to search the entire <a href="http://krieger.jhu.edu/search/?q=<?php echo esc_attr(get_search_query()); ?>">Kreiger network?</a></p>
					</div>
				</div>
			</aside>
		
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
