<?php

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );	


add_image_size( 'event_thumb', 800, 571, true );
add_image_size( 'single_thumb', 1900, 1267, true );
add_image_size( 'slider_thumb', 1121, 700, true );

if (!function_exists('render_partial')) {
	function render_partial($template, $render_data)
	{
			extract($render_data);
			require locate_template($template);
	}
}

/*
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'hotel_scripts_and_styles' );
function hotel_scripts_and_styles() {
	//styles
		wp_enqueue_style( 'hotel-bootstrap',  get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style( 'hotel-bootstrap-datepicker',  get_template_directory_uri().'/assets/css/bootstrap-datepicker.css');
		wp_enqueue_style( 'hotel-animate',  get_template_directory_uri().'/assets/css/animate.css"');
		wp_enqueue_style( 'hotel-owl.carousel',  get_template_directory_uri().'/assets/css/owl.carousel.min.css');
		wp_enqueue_style( 'hotel-aos',  get_template_directory_uri().'/assets/css/aos.css');
		wp_enqueue_style( 'hotel-jquery.timepicker',  get_template_directory_uri().'/assets/css/jquery.timepicker.css');
		wp_enqueue_style( 'hotel-fancybox.min',  get_template_directory_uri().'/assets/css/fancybox.min.css');
		//fonts
		wp_enqueue_style( 'hotel-ionicons',  get_template_directory_uri().'/assets/fonts/ionicons/css/ionicons.css');
		wp_enqueue_style( 'hotel-font-awesome.min',  get_template_directory_uri().'/assets/fonts/fontawesome/css/font-awesome.min.css');
		wp_enqueue_style( 'hotel-Roboto+Sans',  "https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&display=swap");
		//main stylesheet
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		/* <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700"> */

	//scripts
		/* jquery */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'hotel-jquery.stellar.min', get_template_directory_uri().'/assets/js/jquery.stellar.min.js', array(), null, true );
		wp_enqueue_script( 'hotel-jquery.fancybox.min', get_template_directory_uri().'/assets/js/jquery.fancybox.min.js', array(), null, true );
		wp_enqueue_script( 'hotel-jquery.timepicker.min', get_template_directory_uri().'/assets/js/jquery.timepicker.min.js', array(), null, true );

		
		wp_enqueue_script( 'hotel-bootstrap.min', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), null, true );
		wp_enqueue_script( 'hotel-bootstrap-datepicker', get_template_directory_uri().'/assets/js/bootstrap-datepicker.js', array(), null, true );
		
		wp_enqueue_script( 'hotel-owl.carousel.min', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array(), null, true );
		wp_enqueue_script( 'hotel-aos', get_template_directory_uri().'/assets/js/aos.js', array(), null, true );
		wp_enqueue_script( 'hotel-popper.min', get_template_directory_uri().'/assets/js/popper.min.js', array(), null, true );

		wp_enqueue_script( 'hotel-main', get_template_directory_uri().'/assets/js/main.js', array(), null, true );

		
	
	
}


// Register navigation menus uses wp_nav_menu 
add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'expanded' => 'Выпадающее меню',
		'social' => 'Меню соцсетей',
		
		] );
} );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page('General');
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Translate');
}

// свои типы записей
add_action('init', 'event_posts_init');
function event_posts_init(){
	register_post_type('event', array(
			'labels'             => array(
			'name'               => 'Мероприятия', // Основное название типа записи
			'singular_name'      => 'Мероприятие', // отдельное название записи типа 
			'add_new'            => 'Добавить новое',
			'add_new_item'       => 'Добавить новое мероприятие',
			'edit_item'          => 'Редактировать',
			'new_item'           => 'Новое мероприятие',
			'view_item'          => 'Посмотреть ',
			'search_items'       => 'Найти ',
			'not_found'          => 'Мероприятий не найдено',
			'not_found_in_trash' => 'В корзине мероприятий не найдено',
      'menu_name'          => 'Мероприятия'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon' 				 => 'dashicons-carrot',
		'menu_position'      => 6,
		'taxonomies'         => array( 'category',  'post_tag' ),
		'supports'           => array( 'title', 'editor' ,'thumbnail',  'comments')
	) );
}


add_action('init', 'room_posts_init');
function room_posts_init(){
	register_post_type('room', array(
			'labels'             => array(
			'name'               => 'Номера', // Основное название типа записи
			'singular_name'      => 'Номер', // отдельное название записи типа 
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый номер',
			'edit_item'          => 'Редактировать',
			'new_item'           => 'Новый номер',
			'view_item'          => 'Посмотреть ',
			'search_items'       => 'Найти ',
			'not_found'          => 'Номеров не найдено',
			'not_found_in_trash' => 'В корзине номеров не найдено',
      'menu_name'          => 'Комнаты/Номера'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon' 				 => '',
		'menu_position'      => 7,
		'taxonomies'         => array( 'category',  'post_tag' ),
		'supports'           => array( 'title', 'editor' ,'thumbnail',  'comments')
	) );
}

add_action('init', 'testimonial_posts_init');
function testimonial_posts_init(){
	register_post_type('testimonial', array(
			'labels'             => array(
			'name'               => 'Отзывы', // Основное название типа записи
			'singular_name'      => 'Отзыв', // отдельное название записи типа 
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый отзыв',
			'edit_item'          => 'Редактировать',
			'new_item'           => 'Новый отзыв',
			'view_item'          => 'Посмотреть ',
			'search_items'       => 'Найти ',
			'not_found'          => 'Отзывов не найдено',
			'not_found_in_trash' => 'В корзине отзывов не найдено',
      'menu_name'          => 'Отзывы'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon' 				 => '',
		'menu_position'      => 8,
		'taxonomies'         => array( 'category',  'post_tag' ),
		'supports'           => array( 'title', 'editor' ,'thumbnail',  'comments')
	) );
}