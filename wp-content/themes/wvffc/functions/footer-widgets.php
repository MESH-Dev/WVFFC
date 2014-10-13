<?php
class wvffc_footer_widgets extends WP_Widget{
	//register widget
	function __construct(){
		parent::__construct(
			'wvffc_footer_widgets', // Base ID
			__('Footer Widgets', 'text_domain'), // Name
			array('description' => __('Widgets for footer')) // Args
		);
	}

	//Display
	public function widget($args,$instance){
		$title = apply_filters('widget_title',$instance['title']);
    $link = $instance['link'];

    // $open = $instance['open'];
    // $close = $instance['close'];
    // $address = $instance['address'];

    //check time
    // date_default_timezone_set(get_option('timezone_string'));
    // $curTime = date('G:i');
    //
    // if($curTime > $open && $curTime < $close){
    //   $flag = 'Open Now';
    //   $class='open';
    // }else{
    //   $flag = 'Closed Now';
    //   $class='closed';
    // }

    //before widget
		// echo $args['before_widget'];

    //Set time to 12-hour for hours display
    // $closehour = date('g:i a', strtotime($close));
    // $openhour = date('g:i a', strtotime($open));

    //output

    if (!empty($title)){
      echo '<a href=' . $link . '><div class="two columns"><img src="' . get_bloginfo('template_directory') . '/assets/img/teal.png" class="teal-image" /><div class="top-footer-box"><div>' . $title . '</div><img src="' .get_bloginfo('template_directory') . '/assets/img/arrow_icon.png" /></div></div></a>';
    }


    //after widget
		// echo $args['after_widget'];
	}

	//widget form
	public function form($instance){
		if(isset($instance['title'])){
			$title   = $instance['title'];
      $link    = $instance['link'];

		}else{
			$title = __('New headline');
      $link = __('Add a link');
		}
		?>

		<p>
  		<label for="<?php echo $this->get_field_id('title'); ?>">Headline</label>
  		<input class="widefat footer_widgets-text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
    <!-- <p>
      <label for="<?php echo $this->get_field_id('hours'); ?>">Hours</label><br>
      <span><em>Open:</em> </span><input class="widefat footer_widgets-time" id="<?php echo $this->get_field_id('open'); ?>" name="<?php echo $this->get_field_name('open'); ?>" type="time" value="<?php echo esc_attr($open); ?>"><br>
      <span><em>Close:</em> </span><input class="widefat footer_widgets-time" id="<?php echo $this->get_field_id('close'); ?>" name="<?php echo $this->get_field_name('close'); ?>" type="time" value="<?php echo esc_attr($close); ?>"><br>
    </p>
    <p>
      <label for="address">Address</label><br>
      <textarea class="widefat footer_widgets-textarea" rows="4" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_attr($address); ?></textarea>
    </p> -->

    <p>
      <label for="link">Link</label><br>
      <input class="widefat footer_widgets-text" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>">
    </p>
		<?php
	}

	//sanitize inputs
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';
    $instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']):'';
    // $instance['open'] = (!empty($new_instance['open'])) ? strip_tags($new_instance['open']):'';
    // $instance['close'] = (!empty($new_instance['close'])) ? strip_tags($new_instance['close']):'';
    // $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']):'';

		return $instance;
	}

}

// register footer_widgets widget
function register_footer_widgetS() {
    register_widget( 'wvffc_footer_widgets' );
}
add_action( 'widgets_init', 'register_footer_widgetS' );
