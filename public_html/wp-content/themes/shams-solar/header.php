<?php
/**
 * The header for our theme 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'shams-solar' ) ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<div class="main-header">
			<div class="container">
				<div class="topbar">
					<div class="row m-0">
						<div class="col-lg-8 col-md-12">
							<?php if( get_theme_mod( 'shams_solar_contact_number','' ) != '') { ?>
				                <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('shams_solar_contact_number','' )); ?></span>
				            <?php } ?>
				            <?php if( get_theme_mod( 'shams_solar_email_address','' ) != '') { ?>
				                <span class="email"><i class="far fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('shams_solar_email_address','') ); ?></span>
				            <?php } ?>
				            <?php if( get_theme_mod( 'shams_solar_time','' ) != '') { ?>
				                <span class="time"><i class="far fa-clock" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('shams_solar_time','') ); ?></span>
				            <?php } ?>
				        </div>
						<div class="social-icon col-lg-4 col-md-12">
							<?php if( get_theme_mod( 'shams_solar_facebook_url') != '' | get_theme_mod( 'shams_solar_twitter_url') != '' | get_theme_mod( 'shams_solar_youtube_url') != '' | get_theme_mod( 'shams_solar_google_plus_url') != '' | get_theme_mod( 'shams_solar_linkedin_url') != '' ) { ?>
								<span><?php esc_html_e('Follow us:','shams-solar') ?></span>
								<?php if( get_theme_mod( 'shams_solar_facebook_url') != '') { ?>
								    <a href="<?php echo esc_url( get_theme_mod( 'shams_solar_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'shams_solar_twitter_url') != '') { ?>
								    <a href="<?php echo esc_url( get_theme_mod( 'shams_solar_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'shams_solar_youtube_url') != '') { ?>
								    <a href="<?php echo esc_url( get_theme_mod( 'shams_solar_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'shams_solar_google_plus_url') != '') { ?>
								    <a href="<?php echo esc_url( get_theme_mod( 'shams_solar_google_plus_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i></a>
								<?php } ?>
								<?php if( get_theme_mod( 'shams_solar_linkedin_url') != '') { ?>
								    <a href="<?php echo esc_url( get_theme_mod( 'shams_solar_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
								<?php } ?>
							<?php }?>
						</div>
					</div>
				</div>
				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<div class="navigation-top">
						<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content">