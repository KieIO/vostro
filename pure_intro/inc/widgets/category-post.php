<?php
/**
 * Widget API: HB_Widget_Popular_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class HB_Widget_Category_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_category_posts_entries',
			'description' => __( 'Posts on a category' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'category-posts', __( 'Category Posts' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 12;
		$r = new WP_Query( array( 'posts_per_page' => $number, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
		
		if ($r->have_posts()) :
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Popular Posts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$i = 2;
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div class="row">
		<?php while ( $r->have_posts() ) : $r->the_post();
			 $post_thumbnail_id = get_post_thumbnail_id( get_the_id() );
			 $image = wp_get_attachment_image_url( $post_thumbnail_id, 'thumbnail', false );
			 ?>
				<div class="item">
					<a href="<?php the_permalink(); ?>"><div class="item-img"><img class="avatar" src="<?php echo $image?>"/></div>
					<?php the_title() ?></a>
				</div>
		<?php $i++;
			endwhile; ?>
		</div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['category'] = (int) $new_instance['category'];
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$category     = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$wp_cats = get_categories();
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'category:' ); ?></label>		
		<select class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
		<?php foreach($wp_cats as $cat){?>
			<option value="<?php echo $cat->term_id?>" <?php echo $cat->term_id==$category ? 'selected="selected"' : ''?>><?php echo $cat->name?></option>
		<?php }?>
		</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

<?php
	}
}
