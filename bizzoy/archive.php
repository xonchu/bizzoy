<?php
       /**
       * The template for displaying all archive post.
       *
       * This is the template that displays all posts by default.
       * Please note that this is the WordPress construct of posts
       * and that other 'posts' on your WordPress site will use a
       * different template.
       *
       * @package bizzoy 
       */
       get_header();
        bizzoy_breadcrumbs();
       ?> 

        <section class="blog-section large-section gray-section">
            <div class="container-fluid blog-layout-sidebar-wrapper">
                <div class="row blog-layout-sidebar recent-posts">
                    <div class="col-xl-8 col-md-8 col-sm-12">
                      <?php if(have_posts()) : ?>
                       <?php while(have_posts()) : the_post(); ?>
                        <article class="blog-card-wrapper ">
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php get_template_part('template-parts/content', get_post_format()); ?>
                            </div>
                        </article>
                          <?php endwhile; 

                          else : 
                              get_template_part( 'template-parts/content', 'none' );
                          endif; 

                           the_posts_pagination(); ?>
                    </div>
                   <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
        <?php get_footer(); ?>