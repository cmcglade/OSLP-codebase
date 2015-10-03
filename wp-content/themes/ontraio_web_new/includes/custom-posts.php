<?php 
function get_attachment_id_from_src ($image_src) { 
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query); 
		return $id;

	}
add_action( 'init', 'create_slider_types' );
add_action( 'init', 'create_resource_types' );  
add_action( 'init', 'create_process_types' );  
function create_resource_types() {
	 $resource_suuports=array('thumbnail','title','editor') ;
	genertate_custom_post_type('Resource',$resource_suuports,'resource');
}
function create_slider_types() {
	 $slider_suuports=array('thumbnail','title','editor') ;
	genertate_custom_post_type('Home Slider',$slider_suuports,'slider');
}
function create_process_types() {
	 $slider_suuports=array('title','editor') ;
	genertate_custom_post_type('Process Circle',$slider_suuports,'process-circle');
} 
 
///Below is the Core Function to Create Custom Posts Type//

function genertate_custom_post_type($posttype_name,$supports,$slug_name_of_type)

{

	$labels = array(

		'name' => _x($posttype_name, 'post type general name'),

		'singular_name' => _x($posttype_name, 'post type singular name'),

		'add_new' => _x('Add New '.$posttype_name, 'New '.$posttype_name),

		'add_new_item' => __($posttype_name),

		'edit_item' => __('Edit '.$posttype_name),

		'new_item' => __('New '.$posttype_name),

		'view_item' => __('View '.$posttype_name),

		'search_items' => __('Search '.$posttype_name),

		'not_found' =>  __('Nothing found'),

		'not_found_in_trash' => __('Nothing found in Trash'),

		'parent_item_colon' => ''

	);

	$args = array(

		'labels' => $labels,

		'public' => true,

		'publicly_queryable' => true,

		'show_ui' => true,

		'query_var' => true,  

		'rewrite' => true,

		'capability_type' => 'post',  

		'hierarchical' => false,  

		'menu_position' => 6,  
		'has_archive' => true,
		'supports' => $supports

	  ); 

register_post_type( $slug_name_of_type , $args );  

}
function cmb_sample_metaboxes( array $meta_boxes ) {

 	 	$meta_boxes['circle_links'] = array(
		'id'         => 'circle_links',
		'title'      => __( 'Link to', 'cmb' ),
		'pages'      => array( 'process-circle' ),
				'fields'      => array(
			  
				array(
				'name' => __( 'Downloadable Form', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id'   => 'download_form',
				'type' => 'file',
				),
				array(
				'name' => __( 'Related Resource Link', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id'   => 'related_resource',
				'type' => 'text',
				) 
					 
 ),
);
	 
//Page
 	$meta_boxes['page_setting'] = array(
		'id'         => 'page_setting',
		'title'      => __( 'Setting', 'cmb' ),
		'pages'      => array( 'page' ),
				'fields'      => array(
					 
						array(
								'name'    => __( 'Show Process Box?', 'cmb' ),
								'desc'    => __( 'if you want to display caption box', 'cmb' ),
								'id'      => 'show_process',
								'type'    => 'radio_inline',
								'options' => array(
									'yes' => __( 'Yes', 'cmb' ),
									'no'   => __( 'No', 'cmb' )
								),
							),
							array(
									'name' => __( 'Downloadable Files', 'cmb' ),
									'desc' => __( 'field description (optional)', 'cmb' ),
									'id'   =>  'download_files',
									'type' => 'file_list', 
								),
 ),
);

 	$meta_boxes['slider_link'] = array(
		'id'         => 'slider_link',
		'title'      => __( 'Link', 'cmb' ),
		'pages'      => array( 'slider' ),
				'fields'      => array(
					
 					array(
								'name'    => __( 'Enter Read More Link here', 'cmb' ),
								'desc'    => __( '', 'cmb' ),
								'id'      => 'slider_link_text',
								'type'    => 'text',
 						),
						array(
								'name'    => __( 'Enter Read More Link here', 'cmb' ),
								'desc'    => __( '', 'cmb' ),
								'id'      => 'slider_btn_text',
								'type'    => 'text',
 						),
						array(
								'name'    => __( 'Show Caption Box?', 'cmb' ),
								'desc'    => __( 'if you want to display caption box', 'cmb' ),
								'id'      => 'slider_caption_box',
								'type'    => 'radio_inline',
								'options' => array(
									'yes' => __( 'Yes', 'cmb' ),
									'no'   => __( 'No', 'cmb' )
								),
							),
 ),
);

	
	

	 	$meta_boxes['resource_details'] = array(
		'id'         => 'resource_details',
		'title'      => __( 'Details', 'cmb' ),
		'pages'      => array( 'resource' ),
				'fields'      => array(
			 
				array(
				'name' => __( 'Board Name:', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id'   => 'board_name',
				'type' => 'text',
				),
				array(
				'name' => __( 'File Name:', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id'   => 'file_name',
				'type' => 'text',
				),
				array(
				'name' => __( 'PDF Version:', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id'   => 'pdf_file',
				'type' => 'file',
				),
			 
					 
 ),
);
	 
  
return $meta_boxes;

} 
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 ); 
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		require_once 'newmeta/init.php';
	}

}

 


function add_resource_taxonomies() {
	register_taxonomy('resource-category', array('resource'), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Resources Categories', 'taxonomy general name' ),
			'singular_name' => _x( 'Categories', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Categories' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Categories' ),
			'parent_item_colon' => __( 'Parent Categories:' ),
			'edit_item' => __( 'Edit Categories' ),
			'update_item' => __( 'Update Categories' ),
			'add_new_item' => __( 'Add New Categories' ),
			'new_item_name' => __( 'New Categories' ),
			'menu_name' => __( 'Categories' ),
		),
			'rewrite' => array(
			'slug' => 'resource-category', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
			),
	));

}

