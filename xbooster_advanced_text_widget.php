<?php
/**
 * Plugin Name: xBooster Advanced Text Widget
 * Plugin URI: http://www.allthemesnulled.com
 * Description: This plugin gives you the ability to display custom content on custom pages. 
 * Version: 1.0
 * Author: acbaltaci
 * Author URI: http://www.allthemesnulled.com
 * License: GPL3
 */

class xbooster_advanced_text_widget extends WP_Widget {

	// constructor
	function xbooster_advanced_text_widget() {
		parent::WP_Widget(false, $name = __('xBooster Advanced Text Widget', 'xbooster_advanced_text_widget') );
	}

	// widget form creation
	function form($instance) {	

			// Check values
		if( $instance ) {
			$title 				= esc_attr($instance['title']);
			$display_title		= esc_attr($instance['display_title']);
			$homepage_widget 	= esc_attr($instance['homepage_widget']);
			$page_widget 		= esc_attr($instance['page_widget']);
			$post_widget 		= esc_attr($instance['post_widget']);
			$category_widget 	= esc_attr($instance['category_widget']);
			$page_ids 			= esc_attr($instance['page_ids']);
			$post_ids 			= esc_attr($instance['post_ids']);
			$category_ids 		= esc_attr($instance['category_ids']);
			$show_me 			= esc_textarea($instance['show_me']);
			$show_powered 		= esc_textarea($instance['show_powered']);
			
		} else {
			$title 				= '';
			$displa_title		= '';
			$homepage_widget 	= '';
			$page_widget		= '';
			$post_widget		= '';
			$category_widget	= '';
			$page_ids			= '';
			$post_ids			= '';
			$category_ids		= '';
			$show_me			= '';
			$show_powered		= 'ON';
			
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'xbooster_advanced_text_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php 


		if ( isset($display_title) && ( "ON" == $display_title ) ) {
			$display_title_checked = ' checked="checked" ';				
		} else {
			$display_title_checked = ' ';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('display_title'); ?>"><?php _e('Display Title', 'xbooster_advanced_text_widget'); ?></label>
			<input id="<?php echo $this->get_field_id('display_title'); ?>" name="<?php echo $this->get_field_name('display_title'); ?>" type="checkbox" value="ON" <?php echo $display_title_checked; ?>/>
		</p>

		<?php 
		if ( isset ($homepage_widget) && ( "ON" == $homepage_widget ) ) {
			$homepage_widget_checked = ' checked="checked" ';				
		} else {
			$homepage_widget_checked = ' ';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('homepage_widget'); ?>"><?php _e('Show on Homepage', 'xbooster_advanced_text_widget'); ?></label>
			<input id="<?php echo $this->get_field_id('homepage_widget'); ?>" name="<?php echo $this->get_field_name('homepage_widget'); ?>" type="checkbox" value="ON" <?php echo $homepage_widget_checked; ?>/>
		</p>
		<?php 
		if ( isset ( $page_widget ) && ( "ON" == $page_widget ) ) {
			$page_widget_checked = ' checked="checked" ';				
		} else {
			$page_widget_checked = ' ';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('page_widget'); ?>"><?php _e('Show on Pages', 'xbooster_advanced_text_widget'); ?></label>
			<input id="<?php echo $this->get_field_id('page_widget'); ?>" name="<?php echo $this->get_field_name('page_widget'); ?>" type="checkbox" value="ON" <?php echo $page_widget_checked; ?>/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_ids'); ?>"><?php _e('Pages to show and/or hide', 'xbooster_advanced_text_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('page_ids'); ?>" name="<?php echo $this->get_field_name('page_ids'); ?>" type="text" value="<?php echo $page_ids; ?>" />
		</p>
		<?php 
		if ( isset ( $post_widget ) && ( "ON" == $post_widget ) ) {
			$post_widget_checked = ' checked="checked" ';				
		} else {
			$post_widget_checked = ' ';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('post_widget'); ?>"><?php _e('Show on Posts', 'xbooster_advanced_text_widget'); ?></label>
			<input id="<?php echo $this->get_field_id('post_widget'); ?>" name="<?php echo $this->get_field_name('post_widget'); ?>" type="checkbox" value="ON" <?php echo $post_widget_checked; ?>/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('post_ids'); ?>"><?php _e('Posts to show and/or hide', 'xbooster_advanced_text_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('post_ids'); ?>" name="<?php echo $this->get_field_name('post_ids'); ?>" type="text" value="<?php echo $post_ids; ?>" />
			
		</p>
		<?php 
		if ( isset ( $category_widget ) && ( "ON" == $category_widget ) ) {
			$category_widget_checked = ' checked="checked" ';				
		} else {
			$category_widget_checked = ' ';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('category_widget'); ?>"><?php _e('Show on Categories', 'xbooster_advanced_text_widget'); ?></label>
			<input id="<?php echo $this->get_field_id('category_widget'); ?>" name="<?php echo $this->get_field_name('category_widget'); ?>" type="checkbox" value="ON" <?php echo $category_widget_checked; ?>/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('category_ids'); ?>"><?php _e('Categories to show and/or hide', 'xbooster_advanced_text_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('category_ids'); ?>" name="<?php echo $this->get_field_name('category_ids'); ?>" type="text" value="<?php echo $category_ids; ?>" />
			
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('show_me'); ?>"><?php _e('Text or HTML:', 'wp_widget_plugin'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('show_me'); ?>" name="<?php echo $this->get_field_name('show_me'); ?>"><?php echo $show_me; ?></textarea>
		</p>
		<p>
			<span><?php _e('If you leave the Pages to show, Posts to Show and Categories to show fields, plugin will render the widget on all pages/posts/categories. You can show only on the selected pages/posts/categories by adding page IDs seperated with comma (100,200,300). If you want to hide widget on a spesific page/post/category use the (-) on front of the page/post/category id. (-100). You can use combinations to show and hide this widget (-100,200,-300,400,....).', 'xbooster_advanced_text_widget'); ?></span>
		</p>
		<?php 
		if ( isset ( $show_powered ) && ( "ON" == $show_powered ) ) {
			$show_powered_checked = ' checked="checked" ';				
		} else {
			$show_powered_checked = ' ';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('show_powered'); ?>"><?php _e('Show Powered by Link', 'xbooster_advanced_text_widget'); ?></label>
			<input id="<?php echo $this->get_field_id('show_powered'); ?>" name="<?php echo $this->get_field_name('show_powered'); ?>" type="checkbox" value="ON" <?php echo $show_powered_checked; ?>/>
		</p>
		<?php
	}
	

	// widget update
	function update($new_instance, $old_instance) {
		$old_instance 					= $old_instance;
      	// Fields

      	$instance['title'] 				= $new_instance['title'];
		$instance['display_title'] 		= $new_instance['display_title'];
		$instance['homepage_widget']	= $new_instance['homepage_widget'];
		$instance['page_widget'] 		= $new_instance['page_widget'];
		$instance['post_widget']		= $new_instance['post_widget'];
		$instance['category_widget'] 	= $new_instance['category_widget'];
		$instance['page_ids'] 			= $new_instance['page_ids'];
		$instance['post_ids'] 			= $new_instance['post_ids'];
		$instance['category_ids'] 		= $new_instance['category_ids'];
		$instance['show_me'] 			= $new_instance['show_me'];
		$instance['show_powered'] 		= $new_instance['show_powered'];

     	return $instance;
	}

	// widget display
	function widget($args, $instance) {
		extract( $args );
   // these are the widget options
		$title 							= apply_filters('widget_title', $instance['title']);
		$display_title 					= $instance['display_title'];
		$homepage_widget 				= $instance['homepage_widget'];
		$page_widget 					= $instance['page_widget'];
		$post_widget 					= $instance['post_widget'];
		$category_widget 				= $instance['category_widget'];
		$page_ids 						= $instance['page_ids'];
		$post_ids 						= $instance['post_ids'];
		$category_ids 					= $instance['category_ids'];
		$show_me 						= $instance['show_me'];
		$show_powered 					= $instance['show_powered'];
		

		$xbooster_widget_before = $before_widget;
   		$xbooster_widget_before .= '';
		$xbooster_widget_after .= '';
		$xbooster_widget_after .= $after_widget;
 	
 		

		if( "ON" == $show_powered ){
				$powered_link = '<p style="font-size:8px;"><a href="http://www.allthemesnulled.com/?utm_source=wordpress&utm_medium=plugins&utm_campaign=booster%20advanced%20text%20powered">ATN</a></p>';
		}

		if( "ON" == $display_title ){
			if ( $title ) {
				$xbooster_title .= $before_title . $title . $after_title;
			}
		}

		$xbooster_render = $xbooster_widget_before . $xbooster_title . $show_me . $powered_link . $xbooster_widget_after;

		if( "ON" == $homepage_widget ){
			if( is_home() ){

				echo $xbooster_render;
			}			
		}

		if( "ON" == $category_widget ){
			if( is_category() ){
				if( $category_ids ){

					$category_ids_explode = explode(",",$category_ids);
					$i=0;
					$j=0;
					foreach ( $category_ids_explode as $catid ){

						if( 0 < $catid ){

							$categories_to_show[$i] = $catid; 
							$i++;
						} else if( 0 > $catid ){

							$categories_to_hide[$j] = $catid;							
							$j++;
						}

					}

					if( is_category($categories_to_show) && !is_category($categories_to_hide) ){
					
					echo $xbooster_render . "cat" ;
					}
				} else {
					
					echo $xbooster_render;
				}

				
				
			}			
		}

		if( "ON" == $page_widget ){
			if( is_page() ){
				if( $page_ids ){

					$page_ids_explode = explode(",",$page_ids);
					$i=0;
					$j=0;
					foreach ( $page_ids_explode as $pageid ){

						if( 0 < $pageid ){

							$pages_to_show[$i] = $pageid; 
							$i++;
						} else if( 0 > $pageid ){

							$pages_to_hide[$j] = $pageid;							
							$j++;
						}

					}

					if( is_page($pages_to_show) && !is_page($pages_to_hide) ){
					
					echo $xbooster_render;
					}
				} else {
					
					echo $xbooster_render;
				}

				
				
			}				
		}

		if( "ON" == $post_widget ){
			if( is_single() ){

				if( $post_ids ){

					$post_ids_explode = explode(",",$post_ids);
					$i=0;
					$j=0;
					foreach ( $post_ids_explode as $postid ){

						if( 0 < $postid ){

							$posts_to_show[$i] = $postid; 
							$i++;
						} else if( 0 > $postid ){

							$posts_to_hide[$j] = $postid;							
							$j++;
						}

					}

					if( is_single($posts_to_show) && !is_single($posts_to_hide) ){
					
					echo $xbooster_render;
					}
				} else {
					
					echo $xbooster_render;
				}
			}			
		}
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("xbooster_advanced_text_widget");'));
?>