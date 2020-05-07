<?php

/**
 * @package Coders Rank Widget
 * @version 1.0
 */
/*
Plugin Name: Coders Rank Widget
Plugin URI: https://www.andremesquita.com/coders/rank/widget-wordpress-plugin-opensource/
Description: This is a plugin to shows CodersRank.io badge.
Version: 1.0.0
Author: Andre Mesquita
Author URI: https://www.andremesquita.com/
Text-Domain: Shows CodersRank.io badge
*/

/*
 * Coders Rank Widget
 */
if(!defined('ABSPATH')){
	exit;
}

// Load Class
require_once(dirname(__FILE__).'/includes/coders-rank-widget-class.php');

// Register Widget
function wpb_avm_crw_widget() {
    register_widget( 'wpb_crw_widget' );
}
// Hook in function
add_action( 'widgets_init', 'wpb_avm_crw_widget' );
 
	
?>