<?php
/*
Template Name: Research Profile Index
*/
?>
<?php get_header();
global $post; // Setup the global variable $post
$parent_title = get_the_title( $post->post_parent );
$ancestor_url = get_permalink($post->post_parent);

$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
	if ( false === ( $research_profile_index_query = get_transient( 'research_profile_index_query_' . $paged ) ) ) {
		// It wasn't there, so regenerate the data and save the transient
		$research_profile_index_query = new WP_Query(array(
			'post_type' => 'profile',
			'posts_per_page' => '25',
			'post_status'=>'publish',
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $parent_title,
					'operator' => 'IN'
				)
			),

			)); 
			set_transient( 'research_profile_index_query_' . $paged, $research_profile_index_query, 2592000 );
	} 	
	?>

	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="small-12 large-8 large-push-3 columns" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
												
							<h1 class="page-title"><?php the_title(); ?></h1>
											
						    <div class="entry-content" itemprop="articleBody">

								<?php the_content(); ?>

								<form method="post" action="<?php echo $ancestor_url;?>results/">
									<input type="text" name="keyword" id="id_search" placeholder="Search by name or keyword"  />
									<label for="id_search" class="screen-reader-text">
										Search by name or keyword
									</label>
									<div class="row">
										<div class="medium-5 columns">
											<label for="id_search" class="screen-reader-text">Search by affiliation</label>
											<label for="affiliation" class="bold inline">Affiliation:
											<select id="affiliation" name="affiliation" class="inline">
												<option value="">Any Affiliation</option>
												<?php $taxonomies = array('academicdepartment', 'affiliation');
												$terms = get_terms($taxonomies, array(
															'hide_empty' => 1,
												));
															foreach ( $terms as $term ) {
																echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
												
												} ?>
											</select>
											</label>
										</div>
										<div class="medium-5 columns">
											<label for="award" class="screen-reader-text">Select Year</label>
											<label for="affiliation" class="bold inline">Select Year
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
										<div class="medium-2 columns">
											<div class="input-group-button">
												<input type="submit" class="button" value="Search" />
											</div>
										</div>
									</div>
								</form>
								
							</div> <!-- end article section -->
												
						</article> <!-- end article -->						
						
					<?php endwhile; endif; ?>	
					<ul id="directory">
						<?php while ($research_profile_index_query->have_posts()) : $research_profile_index_query->the_post(); ?>
							<?php get_template_part( 'parts/loop', 'indexed-profile' ); ?>
						<?php endwhile; ?>
					</ul>	
					
					<div class="paged row">
						<?php flagship_pagination($research_profile_index_query->max_num_pages); ?>		
					</div>					
				
			</main> <!-- end #main -->
		    
		    <div class="small-12 large-3 large-pull-9 columns" role="navigation"> 
				
				<?php get_template_part( 'parts/nav', 'sidebar' ); ?>
					
					<!-- Page Specific Sidebar -->
					<?php if ( have_posts()) : while ( have_posts() ) : the_post(); 
						$sidebar = get_post_meta($post->ID, 'ecpt_page_sidebar', true);
						dynamic_sidebar($sidebar);
					endwhile; endif; wp_reset_query();
					?>
					<!-- END Page Specific Sidebar -->

			</div>
		
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>