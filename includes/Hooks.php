<?php
/**
 * Create Hooks (Actions and Filters)
 */

add_action( 'display_library', 'display_before_library_page', 10 );
add_action( 'display_library', 'display_library_page', 20 );
add_action( 'display_library', 'display_after_library_page', 30 );

function display_before_library_page()
{
    include_once( FBL_TEMPLATES . 'display/before_library_page.php' ); 
}


function display_library_page()
{
    $args   = [
        'post_type'         => 'flipbook',
        'posts_per_page'    => -1,
        'status'            => 'published',
        'orderby'           => 'title'
    ];

    $query  = new WP_Query( $args );

    $titles = [];

    if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
        $titles[]   = [
            'id'    => $query->post->ID,
            'title' => $query->post->post_title
        ];

    endwhile; endif; wp_reset_query();
    
    include_once( FBL_TEMPLATES . 'display/library_page.php' );
}

function display_after_library_page()
{
    include_once( FBL_TEMPLATES . 'display/after_library_page.php' ); 
}