<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php
	if ( ! is_singular() ) :
		?>
		<header class="entry-header">

			<?php
			if ( has_post_thumbnail() ) :
				printf( "<div class='post_banner'><div class='gallery_image_1'><a href='%s'><img src='%s' alt=''></a></div></div>", esc_url( get_permalink() ), esc_url( get_the_post_thumbnail_url( get_the_ID(), 'aari_post_thumb' ) ) );
			endif;
			?>
		</header><!-- .entry-header -->
		<?php
	endif;
	?>


	<div class="entry-content post_body <?php echo( has_post_thumbnail() ? 'has_thumbnail' : 'no_thumbnail' ); ?>">

		<?php if ( 'post' === get_post_type() & ! is_singular() ) : ?>
			<div class="post_meta">
				<?php aari_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif;

		if ( ! is_singular() ) :
			the_title( '<div class="post_header"><h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3></div>' );
		endif;
		?>
		<div class="post_info_wrapper <?php echo esc_attr( get_post_format() ); ?>">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aari' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aari' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>


		<?php
		if ( ! is_singular() ) :
			?>
			<div class="post_bottom_meta">
				<div class="half_width">
					<?php
					aari_entry_footer();
					?>
				</div>
				<div class="half_width">
					<div class="post_more">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php
							aari_post_date()
							?>
						</a>
					</div>
				</div>
			</div>
			<?php
		endif;
		?>


	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
