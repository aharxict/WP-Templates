<?php

function scripts() {

	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), NULL, true );
	wp_localize_script('main-script', 'magicalData', array(
		'nonce' => wp_create_nonce('wp_rest'),
		'siteURL' => get_site_url()
	));

}
add_action( 'wp_enqueue_scripts', 'scripts' );
