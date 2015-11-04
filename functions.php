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
			'supports' => array('title','thumbnail', 'page-attributes', 'editor','excerpt'),
			'rewrite' => array('slug' => _x('case', 'URL slug', 'ludens'), 'with_front' => true)
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
			$context['mobile_nav_home'] = 'mobile-nav-home';
			$context['logo_home'] = 'logo-home.svg';
			$context['phone_class'] = 'phone-icon';
			$context['phone_num_class'] = 'tel-num text-white';
		} else {
			$context['nav_container_class'] = 'nav-con';
			$context['header_home'] = 'header';
			$context['logo_home'] = 'logo-color.svg';
			$context['mobile_nav_home'] = 'mobile-nav';
			$context['phone_class'] = 'phone-icon-grey';
			$context['phone_num_class'] = 'tel-num';
		}
		global $post;
		if($post){$context['page_title'] = $post->post_title;}
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu_main'] = new TimberMenu(7);
		$context['menu_footer'] = new TimberMenu(8);
		$context['menu_social'] = new TimberMenu(12);
		$context['site'] = $this;

		//page links
		$context['blog_link'] = get_page_link(108);
		$context['cases_link'] = get_page_link(104);
		$context['programma_link'] = get_page_link(100);
		$context['about_link'] = get_page_link(13);
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

$twig = new Twig_Environment();
$twig->addFunction('call_google_map', new Twig_Function_Function('call_google_map'));

function theme_name_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'jasny-bootstrap-style', get_template_directory_uri() . '/css/jasny-bootstrap.min.css', array(), '3.1.3');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/javascripts/bootstrap1.min.js', array(), '3.3.5', true );
	wp_enqueue_script( 'jasny-bootstrap', get_template_directory_uri() . '/javascripts/jasny-bootstrap.min.js', array(), '3.1.3', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/javascripts/isotope.pkgd.min.js', array(), '2.2.0', true );
	wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/javascripts/imagesloaded.pkgd.min.js', array(), '3.1.8', true );
	wp_enqueue_script( 'jquery-color', get_template_directory_uri() . '/javascripts/jquery.color-2.1.2.min.js', array(), '2.1.2', true );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/javascripts/custom-script.js', array(), '1.0.0', true );
	//wp_enqueue_script( 'google-analytics', get_template_directory_uri() . '/javascripts/google_analytics.js', array(), '1.0.0', true );
	wp_enqueue_style( 'google-fonts-1', 'http://fonts.googleapis.com/css?family=Titillium+Web:400,700,600,300', true );
	wp_enqueue_style( 'google-fonts-2', 'http://fonts.googleapis.com/css?family=Playfair+Display', true );
	if(is_single()){
		wp_enqueue_script( 'active-check', get_template_directory_uri() . '/javascripts/active-check.js', array(), '1.0.0', true );
	}
	if(is_page('Cases')){
		wp_enqueue_script('ajaxLoop' , get_template_directory_uri() . '/javascripts/ajaxLoop.js', array(), '1.0.0', true );
	}
	if(is_page('Contact')){
		wp_enqueue_script('google_map-source' , 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD7NZZbNo0fDffz4l6AB36WDPK5KGZu4QY', array(), '1.0.0', true );
		wp_enqueue_script('google_map' , get_template_directory_uri() . '/javascripts/google_map.js', array(), '1.0.0', true );
	}
}

//Call map
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function call_google_map() {
	echo '<div id="map-canvas"></div>';
}

//Add custom headings in editor
function my_theme_add_editor_styles() {
    add_editor_style( 'tinymce-styles.css' );

		$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Playfair+Display' );
    add_editor_style( $font_url );
		$font_url_2 = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Titillium+Web:400,700,600,300' );
    add_editor_style( $font_url_2 );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );


//FEATURED POST FUNCTION
function prfx_featured_meta() {
    add_meta_box( 'prfx_meta', __( 'Featured Posts', 'prfx-textdomain' ), 'prfx_meta_callback', 'cases', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_featured_meta' );

//Outputs the content of the meta box
function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title"><?php _e( 'Vink deze box aan om deze case op de homepage te weergeven: ', 'prfx-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="featured-checkbox">
            <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['featured-checkbox'] ) ) checked( $prfx_stored_meta['featured-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured Case', 'prfx-textdomain' )?>
        </label>

    </div>
</p>

    <?php
}

//Saves the custom meta input of feature post meta box
function prfx_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves - save checked as yes and unchecked at no
if( isset( $_POST[ 'featured-checkbox' ] ) ) {
    update_post_meta( $post_id, 'featured-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'featured-checkbox', 'no' );
}

}
add_action( 'save_post', 'prfx_meta_save' );

//-------------------SET OFFSET TO BLOG---------------------------

add_action('pre_get_posts', 'myprefix_query_offset', 1 );
function myprefix_query_offset(&$query) {

		if ( !is_page_template( 'page-blog.php' )  ) {
        return ;
    }

    $offset = 1;
    $ppp = 3;

    if ( $query->is_paged() ) {
        $page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );
        $query->set('offset', $page_offset );
    }
    else {
        $query->set('offset',$offset);
    }
}
