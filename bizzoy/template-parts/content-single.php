      <div class="post-content">
        <?php if(has_post_thumbnail()) : ?>
         <div class="post-thumb-wrapper">
           <?php the_post_thumbnail(); ?>
          </div>
          <?php endif; ?>
          <?php
          if ( is_singular() ) :
            echo esc_html(the_title( '<h4 class="post-title"">', '</h4>' ));
          else :
            echo esc_html(the_title( '<h4 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ));
          endif;
          ?>
          
            <ul class="meta-blog-list">
               <?php 
                  bizzoy_posted_by();
                  bizzoy_posted_on(); 
                  bizzoy_comment();
                ?>
            </ul>
             <?php 
            the_content( sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bizzoy' ),
                array(
                      'span' => array(
                        'class' => array(),
                      ),
                    )
                  ),
                      get_the_title()
                    ) );

                    wp_link_pages( array(
                      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bizzoy' ),
                      'after'  => '</div>',
                    ) );
                ?>
      </div>
          <div class="description-box d-flex">
            <div class="tags">
              <?php if (has_tag()) : ?>
              <div class="d-flex tags-wrapper">
                <?php $seperator = ''; // blank instead of comma ?>
                <?php echo esc_html(' ', 'bizzoy' ); ?>
                <?php the_tags( $seperator,'&nbsp;'); ?>
              </div>
              <?php endif; ?>
            </div>                  
          </div>
<?php bizzoy_entry_footer(); ?>