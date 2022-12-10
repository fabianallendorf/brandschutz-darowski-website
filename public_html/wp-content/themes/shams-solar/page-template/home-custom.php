<?php
/**
 * Template Name: Home Custom Page
 */

get_header(); ?>

<?php do_action( 'shams_solar_before_slider' ); ?>

<?php if( get_theme_mod('shams_solar_slider_arrows') != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'shams_solar_slide_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title();?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( shams_solar_string_limit_words( $excerpt,30 ) ); ?></p>
              <div class ="readbutton">
                <a href="<?php the_permalink(); ?>"> <i class="far fa-hand-point-right"></i><?php echo esc_html(get_theme_mod('shams_solar_slide_page',__('Discover More','shams-solar'))); ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
      </a>
    </div> 
    <div class="clearfix"></div>
  </section> 
<?php }?> 

<?php do_action( 'shams_solar_after_slider' ); ?>

<?php if( get_theme_mod('shams_solar_service_section_title') != '' || get_theme_mod('shams_solar_service_section_category') != '' || get_theme_mod('shams_solar_text') != ''){ ?>
  <section id="services">
    <div class="container">
      <?php if( get_theme_mod('shams_solar_service_section_title') != ''){ ?>
        <h3><?php echo esc_html(get_theme_mod('shams_solar_service_section_title','')); ?>
        </h3>
        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/headline.png'); ?>" alt="">
      <?php }?>
      <div class="row">
        <?php 
          $catData=  get_theme_mod('shams_solar_service_section_category');
            if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'shams-solar')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="service-box">
                    <div class="service-para">
                      <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( shams_solar_string_limit_words( $excerpt,15 ) ); ?></p>
                    </div>
                    <h4><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?></a></h4>
                  </div>
                </div>
                <?php endwhile;
              wp_reset_postdata();
            } ?>
      </div>
    </div>
  </section>
<?php }?>

<?php do_action( 'shams_solar_after_services' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post();?>
    <?php the_content(); ?>
  <?php endwhile; // End of the loop.
  wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>