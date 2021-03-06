<?php
/*
Template Name: Research Profile Index
*/
?>
<?php get_header();
global $post; // Setup the global variable $post
$parent_title = get_the_title( $post->post_parent );
$ancestor_url = get_permalink($post->post_parent); 
		$research_profiles_index_query = new WP_Query(array(
			'post_type' => 'profile',
			'posts_per_page' => '-1',
			'post_status'=>'publish',
			'meta_key' => 'ecpt_award_alpha',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $parent_title,
					'operator' => 'IN'
				)
			),

			)); 
	?>

	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="small-12 large-8 large-push-3 columns" role="main">

					<?php if (function_exists('dimox_breadcrumbs') ) { dimox_breadcrumbs();} ?> 
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
												
							<h1 class="page-title"><?php the_title(); ?></h1>
											
						    <div class="entry-content" itemprop="articleBody">

								<?php the_content(); ?>
								<div class="callout secondary">
									<form method="post" action="<?php echo $ancestor_url;?>results/">
										<div class="row">
											<div class="medium-4 columns">
												<label for="affiliation" class="bold inline">Affiliation:
												<select id="affiliation" name="affiliation" class="inline">
													<option value="">Any Affiliation</option>
													<?php $terms = get_terms( array(
																'taxonomy' => array('academicdepartment', 'affiliation'),
																'hide_empty' => false,
													));
																foreach ( $terms as $term ) {
																	echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
													
													} ?>
												</select>
												</label>
											</div>
											<div class="medium-4 columns">
												<label for="award" class="screen-reader-text">Select Year</label>
												<label for="award" class="bold inline">Select Year
												<select id="award" name="award">
													<option value="">Any Year</option>
													<?php $award_years = get_meta_values('ecpt_class_year');
													echo $award_years;
														foreach ($award_years as $award_year) {
															echo '<option value"' . $award_year . '">' . $award_year . '</option>';
													} ?>
												</select>
												</label>
											</div>
											<div class="medium-3 columns">
												<div class="input-group-button">
													<input type="submit" class="button search" value="Search" />
												</div>
											</div>
										</div>
									</form>
								</div>
								
							</div> <!-- end article section -->
												
						</article> <!-- end article -->						
						
					<?php endwhile; endif; ?>	
					<ul id="directory">
						<?php while ($research_profiles_index_query->have_posts()) : $research_profiles_index_query->the_post(); ?>
							<?php get_template_part( 'parts/loop', 'indexed-profile' ); ?>
						<?php endwhile; ?>
					</ul>					
				
			</main> <!-- end #main -->
		    
		    <aside class="small-12 large-3 large-pull-9 columns"> 
				
				<?php get_template_part( 'parts/nav', 'sidebar' ); ?>
					
					<!-- Page Specific Sidebar -->
					<?php if ( have_posts()) : while ( have_posts() ) : the_post(); 
						$sidebar = get_post_meta($post->ID, 'ecpt_page_sidebar', true);
						dynamic_sidebar($sidebar);
					endwhile; endif; wp_reset_query();
					?>
					<!-- END Page Specific Sidebar -->

			</aside>
		
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>