add_action( 'init', 'add_resource_taxonomies', 0 );

function add_resource_tags() {
	register_taxonomy('resource-tag', array('resource'), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Resources Tags', 'taxonomy general name' ),
			'singular_name' => _x( 'Tags', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Tags' ),
			'all_items' => __( 'All Tags' ),
			'parent_item' => __( 'Parent Tags' ),
			'parent_item_colon' => __( 'Parent Tags:' ),
			'edit_item' => __( 'Edit Tags' ),
			'update_item' => __( 'Update Tags' ),
			'add_new_item' => __( 'Add New Tags' ),
			'new_item_name' => __( 'New Tags' ),
			'menu_name' => __( 'Tags' ),
		),
			'rewrite' => array(
			'slug' => 'resource-tag', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
			),
	));

}

add_action( 'init', 'add_resource_tags', 0 );


//Process Circle

function add_circle_tags() {
	register_taxonomy('circle-tag', array('process-circle'), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Circle Tags', 'taxonomy general name' ),
			'singular_name' => _x( 'Circle Tags', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search  Circle Tags' ),
			'all_items' => __( 'All Circle Tags' ),
			'parent_item' => __( 'Parent  Circle Tags' ),
			'parent_item_colon' => __( 'Parent Circle Tags:' ),
			'edit_item' => __( 'Edit Circle Tags' ),
			'update_item' => __( 'Update Circle Tags' ),
			'add_new_item' => __( 'Add New Circle Tags' ),
			'new_item_name' => __( 'New Tags' ),
			'menu_name' => __( 'Circle Tags' ),
		),
			'rewrite' => array(
			'slug' => 'circle-tag', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
			),
	));

}

add_action( 'init', 'add_circle_tags', 0 );

//New Field For French

function presenters_taxonomy_custom_fields($tag) {  
   // Check for existing taxonomy meta for the term you're editing  
    $t_id = $tag->term_id; // Get the ID of the term you're editing  
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check  
?>  
  
<tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="presenter_id"><?php _e('Title in French'); ?></label>  
    </th>  
    <td>  
        <input type="text" name="term_meta[french_title]" id="term_meta[french_title]" size="25" style="width:60%;" value="<?php echo $term_meta['french_title'] ? $term_meta['french_title'] : ''; ?>"><br />  
        <span class="description"><?php _e('Title in French'); ?></span>  
    </td>  
</tr>  
  
<?php  
}  
function save_taxonomy_custom_fields( $term_id ) {  
    if ( isset( $_POST['term_meta'] ) ) {  
        $t_id = $term_id;  
        $term_meta = get_option( "taxonomy_term_$t_id" );  
        $cat_keys = array_keys( $_POST['term_meta'] );  
            foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['term_meta'][$key] ) ){  
                $term_meta[$key] = $_POST['term_meta'][$key];  
            }  
        }  
        //save the option array  
        update_option( "taxonomy_term_$t_id", $term_meta );  
    }  
}  
// Add the fields to the "presenters" taxonomy, using our callback function  
add_action( 'resource-category_edit_form_fields', 'presenters_taxonomy_custom_fields', 10, 2 );  
  
// Save the changes made on the "presenters" taxonomy, using our callback function  
add_action( 'edited_resource-category', 'save_taxonomy_custom_fields', 10, 2 );  



?>