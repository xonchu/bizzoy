    <div class="card-content hover3d-child">
      <div class="card-blog-header">
        <?php if(has_post_thumbnail()) : ?>
        <div class="img-wrapper d-flex align-items-center justify-content-center">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
        </div>
        <?php endif; ?>
      </div>
      <div class="card-blog-body">
        <span>
          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="blog-by-img"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '140'); ?>
            <?php echo esc_html__('By','bizzoy'); ?>
            <?php the_author(); ?>
          </a>
        </span>

        <?php if ( is_single() ) :
        echo esc_html( the_title( '<h5>', '</h5>' ));
        else :
        echo esc_html(the_title( '<h5><a href="' . esc_url( get_permalink() ) . '">', '</a></h5>' ));
        endif;
        ?>

         <?php the_excerpt();
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bizzoy' ),
          'after'  => '</div>',
        ) );
        ?>

        <div class="card-blog-footer d-flex justify-content-between align-items-end">
            <ul class="meta-blog-list">
             <?php bizzoy_posted_on(); ?>
            </ul>
          <p class="info d-flex align-items-end">
            <span>
              <a href="<?php echo esc_url(the_permalink()); ?>" class="blog-more-btn">
                <?php echo esc_html__('Read More','bizzoy'); ?>
              </a>
            </span>
          </p>
        </div>
      </div>
    </div>