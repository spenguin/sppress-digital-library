<?php
/**
 * Name required scripts
 */
$path   = plugins_url( 'flipbooklibrary/templates/' ); 

//wp_register_style( 'bootstrap', './../wp-content/plugins/flipbooklibrary/templates/css/bootstrap.min.css' );
//wp_register_style( 'bootstraptheme', './../wp-content/plugins/flipbooklibrary/templates/css//bootstrap-theme.min.css', ['bootstrap'] ); 
//wp_register_style( 'bootstrapstyle', $path . 'css/bootstrap4-styles.css', ['bootstrap'] );

//wp_register_style( 'fontawesome', $path . 'css/fontawesome.min.css' );
//wp_register_style( 'fontawesomesolid', $path . 'css/fontawesome-solid.min.css', ['fontawesome'] );

//wp_register_style( 'flbstyle', $path . 'css/style.css' );

function load_flb_styles()
{
    //wp_enqueue_style( 'bootstrap' );
    //wp_enqueue_style( 'bootstraptheme' );
    //wp_enqueue_style( 'bootstrapstyle' );
    //wp_enqueue_style( 'fontawesome' );
    //wp_enqueue_style( 'fontawesomesolid' );
    //wp_enqueue_style( 'flbstyle' );
}

//add_action( 'wp_enqueue_scripts', 'load_flb_styles' );


wp_register_script( 'jquery', './../wp-content/plugins/flipbooklibrary/templates/js/jquery.min.js' ); //'https://code.jquery.com/jquery-3.5.0.min.js' );
wp_register_script( 'bootstrapjs', './../wp-content/plugins/flipbooklibrary/templates/js/bootstrap.min.js' ); //'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' );

wp_register_script( 'html2canvas', $path . 'js/html2canvas.min.js' );
wp_register_script( 'three', $path . 'js/three.min.js' );
wp_register_script( 'pdf', $path . 'js/pdf.min.js' );

wp_register_script( '3dflipbook', $path . 'js/3dflipbook.js' );

wp_register_script( 'scriptjs', $path . 'js/script.js' ); //, ['jquery', 'bootstrap', 'html2canvas', 'three', 'pdf', '3dflipbook' ] );

function load_flb_scripts()
{
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrapjs' );
    wp_enqueue_script( 'html2canvas' );
    wp_enqueue_script( 'three' );
    wp_enqueue_script( 'pdf' );
    wp_enqueue_script( '3dflipbook' );
    wp_enqueue_script( 'scriptjs' );

}

add_action( 'wp_enqueue_scripts', 'load_flb_scripts' );