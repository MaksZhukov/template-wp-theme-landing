<?php
/**
 * default functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package default
 */
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( get_template_directory() . '/inc/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'medical_register_custom_fields' );
function medical_register_custom_fields() {
    require get_template_directory() . '/inc/custom-fields-options/theme-options.php';
}

if ( ! function_exists( 'default_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function default_setup() {

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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'default_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'default_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function default_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'default_content_width', 640 );
}
add_action( 'after_setup_theme', 'default_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function default_scripts() {
	wp_enqueue_style( 'default-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'default-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'default_scripts' );

//Allow html for send mail
function set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','set_content_type' );


//Redirect if is not home or thanks page
add_action( 'template_redirect', function(){
	if( !is_page_template( array('main.php', 'thanks.php') ) ) {
	exit( wp_redirect( home_url( '/' ) ) );
	}
});
function send_mail(){
	if (isset($_POST['form_send'])){
		$to = get_option('admin_email');
		$subject = "Сообщение с сайта " . home_url();
	    $form_type = !empty($_POST['form_type']) ? $_POST['form_type'] : '';
	    $name = !empty($_POST['name']) ? $_POST['name'] : '' ;
	    $phone = !empty($_POST['phone']) ? $_POST['phone'] : '' ;
	    $message = 'Форма: '.$form_type.'<br>';
	    if ($name!=''){
	        $message .= 'Имя: '.$name.'<br>';
	    }
	    if ($phone!=''){
	        $message .= 'Телефон: '.$phone.'<br>';
	    }
		$attachment = '';
		if (isset($_FILES['file_aspirant'])){
			if ( ! function_exists( 'wp_handle_upload' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
			}
			$uploadedfile       = $_FILES['file_aspirant'];
			$upload_overrides   = array( 'test_form' => false );
			$file           = wp_handle_upload( $uploadedfile, $upload_overrides );
			$attachment = $file[ 'file' ];
		}
		wp_mail($to,$subject,$message, '',$attachment);
	}
}