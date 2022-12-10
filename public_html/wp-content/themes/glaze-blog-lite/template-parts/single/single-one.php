<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Glaze_Blog_Lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	glaze_blog_lite_post_thumbnail(); 

	if( get_post_type() === 'post' ) {

		$display_cats = glaze_blog_lite_get_option( 'display_post_cats' );
		$display_date = glaze_blog_lite_get_option( 'display_post_date' );
		$display_author = glaze_blog_lite_get_option( 'display_post_author' );
		
		if( $display_cats == true || $display_author == true || $display_date == true ) {
			?>
			<div class="single-metas-and-cats">
			    <?php glaze_blog_lite_categories_meta( $display_cats ); ?>
			    <div class="entry-metas">
			        <ul>
			            <?php glaze_blog_lite_posted_on( $display_date ); ?>
			            <?php glaze_blog_lite_posted_by( $display_author ); ?>
			        </ul>
			    </div><!-- .entry-metas -->
			</div><!-- .single-metas-and-cats -->
			<?php
		}
	}
	?>
	<div class="single-page-entry">
	    <div class="editor-entry	">
	        <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glaze-blog-lite' ),
                'after'  => '</div>',
            ) );
            ?>
	    </div><!-- .editor-entry.dropcap -->
	    <?php 
	    if( get_post_type() === 'post' ) {

		    $display_tags = glaze_blog_lite_get_option( 'display_post_tags' );

		    glaze_blog_lite_tags_meta( $display_tags );
		}

		if ( get_edit_post_link() ) :

			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'glaze-blog-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		endif;
		?>
	</div><!-- .single-page-entry -->
</article><!-- #post-<?php the_ID(); ?> -->