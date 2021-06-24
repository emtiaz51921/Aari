<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comment_sec mt-50">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h4 class="title">
			<?php
			$aari_comment_count = get_comments_number();
			if ( 1 === $aari_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'aari' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $aari_comment_count, 'comments title', 'aari' ) ),
					esc_html( number_format_i18n( $aari_comment_count ) ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="blog_comments  mb-50">
			<ul class="comment_area">
				<?php
				wp_list_comments(
					array(
						'walker'      => new Aari_Comment(),
						'style'       => 'ul',
						'short_ping'  => true,
						'avatar_size' => 65,
					)
				);
				?>
			</ul>
		</div><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aari' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


	$aari_args = array(
		'format'               => 'html5',
		'title_reply'          => '<h4 class="title">' . esc_html__( 'Leave A Reply', 'aari' ) . '</h4>',
		'comment_notes_before' => '',
		'comment_field'        => '<div class="col-12">' . '<div class="comment-form-comment">' . '<label for="comment">' . esc_html__( 'Comment', 'aari' ) . '</label>' . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></div></div>',
		'class_submit'         => 'form-submit',
		'fields'               => apply_filters(
			'aari_form_default_fields',
			array(
				'author'  =>
					'<div class="col-lg-4"><div class="comment-form-author form-comment">' .
					'<label for="author">' . esc_html__( 'Name', 'aari' ) . '</label> ' .
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30" /></div></div>',
				'email'   =>
					'<div class="col-lg-4"><div class="comment-form-email form-comment"><label for="email">' . esc_html__( 'Email', 'aari' ) . '</label> ' .
					'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
					'" size="30" /></div></div>',
				'url'     =>
					'<div class="col-lg-4"><div class="comment-form-url form-comment"><label for="email">' . esc_html__( 'Website', 'aari' ) . '</label>' .
					'<input id="url" name="url" type="text" value="' . esc_url( $commenter['comment_author_url'] ) .
					'" size="30" /></div></div>',
				'cookies' => '',

			)
		),

	);

	comment_form( $aari_args );

	?>


</div><!-- #comments -->
