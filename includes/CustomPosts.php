<?php
/**
 * Create Custom Post Types required for Flipbook Library plugin
 * cpt: flipbooks
 */
namespace FlipbookCustomPostTypes;

\FlipbookCustomPostTypes\initialise();

function initialise()
{
    add_action( 'init', '\FlipbookCustomPostTypes\create_post_type' );
    add_action( 'add_meta_boxes', '\FlipbookCustomPostTypes\register_meta_boxes' );
    add_action( 'save_post', '\FlipbookCustomPostTypes\save_meta_box' );
    //add_action( 'init', '\FlipbookCustomPostTypes\rewrite_rule' );
    //add_action( 'init', '\FlipbookCustomPostTypes\create_custom_taxonomy' );
}

function create_post_type() {
    register_post_type( 'flipbook',
      array(
        'labels' => array(
          'name' => __( 'Flipbooks' ),
          'singular_name' => __( 'Flipbook' )
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'thumbnail', 'editor' )        
      )
    );
}

function register_meta_boxes()
{
    add_meta_box( 'pdfurl', __( 'PDF URL' ), '\FlipbookCustomPostTypes\pdfurl_callback', 'flipbook');
    //add_meta_box( 'imagepath', __( 'Image Path' ), '\FlipbookCustomPostTypes\image_path_callback', 'flipbook');
}


function pdfurl_callback( $post )
{
    include FBL_TEMPLATES . 'admin/pdf-path-form.php';
}

function image_path_callback( $post )
{
    include FBL_TEMPLATES . 'admin/image-path-form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'pdfurl',
        'image_path'
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
    }
}

/**
 * Add rewrite rules
 *
 * @link https://codex.wordpress.org/Rewrite_API/add_rewrite_rule
 */
function fs_rewrite_rule()
{
	add_rewrite_rule( '^fonts/([^/]*)/?', 'index.php?pagename=fonts&fontFamily=$matches[1]', 'top' );
}

/*
function create_custom_taxonomy()
{
    $labels = array(
        'name' => _x( 'Variants', 'taxonomy general name' ),
        'singular_name' => _x( 'Variant', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Variants' ),
        'all_items' => __( 'All Variants' ),
        'parent_item' => __( 'Parent Variant' ),
        'parent_item_colon' => __( 'Parent Variant:' ),
        'edit_item' => __( 'Edit Variant' ), 
        'update_item' => __( 'Update Variant' ),
        'add_new_item' => __( 'Add New Variant' ),
        'new_item_name' => __( 'New Variant Name' ),
        'menu_name' => __( 'Variants' ),
    ); 	
    
    register_taxonomy('variant',array('font'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'variant' ),
    ));
    $labels = array(
        'name' => _x( 'Classifications', 'taxonomy general name' ),
        'singular_name' => _x( 'Classification', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Classifications' ),
        'all_items' => __( 'All Classifications' ),
        'parent_item' => __( 'Parent Classification' ),
        'parent_item_colon' => __( 'Parent Classification:' ),
        'edit_item' => __( 'Edit Classification' ), 
        'update_item' => __( 'Update Classification' ),
        'add_new_item' => __( 'Add New Classification' ),
        'new_item_name' => __( 'New Classification Name' ),
        'menu_name' => __( 'Classifications' ),
    ); 	
    
    register_taxonomy('classification',array('font'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'classification' ),
    )); 
 
   
}*/