<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Glaze_Blog_Lite
 */

get_header();

$single_layout = glaze_blog_lite_single_layout();

glaze_blog_lite_single_breadcrumb_wrapper();

	?>
	<div class="innerpage-content-area-wrap <?php glaze_blog_lite_single_layout_class(); ?>">
        <?php 
        if( glaze_blog_lite_social_share() != false ) {
            
            glaze_blog_lite_social_share();
        }
        ?>
        <div class="gb-container">
        	<div class="single-content-container">
	            <div class="row">
	                <?php
	                $sidebar_position = glaze_blog_lite_sidebar_position();
	                if( $sidebar_position == 'left' && is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {
	                    get_sidebar();
	                }
	                ?>
	                <div class="<?php glaze_blog_lite_main_container_class(); ?>">
	                    <div id="primary" class="primary-widget-area content-area">
	                        <main id="main" class="site-main">
	                            <div class="single-page-entry">
	                            	<?php
	                            	while( have_posts() ) :

	                            		the_post();

	                            		if( $single_layout == "layout_two" ) {

	                            			get_template_part( 'template-parts/single/single', 'two' );
	                            		} else {
	                            			get_template_part( 'template-parts/single/single', 'one' );
	                            		}

	                            		glaze_blog_lite_post_navigation();

									    get_template_part( 'template-parts/content', 'author' );

									    get_template_part( 'template-parts/content', 'related' );

									    // If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
										    ?>
											<div class="container">
											    <div class="comments-box-entry">
											        <button id="load-comments"><?php esc_html_e( 'Load Comments', 'glaze-blog-lite' ); ?></button>
											    </div><!-- .comments-box-entry -->
											</div><!-- .container -->
									    	<?php
									    endif;
	                            		
	                    			endwhile;
	                        		?>
	                            </div><!-- .single-page-entry -->
	                        </main><!-- #main.site-main -->
	                    </div><!-- #primary.primary-widget-area.content-area -->
	                </div><!-- .col -->
	                <?php 
	                if( $sidebar_position == 'right' && is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {
	                    get_sidebar();
	                }
	                ?>
	            </div><!-- .row -->
	        </div><!-- .single-content-container -->
        </div><!-- .gb-container -->
    </div><!-- .innerpage-content-area-wrap.single-page-style-2 -->
    <?php
    while( have_posts() ) :
    	
    	the_post();

    	// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
		    ?>
	    	<div class="canvas-aside" id="comment-canvas">
	            <div class="canvas-inner">
	            	<?php comments_template(); ?>
	            </div><!-- .canvas-inner -->
	        </div><!-- .comment-canvas -->
	        <div class="canvas-aside-mask"></div>
    		<?php
    	endif;
    endwhile;

get_footer();
