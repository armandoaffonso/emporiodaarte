<?php

/* Royal Slider Widget */

 
class Royal_Slider_Widget extends WP_Widget {

    function Royal_Slider_Widget() {
		global $themename;
		$widget_ops = array('classname' => 'custom-slider-widget', 'description' => __( "Slider Widget") );
		$control_ops = array('width' => 250, 'height' => 200);
		$this->WP_Widget('sliderwidget', __($themename.' - Slider Widget'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
		global $wpdb, $shortname;
        extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Slider Widget') : $instance['title'], $instance, $this->id_base);
		
		if ( !$number = (int) $instance['number'] )
			$number = 3;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
        $customcategory = $instance['customcategory'];
		$category_id = get_cat_ID( $customcategory );

		$posts = get_posts("numberposts=$number&cat=$category_id&offset=0");

		echo $before_widget;
		echo $before_title . $title . $after_title;

		if($posts){ ?>

		<div class="flexslider_widget">
        <ul class="slides">
			<?php foreach($posts as $post){
					$post_title = stripslashes($post->post_title);
					$permalink = get_permalink($post->ID);
					$post_date = $post->post_date;
					$post_date = mysql2date('d F, Y', $post_date, false);
					$category = get_the_category($post->ID);
					$category_link = get_category_link($post->ID);
			?>
			<li>

				<a href="<?php echo $permalink; ?>">
				 <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>	
	
				<?php $image = aq_resize( $thumbnailSrc, 250, 250, true ); ?>
                <img src="<?php echo $image ?>" alt="<?php echo $post_title; ?>" title="<?php echo $post_title; ?>"/>

				<p class="flex-caption"><?php echo $post_title; ?></p>
				</a>

			</li>
				<?php } ?>
		</ul>
        </div>
			<?php }	
			
		echo $after_widget;
    }

	function update($new_instance, $old_instance) {
	return $new_instance;
	}


    function form($instance) {				
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$customcategory = esc_attr($instance['customcategory']);

		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 3;	
        ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('customcategory'); ?>"><?php _e('Blog Category:','mediapress'); ?></label>
            <?php
            //Access the WordPress Categories via an Array
			$dd_categories = array();
			$dd_categories_obj = get_categories('hide_empty=0');
			foreach ($dd_categories_obj as $dd_cat) {
    			$dd_categories[$dd_cat->cat_ID] = $dd_cat->cat_name;}
			$categories_tmp = array_unshift($dd_categories, "Select a category:");
            ?>
            <select id="<?php echo $this->get_field_id('customcategory'); ?>" name="<?php echo $this->get_field_name('customcategory'); ?>">
			<?php
			//DISPLAY SELECT OPTIONS
			foreach ($dd_categories as $dd_category) {
				if ($customcategory == $dd_category) {
					$selected_option = 'selected="selected"';
				} else {
					$selected_option = '';
				} ?>
				<option value="<?php echo $dd_category; ?>" <?php echo $selected_option; ?>><?php echo $dd_category; ?></option>
				<?php
			} ?>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Enter the number of recent posts you'd like to display:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></p>

        <?php 
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Royal_Slider_Widget");'));

?>
