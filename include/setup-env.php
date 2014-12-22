<?php

/**
 * Set up environment
 */

// Set up error reporting
if ( ! defined( 'E_STRICT' ) ) {
	define( 'E_STRICT', 2048 );
}
error_reporting( E_ALL & ~E_STRICT );
@ini_set( 'log_errors', false );

// Set up variable printing & error handling
include_once( APP_DIR . '/include/xvardump.php' );
include_once( APP_DIR . '/include/functions.php' );
set_error_handler( 'do_handle_errors' );

// Make sure version id constant is available
if ( ! defined( 'PHP_VERSION_ID' ) ) {
	$version = PHP_VERSION;
	define( 'PHP_VERSION_ID', (int) ( $version{0} * 10000 + $version{2} * 100 + $version{4} ) );
}

// Use C locale for Ctype functions
setlocale( LC_CTYPE, 'C' );

// Set timezone
if ( PHP_VERSION_ID > 50100 ) {
	date_default_timezone_set( 'UTC' );
}

// Minified js & css ?
if ( ( isset( $_SERVER['HTTP_HOST'] ) && $_SERVER['HTTP_HOST'] === 'phpcheatsheets.com' ) || ( isset( $_SERVER['SERVER_NAME'] ) && $_SERVER['SERVER_NAME'] === 'phpcheatsheets.com' ) ) {
	$min = '.min';
}
else {
	$min = '';
}

// js & css directory change ?
$dir = '';

// Live or autogenerated ?
$autogen = false;