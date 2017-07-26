<img class="orbit-image" src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" alt="<?php the_title(); ?>">
    <figcaption class="orbit-caption">
      <h1><?php the_title(); ?></h1>
      <p><?php echo get_the_content(); ?></p>
		   <?php if (get_post_meta($post->ID, 'ecpt_link_destination', true) ) : ?>
			<h4>
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_link_destination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_link_destination', true); ?>')" id="post-<?php the_ID(); ?>" class="button"><?php echo get_post_meta($post->ID, 'ecpt_link_button_text', true);?><span class="fa fa-arrow-circle-o-right"></span></a> 
			</h4>
			<?php endif;?>
    </figcaption>