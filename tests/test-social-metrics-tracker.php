<?php

class SocialMetricsTrackerTests extends WP_UnitTestCase {

	private $plugin;

	// DO BEFORE ALL TESTS
	function setUp() {
		parent::setUp();

		$this->plugin = new SocialMetricsTracker();
		$this->plugin->init();
	}

	// DO AFTER ALL TESTS
	function tearDown() {
		parent::tearDown();
	}

	/***************************************************
	* The plugin must call the init function at the right time. 
	***************************************************/
	function test_has_init() {
		$this->assertTrue(
			is_int(has_action('init', array($this->plugin, 'init'))), 
			'The plugin does not have an init function!'
		);
	}

	/***************************************************
	* Must ensure default options exist always. 
	***************************************************/
	function test_options_defaults() {
		$this->assertTrue(
			is_array($this->plugin->options),
			'The plugin does not create default options!'
		);
	}

	/***************************************************
	* 1. Tracked post types always returns an array
	* 2. Items returned must be valid, public post types
	***************************************************/
	function test_tracked_post_types() {

		// 1:
		$result = $this->plugin->tracked_post_types();

		$this->assertTrue(
			is_array($result),
			'Must return an array'
		);

		// 2:
		$valid_types = get_post_types( array( 'public' => true ), 'names' );

		$this->assertTrue(
			count(array_intersect($result, $valid_types)) == count($result),
			'Returned an WP post type that did not exist!'
		);
	}



}

