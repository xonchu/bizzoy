<?php
       /**
       * The template for displaying all pages.
       *
       * This is the template that displays all pages by default.
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
                    <?php if(have_posts()) : ?>
                     <?php while(have_posts()) : the_post(); ?>
                    <div class="col-xl-8 col-md-8 col-sm-12 single-post-wrapper">
                      <div class="content-page">
                      <?php if(has_post_thumbnail()) : ?>
                       <?php the_post_thumbnail(); ?>&nbsp;
                       <?php endif; ?>


                        <?php the_content();

                           wp_link_pages( array(
                             'before' => '<div class="page-links">' . esc_html__('Pages: ', 'bizzoy' ),
                            'after'  => '</div>',
                            ) );
                              ?>

                            </div>
                    </div>
                     <?php endwhile; ?>
                     <?php endif; ?>
                    
                      <?php get_sidebar(); ?>
                       
                </div>
            </div>
        </section>
        <?php 
          if ( comments_open() || get_comments_number() ) :
              comments_template();
          endif; 
        ?>
        <?php get_footer(); ?>