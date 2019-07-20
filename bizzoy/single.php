<?php
       /**
       * The template for displaying single pages.
       *
       * This is the template that displays single pages by default.
       * Please note that this is the WordPress construct of pages
       * and that other 'pages' on your WordPress site will use a
       * different template.
       *
       * @package bizzoy 
       */
       get_header();
        bizzoy_breadcrumbs();
       ?>
  
 <section class="white-section blog-section single-post-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-md-8 col-sm-12 single-post-wrapper">
                       <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php  get_template_part( 'template-parts/content', 'single' ); ?>
                         <?php endwhile; ?>
                         <?php endif; ?>
                    </div>
                     <?php get_sidebar(); ?>
                </div>
            </div>
              <?php 
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif; 
              ?> 
 </section>
        <?php get_footer(); ?>