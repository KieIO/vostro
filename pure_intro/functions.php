<?php
/**
 * hbpro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hbpro
 */
define('FVN_THEME_URL',get_template_directory_uri().'/');
define('FVN_THEME_PATH',get_template_directory().'/');



if ( ! function_exists( 'hbpro_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hbpro_setup() {
	/*Translate
	 */
	load_theme_textdomain( 'hbpro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'hbpro' ),
		'second' => esc_html__( 'Second', 'hbpro' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'custom-background', apply_filters( 'hbpro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'hbpro_setup' );

/**
 * Enqueue scripts and styles.
 */
function hbpro_scripts() {
	$root = get_template_directory_uri();
	
	// wp_enqueue_script( 'bootstrap', $root.'/js/bootstrap.min.js',array('jquery'));
	// wp_enqueue_style( 'bootstrap', $root.'/css/bootstrap.min.css');
	
	
	// wp_enqueue_style( 'hbpro-style-utilites', $root.'/css/utilities.css','','1.3.1');
	// wp_enqueue_script( 'hbpro-js', $root. '/js/customizer.js', array(), '1.4.2', true );
	wp_enqueue_style( 'hbpro-style', $root.'/style.css','','1.4.9');
	
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hbpro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hbpro_content_width', 640 );
}
add_action( 'after_setup_theme', 'hbpro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hbpro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hbpro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hbpro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar', 'hbpro' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Sidebar of footer. Add widgets here.', 'hbpro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Banner top', 'hbpro' ),
		'id'            => 'banner-top',
		'description'   => esc_html__( 'Banner for right conner at top' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Banner fixed left', 'hbpro','hbpro' ),
		'id'            => 'banner-fixed-left',
		'description'   => esc_html__( 'Banner fixed in the left side','hbpro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Banner fixed right', 'hbpro','hbpro' ),
		'id'            => 'banner-fixed-right',
		'description'   => esc_html__( 'Banner fixed in the right side','hbpro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	/*
	register_sidebar( array(
		'name'          => esc_html__( 'Banner right', 'hbpro' ),
		'id'            => 'banner-right',
		'description'   => esc_html__( 'Banner for right conner at top' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );*/
}
add_action( 'widgets_init', 'hbpro_widgets_init' );
add_action( 'wp_enqueue_scripts', 'hbpro_scripts' );



require FVN_THEME_PATH. '/inc/custom-header.php';


if(!function_exists('hb_get_post_view')){
	function hb_get_post_view($postID){ // hàm này dùng để lấy số người đã xem qua bài viết
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){ // Nếu như lượt xem không có
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0"; // giá trị trả về bằng 0
		}
		return $count; // Trả về giá trị lượt xem
	}
	function hb_set_post_view($postID) {// hàm này dùng để set và update số lượt người xem bài viết.
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++; // cộng đồn view
			update_post_meta($postID, $count_key, $count); // update count
		}
	}
}




// Breadcrumbs
function hb_breadcrumbs() {

	// Settings
	$separator          = '&gt;';
	$breadcrums_id      = 'breadcrumbs';
	$breadcrums_class   = 'breadcrumbs';
	$home_title         = 'Trang chủ';

	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = 'product_cat';

	// Get the query & post information
	global $post,$wp_query;

	// Do not display on the homepage
	if ( !is_front_page() ) {
			
		// Build the breadcrums
			
		// Home page
		echo '<a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a>';
		echo ' ' . $separator . ' ';
			
		if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

			echo '<strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong>';

		} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if($post_type != 'post') {

				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);

				echo '<a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a>';
				echo $separator ;

			}

			$custom_tax_name = get_queried_object()->name;
			echo '<strong class="bread-current bread-archive">' . $custom_tax_name . '</strong>';

		} else if ( is_single() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if($post_type != 'post') {

				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);

				echo '<a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a>';
				echo  $separator;

			}

			// Get post category info
			$category = get_the_category();

			if(!empty($category)) {

				// Get last category post is in
				$last_category = end(array_values($category));

				// Get parent any categories and create array
				$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
				$cat_parents = explode(',',$get_cat_parents);

				// Loop through parent categories and store in variable $cat_display
				$cat_display = '';
				foreach($cat_parents as $parents) {
					$cat_display .= ''.$parents.'';
					$cat_display .= '' . $separator . '';
				}
					
			}

			// If it's a custom post type within a custom taxonomy
			$taxonomy_exists = taxonomy_exists($custom_taxonomy);
			if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
					
				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id         = $taxonomy_terms[0]->term_id;
				$cat_nicename   = $taxonomy_terms[0]->slug;
				$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
				$cat_name       = $taxonomy_terms[0]->name;
					
			}

			// Check if the post is in a category
			if(!empty($last_category)) {
				echo $cat_display;
				echo '<strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong>';

				// Else if post is in a custom taxonomy
			} else if(!empty($cat_id)) {

				echo '<a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a>';
				echo $separator ;
				echo '<strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong>';

			} else {

				echo '><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong>';

			}

		} else if ( is_category() ) {

			// Category page
			echo '<strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong>';

		} else if ( is_page() ) {

			// Standard page
			if( $post->post_parent ){
					
				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );
					
				// Get parents in the right order
				$anc = array_reverse($anc);
					
				// Parent page loop
				if ( !isset( $parents ) ) $parents = null;
				foreach ( $anc as $ancestor ) {
					$parents .= '<a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a>';
					$parents .= '' . $separator . '';
				}
					
				// Display parent pages
				echo $parents;
					
				// Current page
				echo '<strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong>';
					
			} else {
					
				// Just display current page if not parents
				echo '<strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong>';
					
			}

		} else if ( is_tag() ) {

			// Tag page

			// Get tag information
			$term_id        = get_query_var('tag_id');
			$taxonomy       = 'post_tag';
			$args           = 'include=' . $term_id;
			$terms          = get_terms( $taxonomy, $args );
			$get_term_id    = $terms[0]->term_id;
			$get_term_slug  = $terms[0]->slug;
			$get_term_name  = $terms[0]->name;

			// Display the tag name
			echo '<strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong>';

		} elseif ( is_day() ) {

			// Day archive

			// Year link
			echo '<a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a>';
			echo '' . $separator . '';

			// Month link
			echo '<a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a>';
			echo '' . $separator . '';

			// Day display
			echo '<strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong>';

		} else if ( is_month() ) {

			// Month Archive

			// Year link
			echo '<a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a>';
			echo '' . $separator . '';

			// Month display
			echo '<strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong>';

		} else if ( is_year() ) {

			// Display year archive
			echo '<strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong>';

		} else if ( is_author() ) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata( $author );

			// Display author name
			echo '<strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong>';

		} else if ( get_query_var('paged') ) {

			// Paginated archives
			echo '<strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong>';

		} else if ( is_search() ) {

			// Search results page
			echo '<strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong>';

		} elseif ( is_404() ) {

			// 404 page
			echo '' . 'Error 404' . '';
		}
			
			
	}

}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);



