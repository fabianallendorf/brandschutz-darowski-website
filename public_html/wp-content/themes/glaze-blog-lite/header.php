<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glaze_Blog_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="page--wrap">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'glaze-blog-lite' ); ?></a>

		<header class="gb-general-header header-style-1">
	        <div class="header-inner">
	        	<?php

	        	$display_top_header = glaze_blog_lite_get_option( 'display_top_header' );

	        	if( $display_top_header == true ) :
	        		?>
		            <div class="header-top">
		                <div class="gb-container">
		                    <div class="row">
		                    	<?php
		                    	if( has_nav_menu( 'menu-2' ) ) :
		                    		?>
		                        	<div class="col-lg-7 col-md-6 col-sm-12">
			                            <div class="secondary-navigation">
			                                <?php 
			                                wp_nav_menu( array(
			                                	'theme_location' => 'menu-2',
								 				'container' => '', 
								 				'depth' => 1,
								 			) );
			                                ?>
			                            </div><!-- .secondary-navigation -->
		                        	</div><!-- .col -->
		                        	<?php
		                        endif;
		                        ?>
		                        <div class="col-lg-5 col-md-6 col-sm-12">
		                            <div class="social-icons">
		                                <ul class="social-icons-list">
		                                	<?php
		                                	$facebook_link = glaze_blog_lite_get_option( 'header_facebook_link' );
		                                	if( !empty( $facebook_link ) ) :
		                                		?>
		                                		<li>
		                                			<a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		                                		</li>
		                                		<?php
		                                	endif;

		                                	$twitter_link = glaze_blog_lite_get_option( 'header_twitter_link' );
		                                	if( !empty( $twitter_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $instagram_link = glaze_blog_lite_get_option( 'header_instagram_link' );
		                                	if( !empty( $instagram_link ) ) :
		                                		?>
		                                		<li>
		                                			<a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		                                		</li>
		                                		<?php
		                                	endif;

		                                	$pinterest_link = glaze_blog_lite_get_option( 'header_pinterest_link' );
		                                	if( !empty( $pinterest_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $youtube_link = glaze_blog_lite_get_option( 'header_youtube_link' );
		                                	if( !empty( $youtube_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $google_plus_link = glaze_blog_lite_get_option( 'header_google_plus_link' );
		                                	if( !empty( $google_plus_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $google_plus_link ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $linkedin_link = glaze_blog_lite_get_option( 'header_linkedin_link' );
		                                	if( !empty( $linkedin_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $linkedin_link ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;

		                                    $vk_link = glaze_blog_lite_get_option( 'header_vk_link' );
		                                	if( !empty( $vk_link ) ) :
		                                		?>
		                                    	<li>
		                                    		<a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
		                                    	</li>
		                                    	<?php
		                                    endif;
		                                    ?>
		                                </ul><!-- .social-icons-list -->
		                            </div><!-- .social-icons -->
		                        </div><!-- .col -->
		                    </div><!-- .row -->
		                </div><!-- .gb-container -->
		            </div><!-- .header-top -->
		            <?php
		        endif;
		        ?>
	            <div class="mid-header">
	                <div class="gb-container">
	                    <div class="site-branding">
	                    	<?php
	                    	if( has_custom_logo() ) :

	                    		the_custom_logo();
	                    	else :
	                    		?>
	                    		<h1 class="site-title">
	                    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	                    		</h1><!-- .site-title -->
	                    		<?php
	                        	$glaze_blog_lite_description = get_bloginfo( 'description', 'display' );
								if ( $glaze_blog_lite_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $glaze_blog_lite_description ); /* WPCS: xss ok. */ ?></p><!-- .site-description -->
									<?php 
								endif;
	                    	endif;
	                    	?>                        
	                    </div><!-- .site-branding -->
	                </div><!-- .gb-container -->
	            </div><!-- .mid-header -->
	            <div class="header-bottom">
	                <div class="main-menu-wrapper">
	                    <div class="gb-container">
	                        <div class="menu-toggle">
	                        	<span class="hamburger-bar"></span>
	                        	<span class="hamburger-bar"></span>
	                        	<span class="hamburger-bar"></span>
	                        </div><!-- .menu-toggle -->
	                        <nav id="site-navigation" class="site-navigation">
	                        	<?php
	                        	$menu_args = array(
						 			'theme_location' => 'menu-1',
						 			'container' => '',
						 			'menu_class' => 'primary-menu',
									'menu_id' => '',
									'fallback_cb' => 'glaze_blog_lite_navigation_fallback',
						 		);
								wp_nav_menu( $menu_args );
	                        	?>
	                        </nav><!-- #site-navigation.site-navigation -->
	                    </div><!-- .gb-container -->
	                </div><!-- .main-menu-wrapper -->
	            </div><!-- .header-bottom -->
	        </div><!-- .header-inner -->
	    </header><!-- .gb-general-header.header-style-1 -->
