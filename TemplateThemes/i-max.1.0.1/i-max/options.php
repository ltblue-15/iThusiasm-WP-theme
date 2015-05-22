<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */
 
 
/*
function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}
*/

function optionsframework_option_name() {
       $themename = get_option( 'stylesheet' );
       $themename = preg_replace( "/\W/", "_", strtolower( $themename ) );
       return $themename;
}

if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

    // Get theme options
    $options = get_option( 'optionsframework' );

    // Return specific option
    if ( isset( $options[$name] ) ) {
        return $options[$name];
    }
    return $default;
}

endif;
/**/
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'imax'),
		'two' => __('Two', 'imax'),
		'three' => __('Three', 'imax'),
		'four' => __('Four', 'imax'),
		'five' => __('Five', 'imax')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'imax'),
		'two' => __('Pancake', 'imax'),
		'three' => __('Omelette', 'imax'),
		'four' => __('Crepe', 'imax'),
		'five' => __('Waffle', 'imax')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories[] = "All";
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'imax'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Phone Number', 'imax'),
		'desc' => __('Phone number that appears on top bar.', 'imax'),
		'id' => 'top_bar_phone',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		

	$options[] = array(
		'name' => __('Email Address', 'imax'),
		'desc' => __('Email Id that appears on top bar.', 'imax'),
		'id' => 'top_bar_email',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');		
		
	$options[] = array( 
		"name" => "Site header logo",
		"desc" => "Width 280px, height 72px max. Upload logo for header",
		"id" => "itrans_logo_image",
		"type" => "upload");
		
	$options[] = array( 
		"name" => "Site title/slogan (optional)",
		"desc" => "if you are using a logo and want your site title or slogan to appear on the header banner",
		"id" => "itrans_slogan",
		'std' => '',
		"type" => "text");

	$options[] = array(
		'name' => __('Layout Options', 'imax'),
		'type' => 'heading');
		
				
	$options[] = array(
		'name' => __( 'Primary Color', 'imax' ),
		'desc' => __( 'Choose your theme color', 'imax' ),
		'id' => 'itrans_primary_color',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => "Blog Posts Layout",
		'desc' => "Choose blog posts layout (one column/two column)",
		'id' => "itrans_blog_layout",
		'std' => "onecol",
		'type' => "images",
		'options' => array(
			'onecol' => $imagepath . 'onecol.png',		
			'twocol' => $imagepath . 'twocol.png')
	);
	
	$options[] = array(
		'name' => __('Show Full Content', 'imax'),
		'desc' => __('Show full content on blog pages', 'imax'),
		'id' => 'full_content',
		'std' => '',
		'type' => 'checkbox');		
		
	$options[] = array(
		'name' => __('Wide layout', 'imax'),
		'desc' => __('Check to have wide layout', 'imax'),
		'id' => 'boxed_type',
		'std' => '',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __( 'Body Background', 'imax' ),
		'desc' => __( 'Change the background image/color.', 'imax' ),
		'id' => 'itrans_background_style',
		'std' => $background_defaults,
		'type' => 'background'
	);
	
	$options[] = array(
		'name' => __('Additional style', 'imax'),
		'desc' => __('add extra style(CSS) codes here', 'imax'),
		'id' => 'itrans_extra_style',
		'std' => '',
		'type' => 'textarea');	
		
		
				
	$options[] = array(
		'name' => __('Social Links ', 'imax'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Facebook', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_facebook',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Twitter', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_twitter',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Pinterest', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_pinterest',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Flickr', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_flickr',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('RSS', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_feed',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_instagram',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google plus', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_social_googleplus',
		'std' => '',
		'type' => 'text');
				
		
	/* Sliders */
	$options[] = array(
		'name' => __('Slider', 'imax'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Slide Duration', 'imax'),
		'desc' => __('slide visibility in milisecond ', 'imax'),
		'id' => 'itrans_sliderspeed',
		'std' => '6000',
		'class' => 'mini',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide1 Title', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide1_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide1 Description', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide1_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide1 Link text', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide1_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide1 Link URL', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide1_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide1 Image', 'imax'),
		'desc' => __('Ideal image size width: 1200px and height: 440px', 'imax'),
		'id' => 'itrans_slide1_image',
		'std' => '',
		'type' => 'upload');


	$options[] = array(
		'name' => __('Slide2 Title', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide2_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide2 Description', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide2_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide2 Link text', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide2_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide2 Link URL', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide2_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide2 Image', 'imax'),
		'desc' => __('Ideal image size width: 1200px and height: 440px', 'imax'),
		'id' => 'itrans_slide2_image',
		'std' => '',
		'type' => 'upload');



	$options[] = array(
		'name' => __('Slide3 Title', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide3_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide3 Description', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide3_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide3 Link text', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide3_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide3 Link URL', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide3_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide3 Image', 'imax'),
		'desc' => __('Ideal image size width: 1200px and height: 440px', 'imax'),
		'id' => 'itrans_slide3_image',
		'std' => '',
		'type' => 'upload');



	$options[] = array(
		'name' => __('Slide4 Title', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide4_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slide4 Description', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide4_desc',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Slide4 Link text', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide4_linktext',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide4 Link URL', 'imax'),
		'desc' => __('', 'imax'),
		'id' => 'itrans_slide4_linkurl',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Slide4 Image', 'imax'),
		'desc' => __('Ideal image size width: 1200px and height: 440px', 'imax'),
		'id' => 'itrans_slide4_image',
		'std' => '',
		'type' => 'upload');
		
		
	/* Front Page */
	$options[] = array(
		'name' => __('Default Blog Page', 'imax'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Hide i-max Slider', 'imax'),
		'desc' => __('Hide default i-max slider', 'imax'),
		'id' => 'hide_front_slider',
		'std' => '',
		'type' => 'checkbox');	
				
		
	$options[] = array(
		'name' => __('Other Slider Shortcode', 'imax'),
		'desc' => __('Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'imax'),
		'id' => 'other_front_slider',
		'std' => '',
		'type' => 'text');
		

	
	
	
	/*
	$options[] = array( 'name' => __( 'Typography', 'theme-textdomain' ),
		'desc' => __( 'Example typography.', 'theme-textdomain' ),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography'
	);
	
	$options[] = array(
		'name' => __( 'Custom Typography', 'theme-textdomain' ),
		'desc' => __( 'Custom typography options.', 'theme-textdomain' ),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);	
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	$options[] = array(
		'name' => __( 'Default Text Editor', 'theme-textdomain' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'theme-textdomain' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	$options[] = array(
		'name' => __( 'Select a Page', 'theme-textdomain' ),
		'desc' => __( 'Passed an pages with ID and post_title', 'theme-textdomain' ),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages
	);
	
	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category', 'theme-textdomain' ),
			'desc' => __( 'Passed an array of categories with cat_ID and cat_name', 'theme-textdomain' ),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories
		);
	}
	*/		
				


	return $options;
}