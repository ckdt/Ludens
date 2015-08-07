<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		// register menu plek

		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	function register_post_types() {
		// vertalen?
		register_post_type('programmas',
			array(
			'labels' => array(
				'name' => _x('Programmas', 'post type general name', 'ludens'),
				'singular_name' => _x('Programma', 'post type singular name', 'ludens'),
				'add_new' => _x('Add New', 'Programma', 'ludens'),
				'add_new_item' => __('Add New Programma', 'ludens'),
				'edit_item' => __('Edit Programma', 'ludens'),
				'new_item' => __('New Programma', 'ludens'),
				'view_item' => __('View Programma', 'ludens'),
				'search_items' => __('Search Programmas', 'ludens'),
				'not_found' => __('No Programmas found', 'ludens'),
				'not_found_in_trash' => __('No Programmas found in Trash', 'ludens'),
				'parent' => __('Parent Programma', 'ludens'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-nametag',
			'menu_position' => 5,
			'hierarchical' => true,
			'has_archive' => false,
			'supports' => array('title','thumbnail', 'page-attributes', 'editor', 'excerpt'),
			'rewrite' => array('slug' => _x('wat-we-doen', 'URL slug', 'ludens'), 'with_front' => false)
			)
		);
		register_post_type('klanten',
			array(
			'labels' => array(
				'name' => _x('Klanten', 'post type general name', 'ludens'),
				'singular_name' => _x('Klant', 'post type singular name', 'ludens'),
				'add_new' => _x('Add New', 'Klant', 'ludens'),
				'add_new_item' => __('Add New Klant', 'ludens'),
				'edit_item' => __('Edit Klant', 'ludens'),
				'new_item' => __('New Klant', 'ludens'),
				'view_item' => __('View Klant', 'ludens'),
				'search_items' => __('Search Klant', 'ludens'),
				'not_found' => __('No Klanten found', 'ludens'),
				'not_found_in_trash' => __('No Klanten found in Trash', 'ludens'),
				'parent' => __('Parent Klant', 'ludens'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-universal-access',
			'menu_position' => 8,
			'hierarchical' => true,
			'has_archive' => false,
			'supports' => array('title','thumbnail', 'page-attributes'),
			'rewrite' => array('slug' => _x('klanten', 'URL slug', 'ludens'), 'with_front' => false)
			)
		);
		register_post_type('cases',
			array(
			'labels' => array(
				'name' => _x('Cases', 'post type general name', 'ludens'),
				'singular_name' => _x('Case', 'post type singular name', 'ludens'),
				'add_new' => _x('Add New', 'Case', 'ludens'),
				'add_new_item' => __('Add New Case', 'ludens'),
				'edit_item' => __('Edit Case', 'ludens'),
				'new_item' => __('New Case', 'ludens'),
				'view_item' => __('View Case', 'ludens'),
				'search_items' => __('Search Case', 'ludens'),
				'not_found' => __('No Cases found', 'ludens'),
				'not_found_in_trash' => __('No Cases found in Trash', 'ludens'),
				'parent' => __('Parent Case', 'ludens'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-book',
			'menu_position' => 6,
			'hierarchical' => true,
			'has_archive' => false,
			'supports' => array('title','thumbnail', 'page-attributes', 'editor'),
			'rewrite' => array('slug' => _x('cases', 'URL slug', 'ludens'), 'with_front' => false)
			)
		);
		register_post_type('team',
			array(
			'labels' => array(
				'name' => _x('Team', 'post type general name', 'ludens'),
				'singular_name' => _x('Team', 'post type singular name', 'ludens'),
				'add_new' => _x('Add New', 'Member', 'ludens'),
				'add_new_item' => __('Add New Member', 'ludens'),
				'edit_item' => __('Edit Member', 'ludens'),
				'new_item' => __('New Member', 'ludens'),
				'view_item' => __('View Member', 'ludens'),
				'search_items' => __('Search Team', 'ludens'),
				'not_found' => __('No Member found', 'ludens'),
				'not_found_in_trash' => __('No Member found in Trash', 'ludens'),
				'parent' => __('Parent Member', 'ludens'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-groups',
			'menu_position' => 7,
			'hierarchical' => true,
			'has_archive' => false,
			'supports' => array('title','thumbnail', 'page-attributes'),
			'rewrite' => array('slug' => _x('over-ons', 'URL slug', 'ludens'), 'with_front' => false),
			)
		);
		register_post_type('quotes',
			array(
			'labels' => array(
				'name' => _x('Quotes', 'post type general name', 'ludens'),
				'singular_name' => _x('Quote', 'post type singular name', 'ludens'),
				'add_new' => _x('Add New', 'Quote', 'ludens'),
				'add_new_item' => __('Add New Quote', 'ludens'),
				'edit_item' => __('Edit Quote', 'ludens'),
				'new_item' => __('New Quote', 'ludens'),
				'view_item' => __('View Quote', 'ludens'),
				'search_items' => __('Search Quote', 'ludens'),
				'not_found' => __('No Quote found', 'ludens'),
				'not_found_in_trash' => __('No Quote found in Trash', 'ludens'),
				'parent' => __('Parent Quote', 'ludens'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-quote',
			'menu_position' => 9,
			'hierarchical' => true,
			'has_archive' => false,
			'supports' => array('title','thumbnail', 'page-attributes'),
			'rewrite' => array('slug' => _x('quotes', 'URL slug', 'ludens'), 'with_front' => false)
			)
		);


	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
		// vertalen?
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Category' ),
			'all_items'         => __( 'All Categories' ),
			'parent_item'       => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item'         => __( 'Edit Category' ),
			'update_item'       => __( 'Update Category' ),
			'add_new_item'      => __( 'Add New Category' ),
			'new_item_name'     => __( 'New Category Name' ),
			'menu_name'         => __( 'Categories' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'team-cat' ),
		);

		register_taxonomy( 'team-cat', array( 'team' ), $args );

	}

	function add_to_context( $context ) {
		if(is_front_page()){
			$context['nav_container_class'] = 'nav-con-home';
			$context['header_home'] = 'header-home';
			$context['nav_home'] = 'home-nav';
			$context['logo_home'] = 'logo-home.svg';
			$context['phone_class'] = 'phone-icon';
		} else {
			$context['nav_container_class'] = 'nav-con';
			$context['header_home'] = 'header';
			$context['logo_home'] = 'logo-color.svg';
			$context['phone_class'] = 'phone-icon-grey';
		}
		global $post;
		$context['page_title'] = $post->post_title;
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu_main'] = new TimberMenu(7);
		$context['menu_footer'] = new TimberMenu(8);
		$context['menu_social'] = new TimberMenu(12);
		$context['site'] = $this;
		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
		return $twig;
	}

}

new StarterSite();

function myfoo( $text ) {
	$text .= ' bar!';
	return $text;
}

function single_active( $text ) {
	$text .= ' bar!';
	return $text;
}

function theme_name_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'jasny-bootstrap-style', get_template_directory_uri() . '/css/jasny-bootstrap.min.css', array(), '3.1.3');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/javascripts/bootstrap1.min.js', array(), '3.3.5', true );
	wp_enqueue_script( 'jasny-bootstrap', get_template_directory_uri() . '/javascripts/jasny-bootstrap.min.js', array(), '3.1.3', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/javascripts/isotope.pkgd.min.js', array(), '2.2.0', true );
	wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/javascripts/imagesloaded.pkgd.min.js', array(), '3.1.8', true );
	wp_enqueue_script( 'jquery-color', get_template_directory_uri() . '/javascripts/jquery.color-2.1.2.min.js', array(), '2.1.2', true );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/javascripts/custom-script.js', array(), '1.0.0', true );
	if(is_single()){
		wp_enqueue_script( 'active-check', get_template_directory_uri() . '/javascripts/active-check.js', array(), '1.0.0', true );
	}
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
