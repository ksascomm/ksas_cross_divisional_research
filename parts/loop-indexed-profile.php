<li class="person">
	<div class="row">
		<article class="small-11 columns centered" aria-labelledby="post-<?php the_ID(); ?>">
			<h3 class="no-margin">
			<a id="post-<?php the_ID(); ?>" href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			
			<ul class="menu vertical">
				<?php if ( get_post_meta($post->ID, 'ecpt_class_year', true) ) : ?>
				<li><strong>Year:&nbsp;</strong>
					<?php echo get_post_meta($post->ID, 'ecpt_class_year', true); ?>
				</li>
				<?php endif; ?>
				<?php if (has_term('','academicdepartment', $post->ID) == true || has_term('','affiliation', $post->ID) == true) { ?>
				<li><strong>Affiliations:</strong>
					<?php } ?>
					<?php 	//Get the Academic Department Names
					$terms = get_the_terms( $post->ID, 'academicdepartment' );
					if ( $terms && ! is_wp_error( $terms ) ) :
					$dept_name_array = array();
					foreach ( $terms as $term ) {
					$dept_name_array[] = $term->name;
					}
					$dept_name = join( ", ", $dept_name_array );
					echo $dept_name; endif;
					//Get the Affiliation Names
					$terms_2 = get_the_terms( $post->ID, 'affiliation' );
					if ( $terms_2 && ! is_wp_error( $terms_2 ) ) :
					$affil_name_array = array();
					foreach ( $terms_2 as $term_2 ) {
					$affil_name_array[] = $term_2->name;
					}
					$affil_name = join( ", ", $affil_name_array );
					if (has_term('','academicdepartment', $post->ID) == true) { echo ','; }
					echo ' ' . $affil_name; ?>
				</li>	
				<?php endif;?>
				<?php if ( get_post_meta($post->ID, 'ecpt_pull_quote', true) ) : ?>
				<li><strong>Topic:&nbsp;</strong><?php echo strip_tags(get_post_meta($post->ID, 'ecpt_pull_quote', true)); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_article_list', true) || get_post_meta($post->ID, 'ecpt_research_pdf', true) || get_post_meta($post->ID, 'ecpt_video', true) ) : ?>
				<li>Multimedia:&nbsp;
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_article_list', true) || get_post_meta($post->ID, 'ecpt_research_pdf', true) ) : ?>
				<span class="fa fa-newspaper-o"></span>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_video', true) ) : ?>
				<span class="fa fa-video-camera"></span>
				<?php endif; ?>
				</li>
				<?php if ( get_post_meta($post->ID, 'ecpt_award_name', true) ) : ?>
				<li>
					<?php echo get_post_meta($post->ID, 'ecpt_award_name', true); ?>
				</li>
				<?php endif; ?>
			</ul>
			</article>
		</div>
	</li>