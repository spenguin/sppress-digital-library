<?php
/*
Plugin Name: Flipbook Library
Plugin URI:  https://www.soaringpenguin.com/flipbooklibrary
Description: A flipbook library generated from provided PDFs
Version:     0.0.1
Author:      John Anderson/Soaring Penguin
Author URI:  https://soaringpenguin.com
Copyright:   Copyright 2020 Soaring Penguin Lrd
Text Domain: flipbooklibrary
*/
defined( 'ABSPATH' ) or die( 'Access denied.' );

define( 'FBL_CORE', dirname( __FILE__) ); 
define( 'FBL_INCLUDES', FBL_CORE . '/includes/' );
define( 'FBL_TEMPLATES', FBL_CORE . '/templates/' );
define( 'FBL_VENDOR', FBL_CORE . '/vendor/' );

//var_dump( dirname(__FILE__, 3 ) );


// Test minimum requirements
require_once( FBL_INCLUDES . 'FlipbookLibraryPlugin.php' );

if( !FlipbookLibraryPlugin::test() )
{
	// echo error
	exit();
}
FlipbookLibraryPlugin::initialise();

//require_once( FBL_INCLUDES . 'Database.php' );
require_once( FBL_INCLUDES . 'CustomPosts.php' );
require_once( FBL_INCLUDES . 'Images.php' );
//require_once( FBL_INCLUDES . 'Upload.class.php' );
//require_once( FBL_INCLUDES . 'Admin.php' );
require_once( FBL_INCLUDES . 'Shortcodes.php' );
//require_once( FBL_INCLUDES . 'Pricing.php' );
require_once( FBL_INCLUDES . 'Pages.php' );
//require_once( FBL_INCLUDES . 'Orders.class.php' );
//require_once( FBL_INCLUDES . 'Functions.php' );
//require_once( FBL_INCLUDES . 'PaymentGateways.php' );
require_once( FBL_INCLUDES . 'Hooks.php' );
require_once( FBL_INCLUDES . 'Scripts.php' );
//require_once( FBL_INCLUDES . 'Actions.php' );
//require_once( FBL_INCLUDES . 'Display.php' );
//require_once( FBL_INCLUDES . 'AssetManagement.class.php' );

// Run databases
//Database::run();
//CustomPosts::run();

// We'll need Session variables
if (!session_id()) {
    session_start();
}