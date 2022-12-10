<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Glaze_Blog_Lite
 */

if ( ! function_exists( 'glaze_blog_lite_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function glaze_blog_lite_posted_on( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);

			echo '<li class="posted-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></li>'; // WPCS: XSS OK.
		}
	}
endif;

if( ! function_exists( 'glaze_blog_lite_posted_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function glaze_blog_lite_posted_date( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

			echo '<li class="posted-date"><span class="posted-date-month">' . esc_html( get_the_date( __( 'd M', 'glaze-blog-lite' ) ) ) . '</span><span class="posted-year">' .esc_html( get_the_date( __( 'Y', 'glaze-blog-lite' ) ) )  . '</span></li>';
		}
	}
endif;  

if ( ! function_exists( 'glaze_blog_lite_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function glaze_blog_lite_posted_by( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

			$byline = sprintf(
				/* translators: %s: post author. */
				esc_html_x( 'by %s', 'post author', 'glaze-blog-lite' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
			);

			echo '<li class="posted-by">' . $byline . '</li>'; // WPCS: XSS OK.
		}
	}
endif;


if ( ! function_exists( 'glaze_blog_lite_comments_no_meta' ) ) :
	/**
	 * Prints HTML with meta information for no of comments.
	 */
	function glaze_blog_lite_comments_no_meta( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

        	if( ( comments_open() || get_comments_number() ) ) {
        		?>
        		<li class="comment">
        			<a href="<?php the_permalink(); ?>">
        				<?php 
        				if( get_comments_number() <= 1 ) {
        					if( get_comments_number() == 0 ) {
        						echo esc_html__( 'Leave a comment', 'glaze-blog-lite' );
        					} else {
		        				/* translators: %s: comments number. */
		        				printf( esc_html__( "%s comment", 'glaze-blog-lite' ), absint( get_comments_number() ) ); 
		        			}
	        			} else {
	        				/* translators: %s: comments number. */
	        				printf( esc_html__( "%s comments", 'glaze-blog-lite' ), absint( get_comments_number() ) ); 
	        			}
        				?>
        			</a>
        		</li>
	          	<?php
	        }
	    }
	}
endif;


if( ! function_exists( 'glaze_blog_lite_categories_meta' ) ) :
	/*
	 * Prints HTML with meta information for post categories.
	 */
	function glaze_blog_lite_categories_meta( $display_meta ) {

		if( $display_meta == true ) {

			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list();

				if ( $categories_list ) {
					echo '<div class="entry-cats">' . wp_kses_post( $categories_list ) . '</div>'; // WPCS: XSS OK.
				}
			}
		}
	}
endif;


if( ! function_exists( 'glaze_blog_lite_tags_meta' ) ) :
	/*
	 * Prints HTML with meta information for post categories.
	 */
	function glaze_blog_lite_tags_meta( $display_meta ) {

		if( $display_meta == true  ) {

			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();

				if ( $tags_list ) {
					echo '<div class="entry-tags"><div class="post-tags">' . wp_kses_post( $tags_list ) . '</div></div>'; // WPCS: XSS OK.
				}
			}
		}
	}
endif;


if ( ! function_exists( 'glaze_blog_lite_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function glaze_blog_lite_post_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {

			$enable_featured_image = glaze_blog_lite_get_option( 'display_post_feat_img' );
			if( $enable_featured_image == true ) {
				?>
				<div class="post-media-wrap">
				    <div class="post-media-entry standard">
				        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
				    </div><!-- .post-media-entry -->
				</div><!-- .post-media-wrap -->
				<?php 
			}

		} else {

			$enable_featured_image = true;

			if( is_home() ) {
				$enable_featured_image = glaze_blog_lite_get_option( 'blog_display_feat_img' );
			} 

			if( is_archive() ) {
				$enable_featured_image = glaze_blog_lite_get_option( 'archive_display_feat_img' );
			}


			if( is_search() ) {
				$enable_featured_image = glaze_blog_lite_get_option( 'search_display_feat_img' );
			}

			if( $enable_featured_image == true ) {

				$enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );			
				
				if( $enable_lazy_loading == true ) {

					$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'glaze-blog-lite-thumbnail-one' );

					if( !empty( $thumbnail_url ) ) {
						?>
						<a href="<?php the_permalink(); ?>" class="lazy-thumb lazyloading">
			                <img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo esc_url( $thumbnail_url ); ?>" data-srcset="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php glaze_blog_lite_thumbnail_alt_text( get_the_ID() ); ?>">
			                <noscript>
			                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" srcset="<?php echo esc_url( $thumbnail_url ); ?>" class="image-fallback" alt="<?php glaze_blog_lite_thumbnail_alt_text( get_the_ID() ); ?>">
			                </noscript>
			            </a>
		                <?php
		            }
	            } else {
	            	?>
	            	<a href="<?php the_permalink(); ?>">
	            		<?php the_post_thumbnail( 'glaze-blog-lite-thumbnail-one', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
	            	</a>
	            	<?php
	            }
	        }
		}
	}
endif;
