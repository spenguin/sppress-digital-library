<?php
/**
 * Create the Shortcodes
*/

createShortcodes();

function createShortcodes()
{
   add_shortcode( 'flipbooklibrary', 'displayLibrary' );

}


function displayLibrary()
{   
    $pageNo = 1; //( 1 == count( $segments ) ) ? 1 : $segments[1];
    ob_start();
        do_action( 'display_library', $pageNo ); 
    return ob_get_clean();
    //include_once( './wp-content/plugins/flipbooklibrary/templates/flipbookpage.php' );


}