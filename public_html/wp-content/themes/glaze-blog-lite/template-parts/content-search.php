<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Glaze_Blog_Lite
 */
$display_featured_image = glaze_blog_lite_get_option( 'search_display_feat_img' );
$display_date = glaze_blog_lite_get_option( 'search_display_date' );
$display_categories = glaze_blog_lite_get_option( 'search_display_cats' );
$display_author = glaze_blog_lite_get_option( 'search_display_author' );
$display_comments_no = glaze_blog_lite_get_option( 'search_display_comments_no' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="top-wrap">
        <?php glaze_blog_lite_categories_meta( $display_categories ); ?>
        <div class="post-title">
            <h3>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </div><!-- .post-title -->
    </div><!-- .top-wrap -->
    <?php
    if( has_post_thumbnail() && $display_featured_image == true ) {
        ?>
        <div class="post-thumb imghover <?php glaze_blog_lite_thumbnail_class(); ?>">
            <?php glaze_blog_lite_post_thumbnail(); ?>
            <?php
            if( get_post_type() === 'post' ) :
                ?>
                <div class="ribbon-meta-date">
                    <div class="entry-metas">
                        <ul>
                            <?php glaze_blog_lite_posted_date( $display_date ); ?>
                        </ul>
                    </div><!-- .entry-metas -->
                </div><!-- .ribbon-meta-date -->
                <?php
            endif;
            ?>
        </div><!-- .post-thumb -->
        <?php
    }
    ?>
    <div class="bottom-wrap">
        <div class="the-content <?php glaze_blog_lite_dropcap_class(); ?>">
            <?php the_excerpt(); ?>
        </div><!-- .the-content -->
        <?php
        if( get_post_type() === 'post' && ( $display_author == true || $display_comments_no == true || glaze_blog_lite_social_share() != false ) ) :
            ?>
            <div class="share-and-comment">
                <div class="row">
                    <div class="col">
                        <div class="entry-metas">
                            <ul>
                                <?php glaze_blog_lite_posted_by( $display_author ); ?>
                            </ul>
                        </div><!-- .entry-metas -->
                    </div><!-- .col -->
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
        endif;
        ?>
    </div><!-- .bottom-wrap -->
</article><!-- #post-<?php the_ID(); ?> -->