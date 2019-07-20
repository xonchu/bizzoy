<?php
/*
Template Name: Home Page
*/

if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();

		$bizzoy_slider_section     = get_theme_mod( 'bizzoy_slider_section_hideshow','hide');
        $bizzoy_slider_no        = 3;
        $bizzoy_slider_pages      = array();
        for( $i = 1; $i <= $bizzoy_slider_no; $i++ ) {
        $bizzoy_slider_pages[]    =  get_theme_mod( "bizzoy_slider_page_$i", 1 );
        $bizzoy_slider_btntxt[]    =  get_theme_mod( "bizzoy_slider_btntxt_$i", '' );
        $bizzoy_slider_btnurl[]    =  get_theme_mod( "bizzoy_slider_btnurl_$i", '' );
        $bizzoy_slider_btntxt2[]    =  get_theme_mod( "bizzoy_slider_btntxt2_$i", '' );
        $bizzoy_slider_btnurl2[]    =  get_theme_mod( "bizzoy_slider_btnurl2_$i", '' );
        }
        $bizzoy_slider_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $bizzoy_slider_pages ),
        'posts_per_page' => absint($bizzoy_slider_no),
        'orderby' => 'post__in'
        ); 
        $bizzoy_slider_query = new wp_Query( $bizzoy_slider_args );
        if ($bizzoy_slider_section =='show' && $bizzoy_slider_query->have_posts() ) { ?>
        <section class="hero-header hero-default dark_overlay bg_img" data-section-type="slider_default">
          <div class="swiper-container swiper-hero">
            <div class="swiper-wrapper">
              <?php
                $count = 0;
                while($bizzoy_slider_query->have_posts()) :
                $bizzoy_slider_query->the_post();
                ?>
              <?php if($count%2==0){ ?>
              <div class="swiper-slide bg_img" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                <div class="container hero-content hero-center d-flex align-items-center">
                  <div class="content-default">
                    <h2 class="display-3 content-heading bold-heading">
                      <?php the_title(); ?>
                    </h2>
                      <?php the_excerpt(); ?>
                      <?php
                        if (!empty($bizzoy_slider_btntxt[$count])) {
                        ?>
                      <a href="<?php echo esc_url($bizzoy_slider_btnurl[$count]); ?>" class="button-default-color hero-btn">
                        <?php echo esc_html($bizzoy_slider_btntxt[$count]); ?>
                      </a>
                      <?php } ?>
                      <?php
                        if (!empty($bizzoy_slider_btntxt2[$count])) {
                        ?>
                      <a href="<?php echo esc_url($bizzoy_slider_btnurl2[$count]); ?>" class="button-default-white hero-btn">
                        <i class="fa fa-th-large">
                        </i>
                        <?php echo esc_html($bizzoy_slider_btntxt2[$count]); ?>
                      </a>
                      <?php } ?>
                  </div>
                </div>
              </div>
              <?php } 
                else {
                ?>
              <div class="swiper-slide bg_img" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                <div class="container hero-content d-flex align-items-center">
                  <div class="content-default">
                    <h2 class="display-3 content-heading bold-heading">
                      <?php the_title(); ?>
                    </h2>
                      <?php the_content(); ?>
                    <?php
                    if (!empty($bizzoy_slider_btntxt[$count])) {
                    ?>
                    <a href="<?php echo esc_url($bizzoy_slider_btnurl[$count]); ?>" class="button-default-color hero-btn">
                      <?php echo esc_html($bizzoy_slider_btntxt[$count]); ?>
                    </a>
                    <?php } ?>
                    <?php
                    if (!empty($bizzoy_slider_btntxt2[$count])) {
                    ?>
                    <a href="<?php echo esc_url($bizzoy_slider_btnurl2[$count]); ?>" class="button-default-white hero-btn">
                      <i class="fa fa-th-large">
                      </i>
                      <?php echo esc_html($bizzoy_slider_btntxt2[$count]); ?>
                    </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>       
              <?php
                $count = $count + 1;
                endwhile;
                wp_reset_postdata();
                ?>    
            </div>   
          </div>
          <div class="swiper-pagination-bullets-default">
          </div>
          <div class="swiper-button-prev-default">
            <i class="fa fa-angle-left">
            </i>
          </div>
          <div class="swiper-button-next-default">
            <i class="fa fa-angle-right">
            </i>
          </div>
          </div>
        </section>

        <?php }
else
{?>
 <header class="page-header">
            <div class="overlay-dark"></div>
            <div class="container breadcrumbs-wrapper">
                <div class="breadcrumbs d-flex flex-column justify-content-center">
                     <?php if (is_home() || is_front_page()) { ?>
                      <h3><?php echo esc_html__('Home', 'bizzoy') ?></h3>
                      <?php } ?>
                    <div>
                    </div>
                </div>
            </div>
        </header>
        <?php }


   ?>
        <?php
        $bizzoy_services_section = get_theme_mod( 'bizzoy_services_section_hideshow','hide');
        $bizzoy_services_title   =  get_theme_mod('bizzoy_services_title');  
        $bizzoy_services_no        = 6;
        $bizzoy_services_pages      = array();
        $bizzoy_services_icons     = array();
        for( $i = 1; $i <= $bizzoy_services_no; $i++ ) {
        $bizzoy_services_pages[]    =  get_theme_mod( "bizzoy_service_page_$i", 1 );
        $bizzoy_services_icons[]    = get_theme_mod( "bizzoy_page_service_icon_$i", '' );
        }
        $bizzoy_services_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $bizzoy_services_pages ),
        'posts_per_page' => absint($bizzoy_services_no),
        'orderby' => 'post__in'
        ); 
        $bizzoy_services_query = new wp_Query( $bizzoy_services_args );
        if( $bizzoy_services_section == "show") :
        ?>
        <section class="content-section-type-2 flip-section large-section gray-section">
          <div class="container">
            <div class="row">
              <?php if($bizzoy_services_title != "")
               {?>
              <div class="col d-flex justify-content-center">
                <h2 class="section-title text-center title-divider">
                  <?php echo esc_html(get_theme_mod('bizzoy_services_title')); ?>
                </h2>
              </div>
              <?php  } ?> 
            </div>
          </div>
          <div class="container">
            <div class="icon-boxes-type-2">
              <div class="row justify-content-center">
                <?php
                    $count = 0;
                    while($bizzoy_services_query->have_posts() && $count <= 5 ) :
                    $bizzoy_services_query->the_post();
                 ?>
                <div class="col-md-6 col-xl-4 icon-box-wrapper hover3d-wrapper">
                  <div class="icon-box d-flex flex-column hover3d-child">
                    <?php if($bizzoy_services_icons[$count] !=""){ ?>
                    <i class="fa <?php echo esc_attr($bizzoy_services_icons[$count]); ?>">
                    </i>
                    <?php } ?>
                    <h5>
                      <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h5>
                    <?php the_content(); ?>
                  </div>
                </div>
                <?php
                    $count = $count + 1;
                    endwhile;
                    wp_reset_postdata();
                ?>     
              </div>
            </div>
          </div>
        </section> 
        <?php endif; ?>


            <?php  
    $bizzoy_blog_title =  get_theme_mod('bizzoy_blog_title');  
    $bizzoy_blog_section = get_theme_mod('bizzoy_blog_section_hideshow','show');
    if ($bizzoy_blog_section =='show') { 
    ?>
    <section class="recent-posts gray-section large-section">
      <div class="container">
        <div class="container">
          <div class="row">
            <?php if($bizzoy_blog_title != "")
              {?>
            <div class="col d-flex justify-content-center">
              <h2 class="section-title text-center title-divider">
                <?php echo esc_html(get_theme_mod('bizzoy_blog_title')); ?>
              </h2>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="row blog-wrapper">
          <?php 
            $bizzoy_latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
            if ( $bizzoy_latest_blog_posts->have_posts() ) : 
            while ( $bizzoy_latest_blog_posts->have_posts() ) : $bizzoy_latest_blog_posts->the_post(); 
           ?>
          <div class="col-lg-4">
            <div class="blog-card-wrapper">
              <div class="card-content hover3d-child">
                <div class="card-blog-header">
                  <?php
                    if(has_post_thumbnail()){ ?>
                  <div class="img-wrapper d-flex align-items-center justify-content-center">
                    <a href="blog-single-post-sidebar-layout.html">
                      <?php the_post_thumbnail();  ?>
                    </a>
                  </div>
                  <?php }  ?>
                </div>
                <div class="card-blog-body">
                  <span>
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="blog-by-img"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '140'); ?>
                      <?php echo esc_html__('By','bizzoy'); ?> :
                      <?php the_author(); ?>
                    </a>
                  </span>
                  <h5>
                    <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                    </a>
                  </h5>
                  <?php the_excerpt() ?>
                  <div class="card-blog-footer d-flex justify-content-between     align-items-end">
                    <p class="date d-flex align-items-end">
                      <i class="fas fa-calendar-alt">
                      </i>
                      <?php echo  get_the_date(); ?>
                    </p>
                    <p class="info d-flex align-items-end">
                      <span>
                        <a href="<?php the_permalink(); ?>" class="blog-more-btn">
                          <?php echo esc_html__('Read More','bizzoy'); ?>
                        </a>
                      </span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; 
            endif; 
            ?>
        </div>
      </div>
    </section>
    <?php } ?>
        <?php
    $bizzoy_contact_section_hideshow = get_theme_mod('bizzoy_contact_section_hideshow','hide');
    if ($bizzoy_contact_section_hideshow =='show') { ?>
    <?php $bizzoy_ctah_btn_text = get_theme_mod('bizzoy_ctah_btn_text1'); ?>
    <?php $bizzoy_ctah_btn_url = get_theme_mod('bizzoy_ctah_btn_url1'); ?>     
    <?php $bizzoy_ctah_callout_text = get_theme_mod('bizzoy_ctah_heading'); ?> 
    <section id="looking-consultant">
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="submit-ticket">
              <h2>
                <?php echo esc_html($bizzoy_ctah_callout_text); ?>
              </h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-4   responsive-pt-50">
            <?php if (!empty($bizzoy_ctah_btn_text)) { ?>
            <div class="submit-ticket text-right">
              <a href="<?php echo esc_url($bizzoy_ctah_btn_url); ?>" class="btn submit-ticket-btn">
                <?php echo esc_html($bizzoy_ctah_btn_text); ?>
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </section>
    <?php } ?>
   <?php
	   get_footer();
	 ?>