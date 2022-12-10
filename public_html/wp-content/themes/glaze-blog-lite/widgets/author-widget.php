<?php
/**
 * Author Widget Class
 *
 * @package Glaze_Blog_Lite
 */

if( ! class_exists( 'Glaze_Blog_Lite_Author_Widget' ) ) {
    
    class Glaze_Blog_Lite_Author_Widget extends WP_Widget {
 
        function __construct() { 

            parent::__construct(
                'glaze-blog-lite-author-widget',  // Widget ID
                esc_html__( 'GBL: Author Widget', 'glaze-blog-lite' ),   // Widget Name
                array(
                    'description' => esc_html__( 'Displays brief author detail.', 'glaze-blog-lite' ), 
                )
            );
     
        }
     
        public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
                
            $author_page = !empty( $instance['author_page'] ) ? $instance['author_page'] : ''; 

            $author_link_title = !empty( $instance['author_link_title'] ) ? $instance['author_link_title'] : ''; 

            $author_args = array(
                'post_type' => 'page',
                'posts_per_page' => 1,
            ); 

            if( $author_page > 0 ) {
                $author_args['page_id'] = absint( $author_page );
            }

            $author = new WP_Query( $author_args );

            if( $author->have_posts() ) :

                while( $author->have_posts() ) : 

                    $author->the_post();
                    ?>
                    <div class="widget gb-author-widget">
                        <?php
                        if( !empty( $title ) ) :
                            ?>
                            <div class="widget_title">
                                <h3><?php echo esc_html( $title ); ?></h3>
                            </div><!-- .widget_title -->
                            <?php
                        endif;
                        ?>
                        <div class="widget-container">
                            <?php
                            if( has_post_thumbnail() ) :
                                ?>
                                <div class="author-thumb">
                                    <?php
                                    $enable_lazy_loading = glaze_blog_lite_get_option( 'enable_lazy_loading' );          
    
                                    if( $enable_lazy_loading == true ) {

                                        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'glaze-blog-lite-thumbnail-two' );

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
                                            <?php the_post_thumbnail( 'glaze-blog-lite-thumbnail-two', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div><!-- .author-thumb -->
                                <?php
                            endif;
                            ?>
                            <div class="author-bio">
                                <?php the_excerpt(); ?>
                            </div><!-- .author-bio -->
                            <?php
                            if( !empty( $author_link_title ) ) :  
                                ?>
                                <div class="author-permalink">
                                    <a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><span><?php echo esc_html( $author_link_title ); ?></span><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                </div><!-- .auhtor-permalink -->
                                <?php
                            endif;
                            ?>
                        </div><!-- .widget-container -->
                    </div><!-- .widget.gb-author-widget -->
                    <?php
                endwhile;
                wp_reset_postdata();               
            endif;
        }
     
        public function form( $instance ) {
            $defaults = array(
                'title' => '',
                'author_page' => '',
                'author_link_title' => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'glaze-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'author_page' ) )?>"><strong><?php esc_html_e( 'Author Page', 'glaze-blog-lite' ); ?></strong></label>
                <?php
                    wp_dropdown_pages( array(
                        'id'               => esc_attr( $this->get_field_id( 'author_page' ) ),
                        'class'            => 'widefat',
                        'name'             => esc_attr( $this->get_field_name( 'author_page' ) ),
                        'selected'         => esc_attr( $instance[ 'author_page' ] ),
                        'show_option_none' => esc_html__( '&mdash; Select Page &mdash;', 'glaze-blog-lite' ),
                        )
                    );
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_link_title') ); ?>">
                    <strong><?php esc_html_e('Author Page Link Title', 'glaze-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_link_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_link_title') ); ?>" type="text" value="<?php echo esc_attr( $instance['author_link_title'] ); ?>" />   
            </p>
            <?php 
        }
     
        public function update( $new_instance, $old_instance ) {
     
            $instance = $old_instance;

            $instance['title']              = sanitize_text_field( $new_instance['title'] );

            $instance['author_page']        = absint( $new_instance['author_page'] );

            $instance['author_link_title']  = sanitize_text_field( $new_instance['author_link_title'] );

            return $instance;
        } 
    }   
}