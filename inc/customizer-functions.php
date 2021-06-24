<?php

/*
 * All the function related to customizer
 */


/**
 * Text logo if no image logo is selected
 */
if ( ! function_exists( 'aari_text_logo_display' ) ) :

	function aari_text_logo_display() {

		$markup  = '<a class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '">';
		$markup .= '<h1>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '</h1>';
		if ( ( get_theme_mod( 'header_text' ) !== 0 ) && ( get_bloginfo( 'description' ) !== '' ) ) {
			$markup .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
		}
		$markup .= '</a>';

		echo wp_kses_post( $markup );
	}

endif;

/*
 * Get the custom image logo
 */

function aari_custom_logo_dark() {

	if ( ! get_theme_mod( 'custom_logo' ) ) {
		return false;
	}

	$custom_logo_id  = get_theme_mod( 'custom_logo' );
	$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
	if ( $custom_logo_url ) {
		return ( '<a class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( $custom_logo_url ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" data-light="' . esc_url( $custom_logo_url ) . '" ></a>' );
	} else {
		return false;
	}
}
