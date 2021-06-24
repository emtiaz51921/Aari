<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aari
 */
get_header();
?>


<?php
while ( have_posts() ) :
	the_post();
	?>
	<!-- Site Header -->
	<header class="site_header_image cover-bg"
			data-image-src="<?php echo( has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url() ) : esc_url( get_theme_mod( 'post_header_background' ) ) ); ?>"
			data-overlay="5">
		<div class="container">

			<?php

			aari_single_post_header();

			?>

		</div>
	</header>
	<!-- End Site Header -->
	<!-- main content -->
	<div id="content_full" class="main_p main_p_v_2 section-padding">
	<div id="content" class="container">
		<div class="row <?php echo esc_attr( get_theme_mod( 'post_layout' ) === 'fullwidth' ? '' : 'sticky-container' ); ?>">
			<div class="content <?php echo esc_attr( get_theme_mod( 'post_layout' ) === 'fullwidth' ? 'col-lg-12' : 'col-lg-8' ); ?>">
				<div class="p_content entry_header_small">

					<?php

					get_template_part( 'template-parts/content', get_post_type() );
					aari_single_tags_cloud();
					if ( 0 === get_theme_mod( 'disable_author_after' ) ) {
						aari_post_footer_author();
					}

					?>

					<div class="clearfix"></div>
					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div>
			</div>
			<!-- Side Bar -->

			<?php

			if ( 'fullwidth' !== get_theme_mod( 'post_layout' ) ) {
				get_sidebar();
			}

			?>

			<!-- End Side Bar -->

		</div>
	</div>


	<!-- Post Navigation start -->
	<div class="post_navigation_area">
		<div class="container">
			<nav class="navigation post-navigation">
				<div class="nav-links">
					<div class="nav-previous">

						<h5 class="post-title">
							<?php previous_post_link( '<span class="meta-nav">' . __( 'Previous post', 'aari' ) . '</span> %link' ); ?>
						</h5>

						<i class="jam jam-angle-left"></i>
					</div>

					<div class="nav-next">
						<h5 class="post-title"><?php next_post_link( '<span class="meta-nav">' . __( 'Next post', 'aari' ) . '</span> %link' ); ?></h5>
						<i class="jam jam-angle-right"></i>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Post Navigation end -->

	<?php
	// get related posts
	if ( 1 !== get_theme_mod( 'disable_related_post' ) ) {
		aari_related_posts();
	}

endwhile; // End of the loop.
?>

	</div>
	<!-- End main content -->
<?php
get_footer();
