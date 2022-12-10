<?php
/**
 * Template part for displaying author detail
 *
 * @package Glaze_Blog_Lite
 */

$display_author_section = glaze_blog_lite_get_option( 'display_author_section' );

if( $display_author_section == true ) :
    ?>
    <div class="author-box">
        <div class="top-wrap">
            <div class="author-thumb">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
            </div><!-- .author-thumb -->
            <div class="author-name">
                <h3><?php echo esc_html( get_the_author() ); ?></h3>
                <?php
                if( glaze_blog_lite_author_title() != false ) {

                    glaze_blog_lite_author_title();
                }
                ?>
            </div><!-- .author-name -->
        </div><!-- .top-wrap -->
        <div class="author-details">
            <?php
            $author_description = get_the_author_meta( 'description' );
            if( !empty( $author_description ) ) :
                ?>
                <div class="author-desc">
                    <p><?php echo esc_html( $author_description ); ?></p>
                </div><!-- .author-desc -->
                <?php
            endif;

            if( glaze_blog_lite_author_links() != false ) {

                glaze_blog_lite_author_links();
            }
            ?>
        </div><!-- .author-details -->
    </div><!-- .author-box -->
    <?php
endif;