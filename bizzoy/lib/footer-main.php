<?php
/**
 * bizzoy Theme footer
 *
 * @package bizzoy
 */


            $bizzoy_footer_section_hideshow = get_theme_mod("bizzoy_footer_section_hideshow", 'show');
            $bizzoy_social_icon_url_1 = get_theme_mod( "bizzoy_social_icon_url_1", '' );
            $bizzoy_social_icon_url_2 = get_theme_mod( "bizzoy_social_icon_url_2", '' );
            $bizzoy_social_icon_url_3 = get_theme_mod( "bizzoy_social_icon_url_3", '' );
            $bizzoy_social_icon_url_4 = get_theme_mod( "bizzoy_social_icon_url_4", '' );
            $bizzoy_social_icon_url_5 = get_theme_mod( "bizzoy_social_icon_url_5", '' );

            if( $bizzoy_footer_section_hideshow == 'show' ) :
             ?>
            <div class="footer-inner ">
                <div class="container">
                    <div class="footer-social d-flex">
                        <?php if ( $bizzoy_social_icon_url_1 ): ?>
                        <div class="social-box">
                            <a href="<?php echo esc_url( $bizzoy_social_icon_url_1 ); ?>">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if ( $bizzoy_social_icon_url_2 ): ?>
                        <div class="social-box">
                            <a href="<?php echo esc_url( $bizzoy_social_icon_url_2 ); ?>">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if ( $bizzoy_social_icon_url_3 ): ?>
                        <div class="social-box">
                            <a href="<?php echo esc_url( $bizzoy_social_icon_url_3 ); ?>">
                               <i class="fab fa-tumblr"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if ( $bizzoy_social_icon_url_4 ): ?>
                        <div class="social-box">
                            <a href="<?php echo esc_url( $bizzoy_social_icon_url_4 ); ?>">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if ( $bizzoy_social_icon_url_5 ): ?>
                        <div class="social-box">
                            <a href="<?php echo esc_url( $bizzoy_social_icon_url_5 ); ?>">
                                <i class="fab fa-vk"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="footer-copyright">
                        <?php
                         $footer_copyright = get_theme_mod('bizzoy_footer_text','<p>'.__( '<a href="https://wordpress.org">powered by WordPress</a> | Theme: <a>Bizzoy</a> by WordPress', 'bizzoy' ).'</p>');
                        ?>

                        <p><?php echo wp_kses_post($footer_copyright); ?></p>
                       
                        </a>
                    </div>
                </div>
            </div>
          <?php endif; ?>