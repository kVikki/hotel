<?php

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );	


add_image_size( 'event_thumb', 800, 571, true );
add_image_size( 'single_thumb', 1900, 1267, true );
add_image_size( 'slider_thumb', 1121, 700, true );

/* removing <p> tags of text editor */
//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop() {
	remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

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
		
		wp_enqueue_script( 'hotel-owl.carousel.min', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array(), null, false );
		wp_enqueue_script( 'hotel-aos', get_template_directory_uri().'/assets/js/aos.js', array(), null, true );
		wp_enqueue_script( 'hotel-popper.min', get_template_directory_uri().'/assets/js/popper.min.js', array(), null, true );

		wp_enqueue_script( 'hotel-main', get_template_directory_uri().'/assets/js/main.js', array(), null, true );
		wp_enqueue_script( 'hotel-reservation', get_template_directory_uri().'/assets/js/reservation.js', array(), null, true );
		wp_enqueue_script( 'hotel-newsletters', get_template_directory_uri().'/assets/js/newsletters.js', array(), null, true );

		
	
	
}


// Register navigation menus uses wp_nav_menu 
add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'expanded' 		=> 'Выпадающее меню',
		'footer' 	=> 'Подвал сайта'
		
		] );
} );

// Добавляем классы пунктам
add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if ( $args->theme_location === 'restaurant' ):
		$classes = [ 'nav-item' ];
	else:
		$classes = [];
	endif;

	return $classes;
}


// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'restaurant'):
		$class = 'nav-link letter-spacing-2';
	
		/* 	if ( $item->current ):
				$class .= 'active show';
				
		endif; */
		$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
	endif;

return $atts;
}


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('General');
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Translate');
}


/* обрабатываем вводимые в формы данные  */
if( !function_exists('test_input') ){ 
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
} 

// форма отправки сообщений
add_action('wp_ajax_newsletters', 'newsletters');
add_action('wp_ajax_nopriv_newsletters', 'newsletters');
function newsletters(){
	$wrong_email ="wrong email format";
	
	$email_pattern = '/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/';
	
	$validation_error = array();
	
	$host = 'localhost';  // Хост, у нас все локально
	$user = 'root';    // Имя созданного вами пользователя
	$pass = 'root'; // Установленный вами пароль пользователю
	$db_name = 'hotel';   // Имя базы данных
	$sql = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

	// Ругаемся, если соединение установить не удалось
	if (!$sql) {
		echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
		exit;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST"):
			if(isset($_POST['email'])):
				$sender_email = test_input($_POST['email']);			 
				
				if (!preg_match($email_pattern, $sender_email)):
					$validation_error['email'] = $wrong_email;
				endif;
			else: 
				$validation_error['email']= $unexisting_field;
			endif;

			$url = get_home_url();

		
			$subject = "newsletters subscription";
			$message_send = 'Email: ' .$sender_email. "\n".
											'Message:'. "You have subscribed for our (". $url .")  newsletters\n";
			
			$alert_message = 'you subscribed';
		
			$to = get_option('admin_email');
		
			if (empty($validation_error)):
				$mail = wp_mail( $to,	$subject , $message_send );
				if ($mail):
					$email=mysqli_query($sql,  "INSERT INTO wp_newsletters (email) VALUES (	'$sender_email')");					
					
					wp_die(json_encode(array('success' => true, 'alert'=> $alert_message , 'data' => $message_send)));
				else: 
					/* 	$alert_message = ot_get_option('sending_fail'); */
					$alert_message = 'sending fail';
					wp_die(json_encode(array('success' => false, 'alert'=> $alert_message)));
				endif;
			
			else: 
				wp_die(json_encode(array('success' => false, 'error' => $validation_error)));
			endif;	

	endif;
}


// форма отправки сообщений
add_action('wp_ajax_reservation', 'reservation');
add_action('wp_ajax_nopriv_send_mail', 'reservation');
function reservation(){
	
	$wrong_email = "wrong email format";
	$wrong_input = "wrong input ";
	$unexisting_field = ot_get_option('unexisting_field');

  $email_pattern = '/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/';
	
	$validation_error = array();
	if ($_SERVER["REQUEST_METHOD"] == "POST"):
			if(isset($_POST['checkin_date'])):
				$sender_email = test_input($_POST['checkin_date']);				
			else: 
				$validation_error['checkin_date']= $unexisting_field;
			endif;

			if(isset($_POST['checkout_date'])):
				$sender_email = test_input($_POST['checkout_date']);				
			else: 
				$validation_error['checkout_date']= $unexisting_field;
			endif;

		
			if(isset($_POST['adults']) ):
				$url = test_input($_POST['adults']);				
			else: 
				$validation_error['adults']=$unexisting_field;
			endif;

			if(isset($_POST['children'])):
				$message = test_input($_POST['children']);				
			else :
				$validation_error['children'] = $unexisting_field;
			endif;


			if (isset($_POST['available']) ): 
				$available =  $_POST['available'];
			endif; 



			$subject = "Email From Foody`s contact form";
			$message_send = 'Message:'. $message . "\n" .
											'Name: '. $sender_name."\n" .
											'Email: ' .$sender_email. "\n".
											'url:' . $url. "\n";

			if ($rate):
				$subject = "Feedback with rating From Foody`s contact form";
				$message_send = 'Subject:' .$subject. "\n" . 
													$message_send . 'Rating:' .
													$rate . "\n" ;
				$alert_message = ot_get_option('sending_with_rating');
			else:
				$message_send = 'Subject:' .$subject. "\n" .$message_send ;
				$alert_message = ot_get_option('sending_seccess');
			endif;

			$to = get_option('admin_email');
		
			
			if (empty($validation_error)):
				$mail = wp_mail( $to,	$subject , $message_send );
				if ($mail):
					wp_die(json_encode(array('success' => true, 'alert'=> $alert_message , 'data' => $message_send)));
				else: 
					$alert_message = ot_get_option('sending_fail');
					wp_die(json_encode(array('success' => false, 'alert'=> $alert_message)));
				endif;
			
			else: 
				wp_die(json_encode(array('success' => false, 'error' => $validation_error)));
			endif;	

	endif;
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
		'supports'           => array( 'title', 'editor' ,'thumbnail')
	) );
}

