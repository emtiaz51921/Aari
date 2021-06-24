<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */
get_header();
?>

<main id="mainContent">
	<div class="sidebar-overlay"></div>
	<!-- main content
	================================================== -->
	<div id="content_full" class="section-padding">
		<div id="content" class="container">
			<div class="row sticky-container <?php echo esc_attr( get_theme_mod( 'post_layout' ) === 'fullwidth' ? 'justify-content-center' : '' ); ?>">

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


				<!-- Side Bar -->
				<?php
				if ( 'fullwidth' !== get_theme_mod( 'post_layout' ) ) {
					get_sidebar();
				}
				?>
				<!-- End Side Bar -->                          


			</div>
		</div>
	</div>

</main>

<?php
get_footer();
