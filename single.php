<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$data = Timber::get_context();
$post = Timber::query_post();
$data['post'] = $post;
$data['comment_form'] = TimberHelper::get_comment_form();

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
		'tax_query' => array(
				array(
				'taxonomy' => 'team-cat',
				'terms' => $term->term_id)
	));
	$holder[$term->slug] = Timber::get_posts(${"args_".$term->slug});
}

$data['holder'] = $holder;



//related posts
$related_posts = get_field('related', $post->ID);
if($related_posts ){
	foreach ($related_posts as $rel) {
		$data['post_related'][] =  new TimberPost($rel->ID);
	}
}

// Quote's
$data['quote'] = Timber::get_post('post_type=quotes&post_status=publish&orderby=rand');


//page-title
//$data['page_title'] = 'Over ons';

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $data );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $data );
}
