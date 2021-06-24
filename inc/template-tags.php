<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aari
 */
if ( ! function_exists( 'aari_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function aari_posted_on() {

		$get_author_id       = get_the_author_meta( 'ID' );
		$get_author_gravatar = get_avatar_url( $get_author_id );
		$authorof            = '<span class="post_meta_item post_author"><a href="%1$s"> <span class="post_author_img"><img src="%2$s" alt=""></span><span class="post_author_info">' . __( 'by', 'aari' ) . ' : %3$s </span></a></span>';
		printf(
			wp_kses_post( $authorof ),
			esc_url( get_author_posts_url( $get_author_id ) ),
			esc_url( $get_author_gravatar ),
			esc_html( get_the_author() )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
				esc_html_x( 'by %s', 'post author', 'aari' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aari' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			$arr_allowed = array(
				'a' => array(
					'href'   => array(),
					'rel'    => array(),
					'before' => array(),
					'after'  => array(),
				),
			);
			printf( '<span class="post_meta_item post_cat">%1$s</span>', wp_kses( $categories_list, $arr_allowed ) );

		}

	}

endif;

if ( ! function_exists( 'aari_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function aari_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="meta meta_comment"><span class="jam jam-message"></span>';
			comments_popup_link(
				__( 'Leave a comment', 'aari' ),
				__( '1 Comment', 'aari' ),
				__( '% Comments', 'aari' )
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'aari' ),
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




if ( ! function_exists( 'aari_single_post_header' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function aari_single_post_header() {

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aari' ) );

		if ( ! is_attachment() ) :
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">', '</div>' );
			}
		endif;

		the_title( '<h1 class="entry-title">', '</h1>' );

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">| %4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$get_author_id = get_the_author_meta( 'ID' );

		if ( ! get_theme_mod( 'disable_post_details' ) ) {
			if ( ! is_page() ) :
				$arr_tags = array(
					'time' => array(
						'class'    => array(),
						'datetime' => array(),
					),
				);
				printf( '<div class="post-subtitle-container"><div class="post-date"><a href="%1$s">%2$s</a></div><div class="post-author"><a href="%3$s">%4$s</a></div></div>', esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ), wp_kses( $time_string, $arr_tags ), esc_url( get_author_posts_url( $get_author_id ) ), esc_html( get_the_author() ) );
			endif;
		}
	}

endif;








if ( ! function_exists( 'aari_single_tags_cloud' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function aari_single_tags_cloud() {

		$categories_list = get_the_category_list( esc_html__( ',', 'aari' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			if ( ! get_theme_mod( 'disable_category_cloud' ) ) {
				$arr_allowed = array(
					'a' => array(
						'href'   => array(),
						'rel'    => array(),
						'before' => array(),
						'after'  => array(),
					),
				);
				printf( '<span class="tagcloud catloud clearfix"><span class="namee">%1$s </span>%2$s</span>', esc_html_x( 'Post Categories:  &nbsp;', 'aari', 'aari' ), wp_kses( $categories_list, $arr_allowed ) );
			}
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ',' );
		if ( $tags_list && ! is_wp_error( $tags_list ) && ! get_theme_mod( 'disable_tag_cloud' ) ) {

			$arr_allowed = array(
				'a' => array(
					'href'   => array(),
					'rel'    => array(),
					'before' => array(),
					'after'  => array(),
				),
			);

			printf(
				'<span class="tagcloud clearfix"><span class="namee">%1$s </span>%2$s</span>',
				esc_html_x( 'Tags:  &nbsp;', 'Used before tag names.', 'aari' ),
				wp_kses( $tags_list, $arr_allowed )
			);
		}
	}

endif;





if ( ! function_exists( 'aari_post_footer_author' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function aari_post_footer_author() {

		$get_author_id       = get_the_author_meta( 'ID' );
		$get_author_gravatar = get_avatar_url( $get_author_id );

		$time_string = '<time class="post_meta_item meta_item_date" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="post_meta_item meta_item_date" datetime="%1$s">%2$s</time>';
		}

		$time_string    = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
		$author_details = '<div class="post_bottom_meta"><div class="half_width"><ul class="post_meta"><li><span class="author"><img src="%1$s" class="avatar" alt> ' . __( 'By', 'aari' ) . ' <a href="%2$s">%3$s</a></span></li><li><span class="date">%4$s</span></li></ul></div></div>';

		$arr_tags = array(
			'time' => array(
				'class'    => array(),
				'datetime' => array(),
			),
		);

		printf(
			wp_kses_post( $author_details ),
			esc_url( $get_author_gravatar ),
			esc_url( get_author_posts_url( $get_author_id ) ),
			esc_html( get_the_author() ),
			wp_kses( $time_string, $arr_tags )
		);
	}

endif;







if ( ! function_exists( 'aari_related_post_ext' ) ) :

	function aari_related_post_ext() {

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aari' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			$cats = sprintf( '<span class="cat_links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
		}

		$time_string = '<time class="post_meta_item meta_item_date" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="post_meta_item meta_item_date" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_html( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$cats .= sprintf( '<span class="posted_on"><a href="%1$s">%2$s</a> </span>', esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ), $time_string );

		return $cats;
	}


endif;


/**
 * Retrive post date
 */

if ( ! function_exists( 'aari_post_date' ) ) :

	function aari_post_date() {

		$time_string = '<time class="post_meta_item meta_item_date" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="post_meta_item meta_item_date" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_html( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$arr_tags = array(
			'time' => array(
				'class'    => array(),
				'datetime' => array(),
			),
		);

		echo wp_kses( $time_string, $arr_tags );

	}

endif;
