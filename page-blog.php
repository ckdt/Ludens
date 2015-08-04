<?php
/**
 * Template Name: Blog
 * Description: All blogposts
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

// Blog
$data['posts'] = Timber::get_posts('post_type=post&post_status=publish&orderby=menu_order&order=ASC&posts_per_page=2');

// Quote's
$data['quote'] = Timber::get_post('post_type=quotes&post_status=publish&orderby=rand');

$templates = array( 'page-blog.twig' );


Timber::render( $templates, $data );
