<?php
/**
 * The template for displaying serach result
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */
get_header();
?>

<main id="mainContent">
	<div class="sidebar-overlay"></div>
	<!-- Site Header-->
	<header id="header" class="site_header_image cover-bg" data-image-src="<?php echo ( get_theme_mod( 'search_header_background' ) !== null ? esc_url( get_theme_mod( 'search_header_background' ) ) : '' ); ?>" data-overlay="5">
		<div class="container search-result">

			<div class="post-categories">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">', '</div>' );
				}
				?>
			</div>

			<h1>
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for:  %s ', 'aari' ), get_search_query() );
				?>
			</h1>

			<div class="post-subtitle-container">
				<?php
				the_archive_description( '<div class="post-author">', '</div>' );
				?>
			</div>

		</div>
	</header>
	<!-- End Site Header
================================================== -->    

	<!-- main content
	================================================== -->
	<div id="content_full" class="section-padding">
		<div id="content" class="container">
			<div class="row sticky-container">

				<!-- latest-posts -->
				<div class="col-lg-8 content">
					<div id="content" class="latest-posts">        
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

								<?php
							endif;
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;
							aari_number_paging_nav();

							else :

								get_template_part( 'template-parts/content', 'none' );

						endif;
							?>
						<!-- End post banner -->
					</div>
				</div>
				<!-- End latest-posts -->

				<?php
				get_sidebar();
				?>
			</div>
		</div>
	</div>

</main>

<?php
get_footer();

