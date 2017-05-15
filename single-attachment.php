<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="small-12 large-9 large-push-3 columns" role="main">
			

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
										
					<header class="article-header">	
						<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?>
						</h1>
				    </header> <!-- end article header -->
									
				    <section class="entry-content" itemprop="articleBody">
						<p>
							<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
									<?php the_title(); ?>
							</a>
						</p>
						<h3>Description:</h3>
						<?php the_excerpt(); ?>
					</section> <!-- end article section -->
																	
				</article> <!-- end article -->
		   	
		    <?php endwhile; endif; ?>

		</main> <!-- end #main -->


	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>