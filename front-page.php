<?php get_header(); ?>
	<div id="content">
		<?php
			$theme_option = flagship_sub_get_global_options(); 
			if ( false === ( $slider_query = get_transient( 'slider_query' ) ) ) {
				$slider_query = new WP_Query(array(
					'post_type' => 'slider',
					'posts_per_page' => '2',
					'orderby' => 'menu_order', 
					'order' => 'ASC'));
				set_transient( 'slider_query', $slider_query, 2592000 );
			}	
			if ( $slider_query->have_posts() ) : ?>

			<div class="fullscreen-image-slider hide-for-small-only">			
				<div class="orbit" role="region" aria-label="Highlighted Research Awards" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
					<ul class="orbit-container">
					<?php if ($slider_query->post_count > 1) : ?>
					<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		   			<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
					<?php endif;?>

					<?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
						<li class="orbit-slide">	
							<?php get_template_part('parts/content', 'slider'); ?>
				   		</li>
				   <?php endwhile;?>
				   </ul>
			   </div>
			</div>		   
	 	<?php endif; ?>

		<div id="inner-content" class="row">

		    <main id="main" class="small-12 large-8 columns" role="main">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="margin10">
					<?php $frontpagecontent = the_content(); if($frontpagecontent != '') : ?>
						
							<?php the_content(); ?>	
							
					</div>
					<?php endif; ?>
					
				<?php endwhile; endif; ?>	

			   
			    <?php  //News Query		
					$news_query_cond = $theme_option['flagship_sub_news_query_cond'];
					$news_quantity = $theme_option['flagship_sub_news_quantity']; 
					if ( false === ( $news_query = get_transient( 'news_mainpage_query' ) ) ) {
						if ($news_query_cond === 1) {
							$news_query = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => $news_quantity)); 
						} else {
							$news_query = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => $news_quantity)); 
						}
					set_transient( 'news_mainpage_query', $news_query, 2592000 );
					} 	
				if ( $news_query->have_posts() ) : ?>

				<div class="news-feed">

					<h3><?php echo $theme_option['flagship_sub_feed_name']; ?></h3>

					<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
						
							<?php get_template_part( 'parts/loop', 'news' ); ?>
							
					<?php endwhile; ?>

					 <div class="row">
						<h5 class="black">
							<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
								View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive
							</a>
						</h5>
					</div>
				</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'homepage1' ) && is_active_sidebar( 'homepage2' )  ) : ?>
				    <div class="row" id="hp-buckets">
				    	<div class="small-6 columns hide-for-print" role="complementary">
				    		<div class="primary callout">
				    			<?php dynamic_sidebar('homepage1'); ?>
				    		</div> 
						</div>
						<div class="small-6 columns hide-for-print" role="complementary">
							<div class="primary callout">
				    			<?php dynamic_sidebar('homepage2'); ?>
				    		</div> 
						</div>
				    </div>
				<?php endif;?>

			</main> <!-- end #main -->	

			
				<?php if ( is_active_sidebar( 'sidebar1' ) || is_active_sidebar('homepage0')  ) : ?>
					<aside class="sidebar small-12 large-4 columns hide-for-print" id="sidebar1"> 
						<?php dynamic_sidebar( 'sidebar1' ); ?>
						<?php dynamic_sidebar( 'homepage0' ); ?>
					</aside>
				<?php endif; ?>



		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>