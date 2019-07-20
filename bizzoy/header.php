<?php 
/**
* The header for our theme.
*
* Displays all of the <head> section 
*
* @package bizzoy
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Shortcut icon-->

        <?php wp_head(); ?>
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

        </head>

    <body <?php body_class(); ?>>
     <?php
     $bizzoy_preloader_section = get_theme_mod( 'bizzoy_preloader_section_hideshow','show');
   if( $bizzoy_preloader_section == "show") {

     ?>
    <div id="preloader"></div>
    <?php } ?>
     <?php get_template_part('lib/header-main'); ?>