<?php
/**
 * Template part for displaying posts
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogger">
		<?php if(has_post_thumbnail()) { ?>
			<div class="post-image">
			    <?php the_post_thumbnail(); ?>
		 	</div>
 		<?php } ?>
 		<h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
 		<div class="post-info">
			<i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"> <?php echo esc_html(get_the_date()); ?></span>
		    <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
		    <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','shams-solar'), __('0 Comments','shams-solar'), __('% Comments','shams-solar') ); ?></span>
		</div>
    	<p><?php the_excerpt();?></p>
	  	<div class="post-link">
	  		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_attr_e( 'READ MORE','shams-solar' ); ?></a>
	  	</div>
	</div>
</div>
