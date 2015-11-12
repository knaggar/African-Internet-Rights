<?php
/**
 *  @package air
 *  @since 2.0
 *  @name custom Widget
 **/

 // Create Footer widget
 class Footer_Widget extends WP_Widget {
	public function __construct() {
    parent::__construct(
      'Footer_Widget', __('Footer Widget', 'air'),
      array(
        'classname' => 'Footer_Widget',
        'description' => __('widget to add information using ACF Pro in the Footer main section', 'air')
      )
    );
    load_plugin_textdomain('air', false, basename(dirname(__FILE__)). '/languages');
	}
	public function widget( $args, $instance ) {
    extract( $args );
    $title         = apply_filters( 'widget_title', $instance['title'] );
    $message    = $instance['message'];
    echo $before_widget;
    if ( $title ) {
        echo $before_title . $title . $after_title;
    }
    echo $message;
    echo $after_widget;
  }
	public function form( $instance ) {
    $title = esc_attr($instance['title']);
    $message = esc_attr($instance['message']);
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Message'); ?></label>
      <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>"><?php echo $message; ?></textarea>
    </p>
    <?php
	}
	public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['message'] = strip_tags( $new_instance['message'] );
    return $instance;
	}
}
add_action( 'widgets_init', function() {
  register_widget( 'Footer_Widget' );
});
