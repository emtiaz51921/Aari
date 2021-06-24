<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aari
 */

get_header();

?>


	<header class="site_header_image cover-bg"
			data-image-src="<?php echo( get_theme_mod( '404_header_background' ) !== null ? esc_url( get_theme_mod( '404_header_background' ) ) : '' ); ?>"
			data-overlay="5">
		<div class="container page">
			<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aari' ); ?></h1>
		</div>
	</header>

	<div id="content_full" class="main_p main_p_v_2 section-padding">

		<div id="content" class="container">
			<div class="row sticky-container">
				<div class="col-lg-12  content">
					<div class="p_content entry_header_small not-found">

						<p class="init">
							<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aari' ); ?>
						</p>

						<div class="search-form">
							<?php get_search_form(); ?>
						</div>

						<div class="row max_widths">

							<div class="col-md-4 not-fount-widgets">

								<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
							</div>

							<div class="col-md-4 not-fount-widgets">

								<h2> <?php esc_html_e( 'Most Used Categories', 'aari' ); ?></h2>

								<?php
								wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									)
								);
								?>
							</div>

							<div class="col-md-4 not-fount-widgets">

								<?php the_widget( 'WP_Widget_Archives' ); ?>
							</div>

						</div>

					</div>

				</div>

			</div>
		</div>

	</div>

<?php
get_footer();
