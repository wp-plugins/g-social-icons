<?php
/**
 * G Social Icons.
 *
 * @package   G_Social_Icons_Widget
 * @author    Gerben Van Amstel <gerbenvanamstel@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gerbenvanamstel.com
 * @copyright 2015 Gerben Van Amstel
 */

/**
 * @package G_Social_Icons_Widget
 * @author  Gerben Van Amstel <gerbenvanamstel@gmail.com>
 */
class G_Social_Icons_Widget extends WP_Widget {

    protected $widget_slug = 'g-social-icons-widget';
    
    /**
	 * Constructor Specifies the classname and description
	 *
	 * @since    1.2.0
	 */
    public function __construct() {
        parent::__construct(
            $this->get_widget_slug(),
            __( 'G Social Icons Widget', $this->get_widget_slug() ),
            array(
                'classname'  => $this->get_widget_slug().'-class',
                'description' => __( 'Display G Social Icons.', $this->get_widget_slug() )
            )
        );
    }

    /**
	 * Return the widget slug.
	 *
	 * @since    1.2.0
	 */
    public function get_widget_slug() {
        return $this->widget_slug;
    }

    /**
	 * The widget functionality - display G Social Icons shortcode.
	 *
	 * @since    1.2.0
	 */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        echo do_shortcode('[g-social-icons]');
        echo $args['after_widget'];
    } 

    /**
	 * The widget form for the title of the widget
	 *
	 * @since    1.2.0
	 */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 
    }

    /**
	 * Sanitize widget form values (title) as they are saved.
	 *
	 * @since    1.2.0
	 */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
}