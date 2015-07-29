<?php
/**
 * Template Name: About Page
 * Description: Page & Team members
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
$data['team_members'] = Timber::get_posts('post_type=team&post_status=publish&orderby=menu_order&order=ASC&posts_per_page=-1');
$data['team_categories'] = Timber::get_terms('team-cat');

$templates = array( 'page-about.twig' );


Timber::render( $templates, $data );