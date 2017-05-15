<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="small-12 large-9 large-push-3 columns" role="main">
			

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
										
					<header class="article-header">	
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						<h5 class="black" itemprop="datePublished"><?php the_date(); ?></h5>
				    </header> <!-- end article header -->
									
				    <section class="entry-content" itemprop="articleBody">
						<p class="lead"><?php if( get_post_meta($post->ID, 'ecpt_pull_quote', true)) { echo get_post_meta($post->ID, 'ecpt_pull_quote', true); } ?></p>
						<?php if ( has_post_thumbnail()) { ?> 
							<?php the_post_thumbnail('full', array('class'	=> "floatleft", 'itemprop' => 'image')); ?>
						<?php } ?>						
						<?php the_content();?>
					</section> <!-- end article section -->
																	
				</article> <!-- end article -->
		   	
		    <?php endwhile; endif; ?>

		</main> <!-- end #main -->
	
		<div class="small-12 large-3 large-pull-9 columns hide-for-print" role="navigation"> 
				<?php get_template_part( 'parts/nav', 'sidebar' ); ?>
		</div>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>