<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizzoy
 */

if ( ! function_exists( 'bizzoy_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bizzoy_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date', 'bizzoy' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-calendar"></i>' . $time_string . '</a>'
		);

		echo '<li>' . $posted_on . '</li>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'bizzoy_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
		function bizzoy_posted_by() {
		$byline = sprintf(
			esc_html('%s', 'bizzoy' ),
			'<i class="fa fa-user-circle-o"></i>'
		);

		echo '<li><a class="post-user" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a></li>'; // WPCS: XSS OK.


	}
endif;

if ( ! function_exists( 'bizzoy_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bizzoy_entry_footer() {
	

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bizzoy' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bizzoy' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'bizzoy_comment' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bizzoy_comment() {
		// Hide category and tag text for pages.
		

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li><i class="fa fa-comment"></i>';
			comments_popup_link(
				
			);
			echo '</li>';
		}
	
	}
endif;