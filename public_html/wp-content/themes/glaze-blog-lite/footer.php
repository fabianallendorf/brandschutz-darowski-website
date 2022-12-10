<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glaze_Blog_Lite
 */

?>

		<footer class="footer dark secondary-widget-area">
            <div class="footer-inner">
                <?php
                $display_scroll_top = glaze_blog_lite_get_option( 'display_scroll_top_two' );

                if( $display_scroll_top == true || ( is_active_sidebar( 'glaze-blog-lite-footer-left' ) || is_active_sidebar( 'glaze-blog-lite-footer-middle' ) || is_active_sidebar( 'glaze-blog-lite-footer-right' ) ) ) :
                    ?>
                    <div class="footer-top">
                        <div class="gb-container">
                            <?php
                            if( $display_scroll_top == true ) :
                                ?>
                                <div class="footer-back-to-top">
                                    <a class="footer-btp" href="#"><span><i class="fa fa-angle-up" aria-hidden="true"></i></span> <span><?php esc_html_e( 'Back to top', 'glaze-blog-lite' ); ?></span></a>
                                </div><!-- .footer-back-to-top -->
                                <?php
                            endif;

                            if( is_active_sidebar( 'glaze-blog-lite-footer-left' ) || is_active_sidebar( 'glaze-blog-lite-footer-middle' ) || is_active_sidebar( 'glaze-blog-lite-footer-right' ) ) :
        	                    ?>
        	                    <div class="footer-widget-area">
        	                        <div class="row">
                                        <?php
                                        if( is_active_sidebar( 'glaze-blog-lite-footer-left' ) ) {
                                            ?>
                                            <div class="col-lg-4 col-md-12">
                                                <?php dynamic_sidebar( 'glaze-blog-lite-footer-left' ); ?>
                                            </div>
                                            <?php
                                        }

                                        if( is_active_sidebar( 'glaze-blog-lite-footer-middle' ) ) {
                                            ?>
                                            <div class="col-lg-4 col-md-12">
                                                <?php dynamic_sidebar( 'glaze-blog-lite-footer-middle' ); ?>
                                            </div>
                                            <?php
                                        }

                                        if( is_active_sidebar( 'glaze-blog-lite-footer-right' ) ) {
                                            ?>
                                            <div class="col-lg-4 col-md-12">
                                                <?php dynamic_sidebar( 'glaze-blog-lite-footer-right' ); ?>
                                            </div>
                                            <?php
                                        }
                                        ?>        	                            
        	                        </div><!-- .row -->
        	                    </div><!-- .footer-widget-area -->
        	                    <?php
        	                endif;
        	                ?>
                        </div><!-- .gb-container -->
                    </div><!-- .footer-top -->
                    <?php
                endif;
                ?>
                <div class="footer-bottom">
                    <div class="gb-container">
                        <div class="row">
                            <?php
                            $copyright_text = glaze_blog_lite_get_option( 'copyright_text' );

                            if( !empty( $copyright_text ) ) :
                                ?>
                                <div class="col-lg-6">
                                    <div class="copyright-information">
                                        <p><?php echo esc_html( $copyright_text ); ?></p>
                                    </div><!-- .copyright-information -->
                                </div><!-- .col -->
                                <?php
                            endif;
                            ?>
                            <div class="col-lg-6">
                                <div class="author-credit">
                                    <p> 
                                        <?php
                                        /* translators: 1: Theme name, 2: Theme author. */
                                        printf( esc_html__( '%1$s Theme By %2$s', 'glaze-blog-lite' ), 'Glaze Blog', '<a href="' . esc_url( 'https://perfectwpthemes.com/' ) . '" target="_blank">'. esc_html__( 'Perfectwpthemes', 'glaze-blog-lite' ) . '</a>' );
                                        ?>
                                    </p>
                                </div><!-- .author-credit -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .gb-container -->
                </div><!-- .footer-bottom -->
            </div><!-- .footer-inner -->
        </footer><!-- .footer.secondary-widget-area -->
	</div><!-- .page--wrap -->

<?php wp_footer(); ?>

</body>
</html>