add_action( 'init', function () {

	$labels = array(
		'name'                  => 'Articles',
		'singular_name'         => 'Article',
		'menu_name'             => 'Article',
		'name_admin_bar'        => 'Article',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Article',
		'add_new_item'          => 'New Article',
		'add_new'               => 'New',
		'new_item'              => 'Article new',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Article',
		'description'           => 'Article',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt' ),
		'taxonomies'            => array( 'category','post_tag' ), 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page', 
		'rewrite' =>  array( 
        'slug' => 'article',
        'with_front' => FALSE),
	);
	register_post_type( 'article', $args );

}, 0 );




// add_action( 'init', 'create_custom_hierarchical_taxonomy', 0 );
 
// function create_custom_hierarchical_taxonomy() {
 
//   register_taxonomy('nam',array('du_an'), array(
//     'hierarchical' => true,
//     'labels' => array(
// 	    'name' => _x( 'Năm', 'taxonomy general name' ),
// 	    'singular_name' => _x( 'Năm', 'taxonomy singular name' ),
// 	    'search_items' =>  __( 'Tìm năm' ),
// 	    'all_items' => __( 'Tất cả Năm' ),
// 	    'parent_item' => __( 'Parent Subject' ),
// 	    'parent_item_colon' => __( 'Parent Subject:' ),
// 	    'edit_item' => __( 'Sửa Năm' ), 
// 	    'update_item' => __( 'Update Năm' ),
// 	    'add_new_item' => __( 'Thêm Năm' ),
// 	    'new_item_name' => __( 'Năm mới' ),
// 	    'menu_name' => __( 'Năm' ),
// 	  ),
//     'show_ui' => true,
//     'show_in_rest' => true,
//     'show_admin_column' => true,
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'nam' ),
//   ));
// }

foreach (glob(FVN_THEME_PATH.'shortcodes/*.php') as $filename)
{
	require_once $filename;
}


//load more article
add_action('init', function(){
	if($_REQUEST['fvn_action'] == 'loadmore_article'){
		echo do_shortcode('[article_list search="" page="'.$_REQUEST['page'].'" raw="1"]');
		exit();
	}
});