<?php
/*
Template Name: Research Profile Search Results
*/
?>
<?php get_header(); 
global $post; // Setup the global variable $post
$parent_title = get_the_title( $post->post_parent );
$ancestor_url = get_permalink($post->post_parent); ?>

	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="small-12 large-8 large-push-3 columns" role="main">	
				<?php if (function_exists('dimox_breadcrumbs') ) { dimox_breadcrumbs();} ?> 
				<?php if(empty($_POST['keyword']) == false) {
					$keyword = $_POST['keyword'];
					$keyword_query = array('s' => $keyword); }
				else {
					$keyword_query = array();
				}
				
				if(empty($_POST['affiliation']) == false) {
					$affiliation = $_POST['affiliation'];
					$affiliation_query = array(
					'tax_query' => array(
								'relation' => 'OR',
								array(
								'taxonomy' => 'academicdepartment',
								'field' => 'slug',
								'terms' => $affiliation,
								),
								array(
								'taxonomy' => 'affiliation',
								'field' => 'slug',
								'terms' => $affiliation
								))
					);
					}
				else {
					$affiliation_query = array();
				}
				
				if(empty($_POST['award']) == false) {
					$year = $_POST['award'];
					$year_query = array(
						'meta_query' => array(
								array(
									'key' => 'ecpt_class_year',
									'value' => $year,
								))); }
				else {
					$year_query = array();
				}
				
				$standard_args = array(
							'post_type' => 'profile',
							'posts_per_page' => '10',
							'post_status'=>'publish',
							'meta_key' => 'ecpt_award_alpha',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'paged' => $paged,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => $parent_title,
									'operator' => 'IN'
								)
							),					

							);
				$query_args = array_merge($standard_args, $affiliation_query, $year_query, $keyword_query); 

				$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
				$research_search_results_query = new WP_Query($query_args);  	?>
					
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<h1><?php the_title();?></h1>
					<div class="callout secondary">
						<form method="post" action="<?php echo $ancestor_url;?>results/">
							<div class="row">
								<div class="medium-4 columns">
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
								<div class="medium-4 columns">
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
								<div class="medium-3 columns">
									<div class="input-group-button">
										<input type="submit" class="button search" value="Search" />
									</div>
								</div>
							</div>
						</form>
					</div>

				<?php the_content(); ?>
			<?php endwhile; endif; ?>

			<?php if ($research_search_results_query->have_posts()) : while ($research_search_results_query->have_posts()) : $research_search_results_query->the_post(); ?>
				<ul id="directory">
					<?php get_template_part( 'parts/loop', 'indexed-profile' ); ?>
				</ul>
				<?php endwhile; ?>
			<?php else :?>
				<h2> No Results</h2>
				<style>
					.sidenav {display: none;}
				</style>
			<?php endif;?>
				
			<div class="row">
				<?php flagship_pagination($research_search_results_query->max_num_pages); ?>		
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