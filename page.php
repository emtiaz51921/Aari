<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */
get_header();
?>


<?php
while ( have_posts() ) :
	the_post();
	?>
	<!-- Site Header-->
	<header class="site_header_image cover-bg"
			data-image-src="<?php echo( get_the_post_thumbnail_url() ? esc_url( get_the_post_thumbnail_url() ) : esc_url( get_theme_mod( 'page_header_background' ) ) ); ?>"
			data-overlay="5">
		<div class="container page">
			<?php
			aari_single_post_header();
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">', '</div>' );
			}
			?>
		</div>
	</header>
	<!-- End Site Header
	================================================== -->
	<!-- main content
	================================================== -->
	<div id="content_full" class="main_p main_p_v_2 section-padding">

	<div id="content" class="container">
		<div class="row sticky-container">
			<div class="col-lg-8  content">
				<div class="p_content entry_header_small">

					<?php
					get_template_part( 'template-parts/content', 'page' );
					?>


					<div class="clearfix"></div>


					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>


				</div>
			</div>

			<!-- Side Bar -->
			<?php
			get_sidebar();
			?>
			<!-- End Side Bar -->

		</div>
	</div>

<?php endwhile; ?>

	</div>

	<!-- End main content -->

<?php
get_footer();
