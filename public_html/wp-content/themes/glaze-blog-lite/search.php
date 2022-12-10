<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Glaze_Blog_Lite
 */

get_header();

glaze_blog_lite_breadcrumb_wrapper();
	?>
	<div class="search-page-content-area-wrap">
	    <div class="gb-container">
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
	                        <div class="archive-page-style-1-entry">
	                            <?php
                            	if( have_posts() ) :
	                            	?>
	                                <div class="posts-list-style-1">
	                                    <?php
										/* Start the Loop */
										while ( have_posts() ) :

											the_post();

											/*
											 * Include the Post-Type-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
											 */
											get_template_part( 'template-parts/content', 'search' );

										endwhile;
										?>
	                                </div><!-- .posts-list-style-1 -->
	                                <?php 

	                                glaze_blog_lite_pagination(); 

	                            else:

	                            	get_template_part( 'template-parts/content', 'none' );
	                            endif;
	                            ?>
	                        </div><!-- .archive-page-style-1-entry -->
	                    </main><!-- #main.site-main -->
	                </div><!-- #primary.primary-widget-area.content-area -->
	            </div><!-- .col -->
	            <?php 
                if( $sidebar_position == 'right' && is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {
                    get_sidebar();
                }
                ?>
	        </div><!-- .row -->
	    </div><!-- .gb-container -->
	</div><!-- .search-page-content-area-wrap -->
	<?php
get_footer();
