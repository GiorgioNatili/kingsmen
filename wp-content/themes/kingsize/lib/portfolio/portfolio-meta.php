<?php
/*
* @KingSize 2011
** Add image upload metaboxes to Portfolio items **
*/

#-----------------------------------------------------------------#
#####################  Define Metabox Fields  #####################
#-----------------------------------------------------------------#

$prefix = 'kingsize_';

$meta_box_settings = array(
	'id' => 'kingsize-meta-box-settings',
	'title' => 'Portfolio Settings',
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
			'name' => 'Custom Background',
			'desc' => 'Upload a custom background that overrides the default.',
			'id' => 'kingsize_portfolio_background',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => 'upload_image_button_background',
			'type' => 'button',
			'std' => 'Browse'
		),	
	array(
			'name' => 'Custom Read More Text',
			'desc' => 'Insert very own custom Read More text, overwriting the default text.',
			'id' => 'portfolios_read_more_text',
			'type' => 'text',
			'std' => 'Read More'
		),	
	array(
			'name' => 'Custom Thumbnail Link',
			'desc' => 'Enter a custom URL for the thumbnail or leave this blank to open the portfolio item itself.',
			'id' => 'portfolios_thumbnail_link',
			'type' => 'text',
			'std' => ''
		),	
	array(
			'name' => 'Custom Read More Link',
			'desc' => 'Enter a custom URL for the read more button or leave this blank to open the portfolio item itself.',
			'id' => 'portfolios_read_more_link',
			'type' => 'text',
			'std' => ''
		),	
	array(
			'name' => 'Disable the read more button',
			'desc' => 'Portfolios to disable the read more button.',
			'id' => 'portfolios_read_more_disable',
			'type' => 'checkbox',
			'std' => ''
		),	

	array( "name" => "Lightbox on Portfolio items",
		  "id" => "portfolios_lightbox_disable",
		  "type" => "select",
		  "options" => array("enable"=>"Enable Lightbox", "disable"=>"Disable Lightbox"),
		  "std" => "enable",
		  "desc" => "Enable/Disable lightbox on Portfolio items.",
		),

	/* Custom category V4*/
	array(
			'name' => 'Background Slider Category ID',
			'desc' => 'Instead of a Single Background Image which can be uploaded/assigned above, here you can assign a Slider Category to display. To display a Slider as your Background, first create the Category via "Slider" and then go add/create your new Background Images.',
			'id' => 'kingsize_portfolio_background_slider_id',
			'type' => 'text',
			'std' => ''
		),	

	/* Video background options V4 */
		array("name" => "Custom Portfolio Video Background", "id" => "kingsize_portfolio_video_background",  'type' => 'text', 'desc'=>'Enter the URL of the Background Video<B>(Youtube/Vimeo/MP4)</B> you want to use on this page being created.It will override the page background image(if any).'),

		array("name" => "Autoplay Video", "id" => "kingsize_portfolio_autoplay_video",  'type' => 'checkbox', 'std' => '','desc'=>'If checked video will autoplay.'),

		array("name" => "Controlbar Video", "id" => "kingsize_portfolio_controlbar_video",   'type' => 'checkbox','std' => '', 'desc'=>'If checked hide the controlbar.'),

		array("name" => "Repeat Video", "id" => "kingsize_portfolio_repeat_video",   'type' => 'checkbox','std' => '','desc'=>'If checked video will repeat.'),

		/* Hide the content and Menu option v4*/
		array("name" => "Hide the body content", "id" => "kingsize_portfolio_hide_content",  'type' => 'checkbox', 'std' => '','desc'=>'If checked will hide the body content on page load.'),

		array("name" => "Hide the Menu", "id" => "kingsize_portfolio_hide_menu",  'type' => 'checkbox', 'std' => '','desc'=>'If checked will hide the menu on page load.'),
		
		/*Turn off the sidebar v4*/
		array("section" => "Disable the Sidebar", "name" => "Disable the Sidebar", "id" => "portfolio_sidebar_hide",  "title" => "Hide the Sidebar", 'type' => 'checkbox', 'desc'=>'If checked will hide the sidebar on this item.'),

	
	),
	
);


 
$meta_box = array(
	'id' => 'kingsize-meta-box',
	'title' => 'Image / Photo Portfolio Thumbnail Settings',
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
			'name' => 'Portfolio Thumbnail',
			'desc' => 'Upload your thumbnail here. To add additional images, use the "Upload/Insert" option at the top to attach more photos to your Portfolio item when lightbox is opened.',
			'id' => 'upload_image',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => 'upload_image_button',
			'type' => 'button',
			'std' => 'Browse'
		),	
		
	),
	
);


