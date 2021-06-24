<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap Media object in WordPress comment list.
 *
 * @package aari
 */

class Aari_Comment extends Walker_Comment {

	/**
	 * Output a comment in the HTML5 format. Don't worry, we're
	 * just extending default WordPress functionality.
	 *
	 * @access protected
	 *
	 * @param object $comment Comment to display.
	 * @param int    $depth Depth of comment.
	 * @param array  $args An array of arguments.
	 *
	 * @see wp_list_comments()
	 *
	 * @since 3.6.0
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		// Determine which tag we're using
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent blog_comment_user' : 'blog_comment_user', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body commenter_div mb-50">
			<div class="comment-meta">
				<div class="comment-author vcard commenter">
					<?php
					if ( 0 !== $args['avatar_size'] ) {

						$allowed = array(
							'img' => array(
								'alt'    => array(),
								'src'    => array(),
								'd'      => array(),
								'r'      => array(),
								'srcset' => array(),
								'class'  => array(),
								'height' => array(),
								'width'  => array(),
							),
						);

						echo wp_kses( get_avatar( $comment, $args['avatar_size'] ), $allowed );
					}
					?>
				</div>

				<div class="comment-content comment_block">

					<div class="comment-metadata">
						<?php

						// Nifty "In Reply To" feature that doesn't come with vanilla comments
						if ( intval( $comment->comment_parent ) !== 0 ) {
							/* translators: %1$s in reply to %2$s: comment reply term */
							printf( wp_kses_post( __( '<h4 class="comntr_title">%1$s in reply to %2$s</span></h4>', 'aari' ) ), esc_html( get_comment_author( $comment ) ), esc_html( get_comment_author( $comment->comment_parent ) ) );
						} else {
							printf( '<h4 class="comntr_title">%s</h4>', esc_html( get_comment_author( $comment ) ) );
						}
						?>

						<h6 class="comntr_time">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php
								/* translators: %1$s at %2$s: comment time term */
								printf( wp_kses_post( __( ' <span>%1$s</span> at %2$s', 'aari' ) ), esc_html( get_comment_date( '', $comment ) ), esc_html( get_comment_time() ) );
								?>
							</time>
						</h6>

					</div>


					<?php if ( ! $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'aari' ); ?></p>
					<?php endif; ?>

					<?php comment_text(); ?>

					<div class="reply">
						<?php
						// Output Edit link
						edit_comment_link( esc_html__( 'Edit', 'aari' ), '<span class="edit-link">', '</span>' );

						// Output Reply link
						comment_reply_link(
							[
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
							]
						);
						?>
					</div>


				</div>
			</div>
		</article>
		<?php
	}
}
