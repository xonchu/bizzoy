<?php
// theme sub header breadcrumb functions
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

if( !function_exists('bizzoy_breadcrumbs') ):
	function bizzoy_breadcrumbs() { 
			
		global $post;
		$homeLink = home_url();
	?>
		<!-- Page Title Section -->
		<header class="page-header">		
			<div class="overlay-dark"></div>
			  <div class="container breadcrumbs-wrapper">
				<div class="breadcrumbs d-flex flex-column justify-content-center">
						
						   <?php 
                           if(is_home() || is_front_page()) {
                                    echo '<h3>'; echo esc_html(single_post_title()); echo '</h3>';
                           } else{
                                    bizzoy_archive_page_title();
                           } 
                           ?>
						<div>
							<?php
							
							    $allowed_html = array(
									'br'     => array(),
									'em'     => array(),
									'strong' => array(),
									'i'      => array(
										'class' => array(),
									),
									'span'   => array(),
								);	
								echo '<ul class="breadcrumbs-list d-flex">';
								
								 if (is_home() || is_front_page()) :
								    echo '<li><a href="'.esc_url($homeLink).'">'.esc_html__('Home','bizzoy').'</a></li>';
									echo '<li class="active"><a href="'.esc_url($homeLink).'">'.esc_html(get_bloginfo( 'name' )).'</a></li>';
								 else:
									echo '<li><a href="'.esc_url($homeLink).'">'.esc_html__('Home','bizzoy').'</a></li>';
									// Blog Category
									if ( is_category() ) {
										echo '<li class="active"><a href="'. curPageURL() .'">' . esc_html__('Archive by category','bizzoy').' "' . single_cat_title('', false) . '"</a></li>';

									// Blog Day
									} elseif ( is_day() ) {
										echo '<li class="active"><a href="'. get_year_link(get_the_time( esc_html__( 'Y', 'bizzoy' ) )) . '">'. get_the_time( esc_html__( 'Y', 'bizzoy' ) ) .'</a>';
										echo '<li class="active"><a href="'. get_month_link(get_the_time( esc_html__( 'Y', 'bizzoy' ) ),get_the_time( esc_html__( 'm', 'bizzoy' ) )) .'">'. get_the_time( esc_html__( 'F', 'bizzoy' ) ) .'</a>';
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time( esc_html__( 'd', 'bizzoy' ) ) .'</a></li>';

									// Blog Month
									} elseif ( is_month() ) {
										echo '<li class="active"><a href="' . get_year_link(get_the_time( esc_html__( 'Y', 'bizzoy' ) )) . '">' . get_the_time( esc_html__( 'Y', 'bizzoy' ) ) . '</a>';
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time( esc_html__( 'F', 'bizzoy' ) ) .'</a></li>';

									// Blog Year
									} elseif ( is_year() ) {
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time( esc_html__( 'Y', 'bizzoy' ) ) .'</a></li>';

									// Single Post
									} elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
										
										// Custom post type
										if ( get_post_type() != 'post' ) {
											$cat = get_the_category(); 
											$cat = $cat[0];
											echo '<li>';
												echo get_category_parents($cat, TRUE, '');
											echo '</li>';
											echo '<li class="active"><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
										} }  
										elseif ( is_page() && $post->post_parent ) {
										$parent_id  = $post->post_parent;
										$breadcrumbs = array();
										while ($parent_id) {
											$page = get_page($parent_id);
											$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . wp_kses( force_balance_tags(get_the_title($page->ID)), $allowed_html ) . '</a>';
											$parent_id  = $page->post_parent;
										}
										$breadcrumbs = array_reverse($breadcrumbs);
										foreach ($breadcrumbs as $crumb) echo $crumb;
										
										echo '<li class="active"><a href="' . curPageURL() . '">'. wp_kses( force_balance_tags(get_the_title()), $allowed_html ) .'</a></li>';

									
									}
									elseif( is_search() )
									{
										echo '<li class="active"><a href="' . curPageURL() . '">'. get_search_query() .'</a></li>';
									}
									elseif( is_404() )
									{
										echo '<li class="active"><a href="' . curPageURL() . '">'.esc_html__('Error 404','bizzoy').'</a></li>';
									}
									else { 
										// Default
										echo '<li class="active"><a href="' . curPageURL() . '">'. wp_kses( force_balance_tags( get_the_title()), $allowed_html ) .'</a></li>';
									}
								endif;
								
								echo '</ul>'
							?>
						</div>
					</div>
				</div>	
			
		</header>
		
	<?php }
endif
?>