$meta_box_video = array(
	'id' => 'kingsize-meta-box-video',
	'title' => 'Video Portfolio - Thumbnail &amp; Video Settings',
	'page' => 'portfolio',
	'context' => 'normal', //side
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Image Thumbnail for video',
			'desc' => '330px (width) by 220px (height)',
			'id' => 'upload_image_thumb',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => 'upload_image_button_thumb',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => 'Youtube or Vimeo URL',
			'desc' => __('If you are using YouTube or Vimeo, enter in the URL. To adjust Width and Height of your videos, ie., add "<b>&width=700&height=800</b>" to the end of the Youtube / Vimeo URL.', 'framework'),
			'id' => 'kingsize_video_url',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => 'Embedded Code',
			'desc' => __('If you are using something other than YouTube or Vimeo, paste the embed code here. To remove, you would simply erase the entire contents of this box and now save.', 'framework'),
			'id' => 'kingsize_embed_code',
			'type' => 'textarea',
			'std' => ''
		),
	),
	
);


add_action('admin_menu', 'kingsize_add_box');


/*------------------------------------------------------------------*/
#####################  Add metabox to edit page  #####################
/*------------------------------------------------------------------*/
 
function kingsize_add_box() {
	global $meta_box, $meta_box_settings, $meta_box_video;

	add_meta_box($meta_box_settings['id'], $meta_box_settings['title'], 'kingsize_show_box_settings', $meta_box_settings['page'], $meta_box_settings['context'], $meta_box_settings['priority']);
	
	add_meta_box($meta_box['id'], $meta_box['title'], 'kingsize_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
	
	add_meta_box($meta_box_video['id'], $meta_box_video['title'], 'kingsize_show_box_video', $meta_box_video['page'], $meta_box_video['context'], $meta_box_video['priority']);

	//-----
}


function kingsize_show_box() {
	global $meta_box, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('<strong>Not for the Use of Videos</strong> - This is the thumbnail used for Photo / Image Portfolio Items. Browse your desktop now to select a desired image.', 'framework').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="kingsize_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}

	}
 
	echo '</table>';
}


function kingsize_show_box_settings() {
	global $meta_box_settings, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Here you will be able to setup various options pertaining specifically to your single Portfolio Item, such as Read More Text and Link, Background Image...', 'framework').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="kingsize_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_settings['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) { 
			

			//fields	
			case 'checkbox':			
				$checked = $meta == '1' ? "checked" : "";				
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				echo "<input type='checkbox' name='".$field['id']."' id='".$field['id']."' value='1' $checked />";
			break;

			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;

			//If Select		
			case 'select':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';

			echo '<select name="'.$field['id'].'" id="'.$field['id'].'" style="width:200px">';
				foreach ($field['options'] as $key_opt=>$option) { ?>
					 <option value="<?php echo $key_opt;?>" <?php if ( $meta == $key_opt) { echo ' selected="selected"'; } elseif ($option == $field['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } 
			echo '</select>';
			
			break;
 
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}

	}
 
	echo '</table>';
}


function kingsize_show_box_video() {
	global $meta_box_video, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings are specific to Video Portfolio items and <strong>not for the use Image/Photo Portfolio items</strong>. Use these settings to define the Video used along with Thumbnail.', 'framework').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="kingsize_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}

	}
 
	echo '</table>';
}
//------
 
add_action('save_post', 'kingsize_save_data');


/*-----------------------------------------------------------------------*/
#####################  Save data when post is edited  #####################
/*-----------------------------------------------------------------------*/
 
function kingsize_save_data($post_id) {
	global $meta_box, $meta_box_settings, $meta_box_video;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['kingsize_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	foreach ($meta_box_settings['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	
	foreach ($meta_box_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	//----
}


/*-------------------------------------------------------*/
#####################  Queue Scripts  #####################
/*-------------------------------------------------------*/
 
function kingsize_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('kingsize-upload', get_template_directory_uri() . '/lib/portfolio/js/kingsize-portfolio-upload-button.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('kingsize-upload');
}
function kingsize_admin_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'kingsize_admin_scripts');
add_action('admin_print_styles', 'kingsize_admin_styles');