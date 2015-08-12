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

//var_dump(get_posts(array('post_type'=> array('tweet','post'))));//
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$blog_items = array(
	'post_type'=> 'post',//array('tweet','post'),
	'paged' => $paged,
	'posts_per_page'=> 6,
	'status' => 'publish',
	'order' => 'DESC',
	//'orderby' => 'rand'
);
$data['posts'] = Timber::get_posts($blog_items);

$data['current_page'] = get_query_var('paged');




$data['tweets'] = Timber::get_posts('post_type=tweet');




// Quote's
$data['quote'] = Timber::get_post('post_type=quotes&post_status=publish&orderby=rand');

$templates = array( 'page-blog.twig' );


Timber::render( $templates, $data );
