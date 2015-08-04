<?php
/**
 * Template Name: Cases
 * Description: All cases
 *
 * @package		WordPress
 * @subpackage	Ludens
 * @since 		Ludens 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$data = Timber::get_context();
$data['page'] = new TimberPost();

// Cases
$data['cases'] = Timber::get_posts('post_type=cases&post_status=publish&orderby=menu_order&order=ASC&posts_per_page=6');

// Klanten
$data['client_items'] = Timber::get_posts('post_type=klanten&post_status=publish&orderby=menu_order&order=ASC');

// Quote's
$data['quote'] = Timber::get_post('post_type=quotes&post_status=publish&orderby=rand');

$templates = array( 'page-cases.twig' );


Timber::render( $templates, $data );
