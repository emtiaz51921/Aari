<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aari
 */
function aari_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

add_filter( 'body_class', 'aari_body_classes' );


/*
 * Fatch related post data
 */

if ( ! function_exists( 'aari_related_posts' ) ) :

	function aari_related_posts() {

		if ( 1 === get_theme_mod( 'disable_related_post' ) ) {
			return false;
		}

		if ( is_singular() ) :

			$layout  = '<section class="related_posts section-padding">';
			$layout .= '<div class="container">';
			$layout .= '<div class="row">';

			$layout .= '<h4 class="col-12 title text-center mb-50"><span>';
			$layout .= esc_html__( 'You Might Also Like', 'aari' );
			$layout .= '</span></h4>';

			if ( get_theme_mod( 'aari_related_post_count' ) ) {
				$post_count = get_theme_mod( 'aari_related_post_count' );
			} else {
				$post_count = 3;
			}

			$args    = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $post_count,
				'category__in'   => wp_get_post_categories( get_the_ID() ),
				'post__not_in'   => array( get_the_ID() ),
			);
			$related = new WP_Query( $args );

			while ( $related->have_posts() ) :
				$related->the_post();

				$post_thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' );

				$layout .= '<div class="col-lg-4">';
				$layout .= '<div class="related_posts_item">';
				if ( $post_thumb ) {
					$layout .= '<a class="post_card_thumbnail" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute() . '">' . get_the_post_thumbnail() . '</a>';
				}
				$layout .= '<div class="post_card_body">';
				$layout .= '<h3 class="post_card_title"><a href="' . esc_url( get_permalink() ) . '">' . wp_kses_post( get_the_title() ) . '</a></h3>';
				$layout .= ' <div class="post_card_meta">' . aari_related_post_ext() . '</div>';
				$layout .= '</div>';
				$layout .= '</div>';
				$layout .= '</div>';

			endwhile;
			$layout .= '</div>';
			$layout .= '</div>';
			$layout .= '</section>';

			wp_reset_postdata();

			echo wp_kses_post( $layout );

		endif;

	}

endif;


/*
 * *
 * WordPress number pagination
 * * */
if ( ! function_exists( 'aari_number_paging_nav' ) ) :

	function aari_number_paging_nav() {

		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links(
			array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $GLOBALS['wp_query']->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_next' => true,
				'prev_text' => '<span class="jam jam-arrow-left"></span>',
				'next_text' => '<span class="jam jam-arrow-right"></span>',
			)
		);

		if ( $links ) :

			$layout  = '<div class="ogato-pagination text-center">';
			$layout .= '<nav class="navigation pagination">';
			$layout .= '<div class="nav-links">';
			$layout .= $links;
			$layout .= '</div>';
			$layout .= '</nav>';
			$layout .= '</div>';

			echo wp_kses_post( $layout );

		endif;
	}

endif;


/*
 * Change archive page title
 */

add_filter(
	'get_the_archive_title',
	function ( $title ) {

		if ( is_category() ) {

			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {

			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {

			$title = '<span class="vcard">' . esc_html( get_the_author() ) . '</span>';
		}

		return $title;
	}
);


/*
 * create copyright info
 */

function aari_copyright() {
	$all_posts  = get_posts( 'post_status=publish&order=ASC' );
	$first_post = $all_posts[0];
	$first_date = $first_post->post_date_gmt;
	esc_html_e( 'Copyright &copy;  ', 'aari' );
	if ( substr( $first_date, 0, 4 ) === date( 'Y' ) ) {
		echo esc_html( date( 'Y' ) );
	} else {
		echo esc_html( substr( $first_date, 0, 4 ) ) . '-' . esc_html( date( 'Y' ) );
	}

	esc_html_e( '&nbsp;', 'aari' ) . bloginfo( 'name', 'display' ) . esc_html_e( '. All rights reserved.', 'aari' );
}

/*
 * Get comment depth
 */
function aari_get_comment_depth( $my_comment_id ) {
	$depth_level = 0;
	while ( $my_comment_id > 0 ) { // if you have ideas how we can do it without a loop, please, share it with us in comments
		$my_comment    = get_comment( $my_comment_id );
		$my_comment_id = $my_comment->comment_parent;
		$depth_level ++;
	}

	return $depth_level;
}

/*
 * Return safe css
 */

add_filter(
	'safe_style_css',
	function ( $styles ) {
		$styles[] = 'display';
		$styles[] = 'background-size';
		$styles[] = 'background-repeat';
		$styles[] = 'background-position';

		return $styles;
	}
);
