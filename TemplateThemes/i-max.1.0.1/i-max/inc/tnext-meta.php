<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'imax_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function imax_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'imax_';
	
	$imax_template_url = get_template_directory_uri();

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'heading',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Page Heading Options', 'imax' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Hide Title
			array(
				'name' => __( 'Hide Title', 'imax' ),
				'id'   => "{$prefix}hidetitle",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
				'class' => 'hide-ttl',
			),
			array(
				'name' => __( 'Show Default i-max Slider', 'imax' ),
				'id'   => "{$prefix}show_slider",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
				'class' => 'show-slider',
			),			
					
			// Custom Title
			array(
				// Field name - Will be used as label
				'name'  => __( 'Custom title', 'imax' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}customtitle",
				// Field description (optional)
				'desc'  => __( 'Enter custom title for the page', 'imax' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'imax' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),
			
			// hide breadcrum
			array(
				'name' => __( 'Hide breadcrumb', 'imax' ),
				'id'   => "{$prefix}hide_breadcrumb",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),
			
			// Custom Title
			array(
				// Field name - Will be used as label
				'name'  => __( 'Other Slider Plugin Shortcode', 'imax' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}other_slider",
				// Field description (optional)
				'desc'  => __( 'Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'imax' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'imax' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),			
			

		)
	);
	
	
	
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'portfoliometa',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Portfolio Meta', 'ispirit' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'portfolio' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Side bar

			// ITEM DETAILS OPTIONS SECTION
			array(
				'type' => 'heading',
				'name' => __( 'Portfolio Additinal Details', 'nx-admin' ),
				'id'   => 'fake_id_pf1', // Not used but needed for plugin
			),
			// Slide duration
			array(
				'name'  => __( 'Subtitle', 'nx-admin' ),
				'id'    => "{$prefix}portfolio_subtitle",
				'desc'  => __( 'Enter a subtitle for use within the portfolio item index (optional).', 'nx-admin' ),				
				'type'  => 'text',
			),
			
			array(
				'name'  => __( 'Portfolio Link(External)', 'nx-admin' ),
				'id'    => "{$prefix}portfolio_url",
				'desc'  => __( 'Enter an external link for the item (optional) (NOTE: INCLUDE HTTP://).', 'nx-admin' ),				
				'type'  => 'text',
			),
			/*
			// ITEM DETAILS OPTIONS SECTION
			array(
				'type' => 'heading',
				'name' => __( 'Portfolio Layout Options', 'nx-admin' ),
				'id'   => 'fake_id_pf2', // Not used but needed for plugin
			),
			//Media display option
			array(
				'name' => __('Portfolio Layout', 'nx-admin'),
				'id'   => "{$prefix}folio_disply_type",
				'type' => 'select',
				'options' => array(
					'0'	=> __('Default Single Column', 'nx-admin'),
					'1'	=> __('Two Column Side By Side', 'nx-admin'),
				),
				'multiple' => false,
				'std'  => '0',
				'desc' => __('Choose how you would like to have your portfolio details page', 'nx-admin'),
			),
			// Show Social Share
			array(
				'name' => __( 'Show Social Share', 'ispirit' ),
				'id'   => "{$prefix}nx_show_social",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0
			),
			// Show Related Posts
			array(
				'name' => __( 'Show Related Posts', 'ispirit' ),
				'id'   => "{$prefix}nx_show_related",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0
			),
			*/																	

		)
	);		
	

	
	return $meta_boxes;
}

	function nx_get_category_list_key_array($category_name) {
			
		$get_category = get_categories( array( 'taxonomy' => $category_name	));
		$category_list = array( 'all' => 'Select Category');
		
		foreach( $get_category as $category ){
			if (isset($category->slug)) {
			$category_list[$category->slug] = $category->cat_name;
			}
		}
			
		return $category_list;
	}	

