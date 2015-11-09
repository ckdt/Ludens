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

// Team
$data['team_members'] = Timber::get_posts('post_type=team&post_status=publish&orderby=menu_order&order=ASC&posts_per_page=-1');
$data['team_categories'] = Timber::get_terms('team-cat');

$holder = array();
$taxonomy = Timber::get_terms( 'team-cat');
foreach($taxonomy as $term){
	${"args_".$term->slug} = array(
		'post_type' => 'team',
		'orderby' => 'menu_order',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => array(
				array(
				'taxonomy' => 'team-cat',
				'terms' => $term->term_id)
	));
	$holder[$term->slug] = Timber::get_posts(${"args_".$term->slug});
}

$data['holder'] = $holder;




// Quote's
$data['quote'] = Timber::get_post('post_type=quotes&post_status=publish&orderby=rand');

$templates = array( 'page-about.twig' );


Timber::render( $templates, $data );
