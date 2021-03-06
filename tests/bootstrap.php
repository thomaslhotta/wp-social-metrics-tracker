<?php

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../src/social-metrics-tracker.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

function console_log($msg, $title=false) {
	print("\n========== $title:");

	$msg = (is_array($msg)) ? print_r($msg, true) : $msg;

	print("\n$msg\n");

	print("==========\n");
}