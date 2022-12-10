<?php
/**
 * Template part for displaying author detail
 *
 * @package Glaze_Blog_Lite
 */

$display_related_section = glaze_blog_lite_get_option( 'display_related_section' );

if( $display_related_section == true ) :

    $related_posts_no = glaze_blog_lite_get_option( 'related_posts_no' );

    $related_query_args = array(
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
    );

    if( absint( $related_posts_no ) > 0 ) {
        $related_query_args['posts_per_page'] = absint( $related_posts_no );
    } else {
        $related_query_args['posts_per_page'] = 4;
    }

    $current_object = get_queried_object();

    if ( $current_object instanceof WP_Post ) {

        $current_id = $current_object->ID;

        if ( absint( $current_id ) > 0 ) {

            // Exclude current post.
            $related_query_args['post__not_in'] = array( absint( $current_id ) );

            // Include current posts categories.
            $categories = wp_get_post_categories( $current_id );

            if ( ! empty( $categories ) ) {

                $related_query_args['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $categories,
                        'operator' => 'IN',
                    )
                );
            }
        }
    }

    $related_query = new WP_Query( $related_query_args );

    if( $related_query->have_posts() ) :

        $related_section_title = glaze_blog_lite_get_option( 'related_section_title' );

        $display_author_meta = glaze_blog_lite_get_option( 'display_related_author_meta' );

        ?>
        <div class="related-posts">
            <div class="related-inner">
                <?php
                if( !empty( $related_section_title ) ) :
                    ?>
                    <div class="title">
                        <h3><?php echo esc_html( $related_section_title ); ?></h3>
                    </div><!-- .title -->
                    <?php
                endif;
                ?>
                <div class="related-entry">
                    <div class="row">
                        <?php
                        while( $related_query->have_posts() ) :

                            $related_query->the_post();
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="box">
                                    <?php
                                    if( has_post_thumbnail() ) :
                                        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'glaze-blog-lite-thumbnail-two' );
                                        ?>
                                        <div class="left-box">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                $enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );
                    
                                                if( $enable_lazy_loading == true ) {
                                                    ?>  
                                                    <div class="post-thumb lazyload lazyloading" data-bg="<?php echo esc_url( $thumbnail_url ); ?>"></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="post-thumb" style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"></div>
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                        </div><!-- .left-box -->
                                        <?php
                                    endif;
                                    ?>
                                    <div class="right-box">
                                        <div class="post-title">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div><!-- .post-title -->
                                        <div class="entry-metas">
                                            <ul>
                                                <?php glaze_blog_lite_posted_by( $display_author_meta ); ?>
                                            </ul>
                                        </div><!-- .entry-metas -->
                                    </div><!-- .right-box -->
                                </div><!-- .box -->
                            </div><!-- .col -->
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div><!-- .row -->
                </div><!-- .related-entry -->
            </div><!-- .related-inner -->
        </div><!-- .related-posts -->
        <?php
    endif;
endif;