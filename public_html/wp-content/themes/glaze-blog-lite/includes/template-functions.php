<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Glaze_Blog_Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function glaze_blog_lite_body_classes( $classes ) {

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {

		$classes[] = 'no-sidebar';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	$sidebar_position = glaze_blog_lite_sidebar_position();

	if( $sidebar_position == 'none' ) {

		$classes[] = 'no-sidebar';
	}

	// Adds a class of boxed when site layout is boxed.
	$site_layout = glaze_blog_lite_get_option( 'site_layout' );

	if( $site_layout === 'boxed' ) {

		$classes[] = 'boxed';
	}

	return $classes;
}
add_filter( 'body_class', 'glaze_blog_lite_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function glaze_blog_lite_pingback_header() {

	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'glaze_blog_lite_pingback_header' );


/**
 * Add custom class for main container containing posts.
 */
if( ! function_exists( 'glaze_blog_lite_main_container_class' ) ) {

	function glaze_blog_lite_main_container_class() {

		$container_class = '';

		$sidebar_position = glaze_blog_lite_sidebar_position();

		$sticky_enabled = glaze_blog_lite_sticky_sidebar_enabled();

		if( $sidebar_position == 'none' || !is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {

			if( is_singular()|| is_404() ) {

				$container_class = 'col-12';
			} else {
				$container_class = 'col-lg-8 col-md-12 aligncenter';
			}			
		} else {

			$container_class = 'col-lg-8 col-md-12';
		}

		if( $sticky_enabled == true && $sidebar_position != 'none' ) {

			$container_class .= ' sticky-portion';
		}

		echo esc_attr( $container_class );
	}
}


/**
 * Add custom class for sidebar.
 */
if( ! function_exists( 'glaze_blog_lite_sidebar_class' ) ) {

	function glaze_blog_lite_sidebar_class() {

		$sidebar_class = 'col-lg-4 col-md-12';
		$sticky_enabled = glaze_blog_lite_sticky_sidebar_enabled();

		if( $sticky_enabled == true ) {
			$sidebar_class .= ' sticky-portion';
		}

		$enable_for_small_devices = glaze_blog_lite_get_option( 'enable_sidebar_small_devices' );
		if( $enable_for_small_devices != true ) {
			$sidebar_class .= ' hide-medium';
		}
		echo esc_attr( $sidebar_class );
	}
}


/**
 * Add custom class for post thumbnail container.
 */
if( ! function_exists( 'glaze_blog_lite_thumbnail_class' ) ) {

	function glaze_blog_lite_thumbnail_class() {

		$thumbnail_container_class = '';
		$sidebar_position = glaze_blog_lite_sidebar_position();
		if( $sidebar_position == 'none' || !is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {
			$thumbnail_container_class = 'center-align';
			echo esc_attr( $thumbnail_container_class );
		}		
	}
}


/**
 * Add custom class for excerpt container.
 */
if( ! function_exists( 'glaze_blog_lite_dropcap_class' ) ) {

	function glaze_blog_lite_dropcap_class() {

		if( is_home() ) {
			$enable_dropcap = glaze_blog_lite_get_option( 'blog_enable_dropcap' );
			if( $enable_dropcap == true ) {
				$dropcap_class = 'dropcap';
				echo esc_attr( $dropcap_class );
			}
		}

		if( is_archive() ) {
			$enable_dropcap = glaze_blog_lite_get_option( 'archive_enable_dropcap' );
			if( $enable_dropcap == true ) {
				$dropcap_class = 'dropcap';
				echo esc_attr( $dropcap_class );
			}
		}

		if( is_search() ) {
			$enable_dropcap = glaze_blog_lite_get_option( 'search_enable_dropcap' );
			if( $enable_dropcap == true ) {
				$dropcap_class = 'dropcap';
				echo esc_attr( $dropcap_class );
			}
		}
	}
}


/**
 * Add custom class for single layout.
 */
if( ! function_exists( 'glaze_blog_lite_single_layout_class' ) ) {

	function glaze_blog_lite_single_layout_class() {

		$single_layout = glaze_blog_lite_single_layout();

		$single_layout_class = 'single-page-style-1';

		if( is_front_page() ) {
			$single_layout_class = 'single-page-style-1';
		} else {
			if( $single_layout == 'layout_two' ) {
				$single_layout_class = 'single-page-style-2';
			} else {
				$single_layout_class = 'single-page-style-1';
			}
		}

		echo esc_attr( $single_layout_class );
	}
}


/**
 * Function that defines template for banner/slider.
 */
if( ! function_exists( 'glaze_blog_lite_banner' ) ) {

	function glaze_blog_lite_banner() {

		$display_carousel = glaze_blog_lite_get_option( 'display_carousel' );

		if( $display_carousel == true ) {

			$carousel_post_cat = glaze_blog_lite_get_option( 'carousel_category' );
			$carousel_post_no = glaze_blog_lite_get_option( 'carousel_item_no' );

			$display_carousel_content = glaze_blog_lite_get_option( 'carousel_hide_content' );

			$carousel_args = array( 
				'post_type' => 'post', 
				'ignore_sticky_posts' => true, 
				'posts_per_page' => $carousel_post_no, 
				'category_name' => $carousel_post_cat 
			);

			$carousel_query = new WP_Query( $carousel_args );

			if( $carousel_query->have_posts() ) :
				$enable_spacing = glaze_blog_lite_get_option( 'carousel_enable_spacing' );
				$carousel_layout = glaze_blog_lite_get_option( 'carousel_layout' );

				$spacing_class = '';
				if( $enable_spacing == true ) {
					$spacing_class = 'carousel-spacing';
				} else {
					$spacing_class = 'no-carousel-spacing';
				}

				$carousel_class = '';
				if( $carousel_layout == 'carousel_one' ) {
					$carousel_class = 'slider-1';
				} else {
					$carousel_class = 'slider-1-single';
				}
				?>
				<div class="gb-banner banner-style-1 <?php echo esc_attr( $spacing_class ); ?>">
		            <div class="banner-inner">		            	
		                <div class="slider-tweak <?php echo esc_attr( $carousel_class ); ?>">
		                	<?php
		                	/**
		                	 * Loop for listing carousel items
		                	 */
		                	while( $carousel_query->have_posts() ) :

		                		$carousel_query->the_post();

		                		$carousel_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

		                		if( ! empty( $carousel_img_url ) ) :
		                			?>
				                    <div class="item">
				                    	<?php
				                    	$enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );			
			
										if( $enable_lazy_loading == true ) {
											?>	
				                        	<div class="post-thumb lazyload lazyloading" data-bg="<?php echo esc_url( $carousel_img_url ); ?>">
				                        	<?php
				                        } else {
				                        	?>
				                        	<div class="post-thumb" style="background-image: url( <?php echo esc_url( $carousel_img_url ); ?> );">
				                        	<?php
				                        }
				                        ?>
				                        	<?php
				                        	if( $display_carousel_content == true ) {
					                        	?>
					                            <div class="content-holder-wrap">
					                                <div class="content-holder">
					                                    <?php glaze_blog_lite_categories_meta( true ); ?>
					                                    <div class="post-title">
					                                        <h2>
					                                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					                                        </h2>
					                                    </div><!-- .post-title -->
					                                    <div class="entry-metas">
					                                        <ul>
					                                            <?php glaze_blog_lite_posted_on( true ); ?>
					                                            <?php glaze_blog_lite_posted_by( true ); ?>
					                                        </ul>
					                                    </div><!-- .entry-metas -->
					                                </div><!-- .content-holder -->
					                            </div><!-- .content-holder-wrap -->
					                            <?php
					                        }
					                        ?>
				                            <div class="mask"></div><!-- .mask -->
				                        </div><!-- .post-thumb -->
				                    </div><!-- .item -->
				                    <?php
				                endif;
			                endwhile;
			                wp_reset_postdata();
			                ?>
		                </div><!-- .banner-1-carousel -->		            
		            </div><!-- .banner-inner -->
		        </div><!-- .gb-banner -->
				<?php
			endif;
		}
	}
}


/**
 * Breadcrumb declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'glaze_blog_lite_breadcrumb' ) ) :

 	function glaze_blog_lite_breadcrumb() {

 		$display_breadcrumb = glaze_blog_lite_get_option( 'display_breadcrumb' ); 

 		if( $display_breadcrumb == true ) {
 			?>
 			<div class="gb-breadcrumb">
                <?php
                $breadcrumb_args = array(
                    'show_browse' => false,
                );
                glaze_blog_lite_breadcrumb_trail( $breadcrumb_args );
	            ?>
            </div><!-- .gb-breadcrumb -->
 			<?php
 		}  		
 	}
endif;



/**
 * Breadcrumb wrapper declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'glaze_blog_lite_breadcrumb_wrapper' ) ) :

 	function glaze_blog_lite_breadcrumb_wrapper() {

 		if( has_header_image() ) : 
            $enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );         
            
            if( $enable_lazy_loading == true ) {
                ?>
                <div class="gb-breadcrumb-wrap lazyload lazyloading" data-bg="<?php header_image(); ?>">
                <?php 
            } else {
                ?>
                <div class="gb-breadcrumb-wrap" style="background-image: url( <?php header_image(); ?> );">
                <?php
            }
        else : 
            ?>
            <div class="gb-breadcrumb-wrap">
          <?php 
        endif; 
        ?>
            <div class="gb-container">
                <div class="the-title">
                	<?php
                	if( is_404() ) {
	                	?>
	                	<h2 class="page-title"><?php esc_html_e( '404 - Page Not Found', 'glaze-blog-lite' ); ?></h2>
	                	<?php
	                }

	                if( is_archive() ) {
	                	the_archive_title( '<h2 class="page-title">', '</h2>' );
	                }

	                if( is_search() ) {
	                	?>
	                	<h2 class="page-title">
	                		<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'glaze-blog-lite' ), '<span>' . get_search_query() . '</span>' );
							?>
	                	</h2>
	                	<?php
	                }

	                if( is_singular() ) {
	                	while( have_posts() ) :

		            		the_post();
		            		?>
		            		<div class="the-title">
			                    <h2 class="page-title"><?php the_title(); ?></h2>
			                </div><!-- .the-title -->
		            		<?php
		            	endwhile;
	                }
	                ?>
                </div><!-- .the-title -->
                <?php glaze_blog_lite_breadcrumb(); ?>
            </div><!-- .gb-container -->
            <div class="mask"></div><!-- .mask -->
        </div><!-- .gb-breadcrumb-wrap -->
        <?php		
 	}
endif;


/**
 * Breadcrumb wrapper declaration for single post or page of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'glaze_blog_lite_single_breadcrumb_wrapper' ) ) :

 	function glaze_blog_lite_single_breadcrumb_wrapper() {

 		if( is_front_page() ) {
 			return;
 		}

 		$single_layout = glaze_blog_lite_single_layout();

		if( $single_layout == 'layout_two' ) {

			?>
			<div class="<?php glaze_blog_lite_single_layout_class(); ?>">
				<?php
			
				$post_thumbnail_url = '';

				while( have_posts() ) {

		        	the_post();

		        	if( has_post_thumbnail() ) {
		        		$post_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		        	}

		        }

				if( !empty( $post_thumbnail_url ) ) {

					$enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );	

					if( $enable_lazy_loading == true ) {
						?>
						<div class="gb-breadcrumb-wrap lazyload lazyloading" data-bg="<?php echo esc_url( $post_thumbnail_url ); ?>">
						<?php
					} else {
						?>
						<div class="gb-breadcrumb-wrap" style="background-image: url( <?php echo esc_url( $post_thumbnail_url ); ?> );">
						<?php
					}
				} else if( has_header_image() ) {

					$enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );	

					if( $enable_lazy_loading == true ) {
						?>
						<div class="gb-breadcrumb-wrap lazyload lazyloading" data-bg="<?php header_image(); ?>">
						<?php
					} else {
						?>
						<div class="gb-breadcrumb-wrap" style="background-image: url( <?php header_image(); ?> );">
						<?php
					}
				} else {
					?>
					<div class="gb-breadcrumb-wrap">
					<?php
				}
				?>
		            <div class="gb-container">
		            	<?php
		            	while( have_posts() ) :

		            		the_post();

		            		if( get_post_type() === 'post' ) {

		            			$display_cats = glaze_blog_lite_get_option( 'display_post_cats' );
		            			glaze_blog_lite_categories_meta( $display_cats ); 
		            		}
		                	?>
			                <div class="the-title">
			                    <h2 class="page-title"><?php the_title(); ?></h2>
			                </div><!-- .the-title -->
			                <?php
			                if( get_post_type() === 'post' ) {
			                	$display_date = glaze_blog_lite_get_option( 'display_post_date' );
			            		$display_author = glaze_blog_lite_get_option( 'display_post_author' );
				                if( $display_author == true || $display_date == true ) :
				                	?>
					                <div class="entry-metas">
					                    <ul>
					                        <?php glaze_blog_lite_posted_on( $display_date ); ?>
											<?php glaze_blog_lite_posted_by( $display_author ); ?>
					                    </ul>
					                </div><!-- .entry-metas -->
					                <?php
					            endif;
					        }
			            endwhile;

			            glaze_blog_lite_breadcrumb();
			            ?>
		            </div><!-- .gb-container -->
		            <div class="mask"></div><!-- .mask -->
		        </div><!-- .gb-breadcrumb-wrap -->
		    </div>
		    <?php			
		} else {

			glaze_blog_lite_breadcrumb_wrapper();
		}
 	}
endif;


/**
 * Function that defines posts pagination.
 */
if( ! function_exists( 'glaze_blog_lite_pagination' ) ) {

	function glaze_blog_lite_pagination() {
		?>
		<div class="gb-patigation gb-patigation-style-1">
            <div class="pagination-entry">
                <?php
	            the_posts_pagination( array(
	        		'mid_size' => 0,
					'prev_text' => esc_html__( 'Prev', 'glaze-blog-lite' ),
					'next_text' => esc_html__( 'Next', 'glaze-blog-lite' ),
	        	) );
	            ?>
            </div><!-- .pagination-entry -->
        </div><!-- .gb-patigation-style-1 -->
		<?php
	}
}


/**
 * Function that defines post navigation.
 */
if( ! function_exists( 'glaze_blog_lite_post_navigation' ) ) {

	function glaze_blog_lite_post_navigation() {
		
		$next_post = get_next_post();

	    $previous_post = get_previous_post();

	    $navigation_args = array();

	    if( !empty( $next_post ) ) {
	    	$navigation_args['next_text'] = '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'glaze-blog-lite' ) . '</span> ' . get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
	    }

	    if( !empty( $previous_post ) ) {
	    	$navigation_args['prev_text'] = get_the_post_thumbnail( $previous_post->ID, 'thumbnail' ) . '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'glaze-blog-lite' ) . '</span>';
	    }

	    the_post_navigation( $navigation_args );
	}
}