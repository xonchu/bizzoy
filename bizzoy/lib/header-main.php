<?php
/**
 * bizzoy Theme header
 *
 * @package bizzoy
 */

?>
    <nav class="navbar navbar-default desktop-menu logo-left header-type-one">
            <div class="container-fluid navbar-inner">
                 <div class="navbar-logo">
                    <?php if (has_custom_logo()) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php the_custom_logo(); ?>
                        </a>
                        <?php  
                            else : 
                             if (display_header_text()==true){ ?>
                              
                             <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link d-flex align-items-center">
                                <h2 class="blogtitle">
                                <?php bloginfo( 'title' ); ?>
                                </h2>
                             </a>
                             <?php } endif; ?>
                 </div>
                 <div class="navbar-menu">
                     <?php if ( has_nav_menu('primary')) {
                     wp_nav_menu( 
                            array(
                               'container'        => 'ul', 
                               'theme_location'    => 'primary', 
                               'menu_class'        => 'navbar-menu-list', 
                               'items_wrap'        => '<ul class="navbar-menu-list">%3$s</ul>',
                            )
                            ); 
                              }
                                else
                                    { ?>
                                        <ul class="no-menu">
                                            <li class="add-menu">
                                                <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','bizzoy'); ?></a>
                                            </li>
                                        </ul>
                            <?php } 
                            $bizzoy_header_section = get_theme_mod('bizzoy_header_section_hideshow' ,'show');
                            if ($bizzoy_header_section =='show') { 
                            $bizzoy_ctah_btn_text = get_theme_mod('bizzoy_ctah_btn_text');
                            $bizzoy_ctah_btn_url=get_theme_mod('bizzoy_ctah_btn_url');
                        
                                    if (!empty($bizzoy_ctah_btn_url)) {
                              ?>
                    <div class="navbar-additional align-items-center">
                        <div class="qoute-btn">
                            <a href="<?php echo esc_url($bizzoy_ctah_btn_url); ?>"><?php echo esc_html($bizzoy_ctah_btn_text); ?></a>
                        </div>
                    </div>

                        <?php }
                                } ?>
                    <div class="navbar-search align-items-center justify-content-center">
                        <div class="search-input d-flex align-items-center justify-content-center">
                            <div class="search-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="search-times">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" name="s" placeholder="<?php echo esc_attr__('search here','bizzoy'); ?>">
                        </form>
                    </div>
                </div>
                     <button class="hamburger justify-content-center align-items-center hamburger--spin" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
            </div>
            </div>
    </nav>