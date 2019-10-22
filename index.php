<?php
/*
Plugin Name: Get Melbet Link
Description: Get Current Melbet refferal link. Use shortcode [getMelbetLink] to get current link
Version: 1.0
Author: Alex Rusin
Author URI: https://webweb.space/
License: GPLv2 or later
Text Domain: melbet-link
*/

include 'madeline.php';

function melbet_styles() {
	wp_register_style('melbet-style', plugin_dir_url( __FILE__ ) . 'assets/style.css');
	wp_enqueue_style('melbet-style');
}    
add_action( 'wp_enqueue_scripts', 'melbet_styles' );

function melbet_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//code.jquery.com/jquery-1.12.4.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
	wp_register_script('melbet-script', plugin_dir_url( __FILE__ ) . 'custom.js', false, null, true);
	wp_enqueue_script('melbet-script');
}    
add_action( 'wp_enqueue_scripts', 'melbet_scripts' );

function getMelbetLink() {
	return '<div class="load-link">Показать ссылку</div>';
}
add_shortcode('getMelbetLink','getMelbetLink');

?>