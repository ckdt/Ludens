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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$blog_items = array(
	'post_type'=> 'post',
	'paged' => $paged,
	'posts_per_page'=> 3,
	'status' => 'publish',
	'order' => 'DESC',
);
$data['posts'] = Timber::get_posts($blog_items);//get normal posts
$data['tweets'] = Timber::get_posts('post_type=tweet');//get tweets
$data['tweet_count'] = count(get_posts('post_type=tweet')) - 1; //number of tweets

//pagination blog -----------------------------
$data['current_page'] = get_query_var('paged');
$data['pages'] = ceil(wp_count_posts( 'post' )->publish / 3);

//get next page
if(get_query_var('paged') == 0){
		$data['next_page'] = get_query_var('paged') + 2;
	} else {
		$data['next_page'] = get_query_var('paged') + 1;
}

//get previous page
$data['previous_page'] = get_query_var('paged') - 1;



// Quote's
$data['quote'] = Timber::get_post('post_type=quotes&post_status=publish&orderby=rand');

$templates = array( 'page-blog.twig' );


Timber::render( $templates, $data );
