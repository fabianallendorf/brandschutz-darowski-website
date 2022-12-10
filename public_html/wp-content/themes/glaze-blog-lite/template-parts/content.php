<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Glaze_Blog_Lite
 */
$display_featured_image = glaze_blog_lite_get_option( 'display_post_feat_img' );
$display_date = glaze_blog_lite_get_option( 'blog_display_date' );
$display_author = glaze_blog_lite_get_option( 'blog_display_author' );
$display_categories = glaze_blog_lite_get_option( 'blog_display_cats' );
$display_comments_no = glaze_blog_lite_get_option( 'blog_display_comments_no' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="top-wrap">
        <?php glaze_blog_lite_categories_meta( $display_categories ); ?>
        <div class="post-title">
            <h3>
            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </div><!-- .post-title -->
        <div class="entry-metas">
            <ul>
                <?php glaze_blog_lite_posted_on( $display_date ); ?>
                <?php glaze_blog_lite_posted_by( $display_author ); ?>
            </ul>
        </div><!-- .entry-metas -->
    </div><!-- .top-wrap -->
    <?php
    if( has_post_thumbnail() && $display_featured_image == true ) {
	    ?>
	    <div class="post-thumb imghover <?php glaze_blog_lite_thumbnail_class(); ?>">
	        <?php glaze_blog_lite_post_thumbnail(); ?>
	    </div><!-- .post-thumb -->
	    <?php
	}
	?>
    <div class="bottom-wrap">
        <div class="the-content <?php glaze_blog_lite_dropcap_class(); ?>">
            <?php the_excerpt(); ?>
        </div><!-- .the-content -->
        <?php 
        if( $display_comments_no == true || glaze_blog_lite_social_share() != false ) {
            ?>
            <div class="share-and-comment">
                <div class="row">
                    <?php
                    if( glaze_blog_lite_social_share() != false ) :
                        
                        glaze_blog_lite_social_share();
                    endif;
                    ?>
                    <div class="col">
                        <div class="entry-metas">
                            <ul>
                                <?php glaze_blog_lite_comments_no_meta( $display_comments_no ); ?>
                            </ul>
                        </div><!-- .entry-metas -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .share-and-comment -->
            <?php
        }
        ?>
    </div><!-- .bottom-wrap -->
</article><!-- #post-<?php the_ID(); ?> -->