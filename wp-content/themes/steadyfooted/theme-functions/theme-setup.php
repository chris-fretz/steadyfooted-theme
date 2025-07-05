<?php 
/*************
* Theme Setup
*************/
if ( ! function_exists( 'steadyfooted_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
    function steadyfooted_setup() {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on steadyfooted, use a find and replace
        * to change 'steadyfooted' to the name of your theme in all the template files.
        */
        load_theme_textdomain( 'steadyfooted', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support( 'title-tag' );

        /**
        * Enable support for Post Thumbnails on posts and pages.
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support( 'post-thumbnails' );

        /**
         * Add excerpt support to pages
         */
        add_post_type_support( 'page', 'excerpt' );

        /*
		 * Switch default core markup for search form, comment form, comments, galleries, and captions
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
    }
endif;
add_action( 'after_setup_theme', 'steadyfooted_setup' );


register_nav_menus(array(
  'footer_menu' => 'Footer Menu',
  'main_menu'   => 'Main Menu',
  'top_menu'    => 'Top Menu'
));
?>