<?php
/**
 * The template for displaying author pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */

get_header();
?>

<main id="mainContent">
	<div class="sidebar-overlay"></div>

	<!-- Site Header -->
	<header id="header" class="site_header_image cover-bg" data-image-src="<?php echo ( get_theme_mod( 'author_header_background' ) !== null ? esc_url( get_theme_mod( 'author_header_background' ) ) : '' ); ?>" data-overlay="5">
		<div class="container">

			<div class="post-categories">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">', '</div>' );
				}
				?>
			</div>

			<?php
			the_archive_title( '<h1>', '</h1>' );
			?>
			<div class="post-subtitle-container">
				<div class="post-author">
					<?php printf( '%s posts', absint( count_user_posts( get_the_author_meta( 'ID' ) ) ) ); ?>
				</div>
			</div>
		</div>
	</header>
	<!-- End Site Header
================================================== -->    



	<!-- main content
	================================================== -->
	<div id="content_full" class="section-padding">
		<div id="content" class="container">
			<div class="row sticky-container <?php echo esc_attr( get_theme_mod( 'post_layout' ) === 'fullwidth' ? 'justify-content-center' : '' ); ?>">



				<!-- latest-posts -->
				<div class="content col-lg-8">
					<div id="content" class="latest-posts category-content">   


						<div class="header-description mb-50">
							<div class="row">
								<div class="col-md-3">
									<div class="avatar-part">
										<?php printf( ' <img src="%1$s" alt="%2$s">', esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ), esc_attr( get_the_author() ) ); ?>
									</div>
								</div>

								<div class="col-md-9">
									<div class="text">
										<?php printf( '<h1 class="page-title">%1$s</h1><h5 class="btExcerpt">%2$s</h5>', esc_html( get_the_author() ), esc_html( get_the_author_meta( 'description' ) ) ); ?>
									</div>
								</div>
							</div>
						</div> 


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
							?>

							<?php
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
				if ( get_theme_mod( 'post_layout' ) !== 'fullwidth' ) :
					if ( function_exists( 'get_sidebar' ) ) :
						get_sidebar();
					endif;
				endif;
				?>
				<!-- End Side Bar -->



			</div>
		</div>
	</div>


</main>



<?php
get_footer();

