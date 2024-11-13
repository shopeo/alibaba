<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require_once 'vendor/autoload.php';
}

if (!function_exists('trade_ace_setup')) {
	function trade_ace_setup()
	{
		//theme support

		//load languages
		load_theme_textdomain('trade-ace', get_template_directory() . '/languages');
	}
}

add_action('after_setup_theme', 'trade_ace_setup');

if (!function_exists('trade_ace_enqueue_scripts')) {
	function trade_ace_enqueue_scripts()
	{
		$theme_version = wp_get_theme()->get('Version');
		//style
		wp_enqueue_style('trade-ace-style', get_template_directory_uri() . '/style.css', array(), $theme_version);
		wp_style_add_data('trade-ace-style', 'rtl', 'replace');
		//scripts
		wp_enqueue_script('trade-ace-script', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), $theme_version);
		wp_script_add_data('trade-ace-script', 'async', true);
	}
}

add_action('wp_enqueue_scripts', 'trade_ace_enqueue_scripts', 18);
