<?php
/**
 * Create recent post widget with thumbnails
 *
 * @package aari
 */

// Adds widget: aari Recent Post
class Aari_Recentpost_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_recent_entries_custom',
			'description'                 => __( 'Recent posts with thumbnails', 'aari' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct( 'Aari_Recentpost_Widget', __( 'Aari Latest Posts', 'aari' ), $widget_ops );
	}

	private $widget_fields = array(
		array(
			'id'      => 'numberofpoststo_number',
			'default' => '5',
			'type'    => 'number',
		),
		array(
			'id'   => 'displaypostdate_checkbox',
			'type' => 'checkbox',
		),
	);

	public function widget( $args, $instance ) {

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'] );
		}

		$aari_the_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'posts_per_page' => $instance['numberofpoststo_number'],
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post__not_in'   => get_option( 'sticky_posts' ),
			)
		);

		echo '<ul>';
		while ( $aari_the_query->have_posts() ) :
			$aari_the_query->the_post();
			?>

			<li class="clearfix">

				<div class="wi">
					<?php
					if ( has_post_thumbnail() ) :
						?>
						<a href="<?php echo esc_url( get_the_permalink() ); ?>">
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
						</a>
						<?php
					endif;
					?>
				</div>

				<div class="wb">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title_attribute(); ?></a>

					<?php if ( $instance['displaypostdate_checkbox'] ) : ?>
						<span class="post-date"><?php echo esc_html( get_the_date() ); ?></span>
					<?php endif; ?>

				</div>

			</li>

			<?php
		endwhile;
		wp_reset_postdata();
		echo '</ul>';

		echo wp_kses_post( $args['after_widget'] );
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset( $widget_field['default'] ) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : esc_html( $default );
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" ' . checked( $widget_value, true, false ) . ' id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" value="1">';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_html__( 'Number of posts to show', 'aari' ) . '</label>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_html__( 'Display post date?', 'aari' ) . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . esc_attr( $widget_field['type'] ) . '" value="' . esc_attr( $widget_value ) . '">';
					$output .= '</p>';
			}
		}
		echo $output;

	}


	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Post', 'aari' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'aari' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? sanitize_text_field( $new_instance[ $widget_field['id'] ] ) : '';
			}
		}
		return $instance;
	}
}

function aari_recentpost_widget_register() {
	register_widget( 'Aari_Recentpost_Widget' );
}
add_action( 'widgets_init', 'aari_recentpost_widget_register' );


