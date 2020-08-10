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
		wp_enqueue_script( 'hotel-checking', get_template_directory_uri().'/assets/js/checking.js', array(), null, true );
		wp_enqueue_script( 'hotel-contactform', get_template_directory_uri().'/assets/js/contactform.js', array(), null, true );
	
}


// Register navigation menus 
add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'expanded'	=> 'Выпадающее меню',
		'footer' 		=> 'Подвал сайта'		
		] );
} );

// Добавляем классы активным пунктам меню
add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if ( $args->theme_location === 'expanded' ):
		if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ):
			$classes[] = 'active ';
		else:
			$classes[] = '';
		endif;
	endif;

	return $classes;
}


/* ACF option pages  */
if( function_exists('acf_add_options_page') ):
	acf_add_options_page();

	$languages = array( 'uk', 'en' );

  foreach ( $languages as $lang ):
    acf_add_options_sub_page( array(
      'page_title' => 'General (' . strtoupper( $lang ) . ')',
      'menu_title' => __('General (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "general-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
		) );
		
		acf_add_options_sub_page( array(
      'page_title' => 'Footer (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Footer (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "footer-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
		) );
		
		acf_add_options_sub_page( array(
      'page_title' => 'Header (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Header (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "header-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
		) );
		
		acf_add_options_sub_page( array(
      'page_title' => 'Forms (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Forms (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "forms-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
    ) );
	endforeach;

endif;


/* обрабатываем вводимые в формы данные  */
if( !function_exists('test_input') ): 
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
endif;


// форма подписки на рассылку
add_action('wp_ajax_newsletters', 'newsletters');
add_action('wp_ajax_nopriv_newsletters', 'newsletters');
function newsletters(){
	
	$validation_error = array();
		

	if ($_SERVER["REQUEST_METHOD"] == "POST"):
		global $wpdb; 
		$wrong_email = get_field('wrong_email', pll_current_language('slug'));
		$existing_email = get_field('existing_email', pll_current_language('slug'));
		$unexisting_field = get_field('unexisting', pll_current_language('slug'));
		$email_pattern = '/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/';
		
			if(isset($_POST['email_newsletters'])):
				$sender_email = test_input($_POST['email_newsletters']); 
				if (preg_match($email_pattern, $sender_email)):	
					$db_emails=$wpdb->query(
						$wpdb->prepare( 
							"SELECT count(*) FROM wp_newsletters WHERE email= %s", $sender_email
					)); 
							
					if ($db_emails):			
						$validation_error['email_newsletters']= $existing_email;				
					endif;
					else:			
					$validation_error['email_newsletters'] = $wrong_email;
				endif;
			else: 
				$validation_error['email_newsletters']= $unexisting_field;
			endif;

			
		
			$subject = get_field("subscribe_letter_subject", pll_current_language('slug'));
			$message = get_field("subscribe_message", pll_current_language('slug'));
			$message_send = 'Email: ' .$sender_email. "\n".
											'Message:'. $message;
			
			$alert_message = get_field("subscribe_alert", pll_current_language('slug'));;
		
			$to = $sender_email;
		
			if (empty($validation_error)):
				$mail = wp_mail( $to,	$subject , $message_send );
				if ($mail):
					
					$wpdb->query(
						$wpdb->prepare(
							"INSERT INTO wp_newsletters (email) VALUES ( %s)", $sender_email	)
					); 

					wp_die(json_encode(array('success' => true, 'alert'=> $alert_message , 'data' => $message_send)));
				else: 					
					$alert_message = get_field('sending_fail',pll_current_language('slug'));
					wp_die(json_encode(array('success' => false, 'alert'=> $alert_message)));
				endif;
			
			else: 
				wp_die(json_encode(array('success' => false, 'error' => $validation_error)));
			endif;	

	endif;
}

/*  */


// форма проверки доступности дат бронирования
add_action('wp_ajax_checking', 'checking');
add_action('wp_ajax_nopriv_checking', 'checking');
function checking(){	
	
	$today = date('Ymd');
	  	
	$validation_error = array();
	if ($_SERVER["REQUEST_METHOD"] == "POST"):
		$wrong_date = get_field('wrong_date',pll_current_language('slug'));
		$before_today = get_field('before_today_date',pll_current_language('slug'));
		$unexisting_field =  get_field('unexisting',pll_current_language('slug'));
		$available_dates_alert = get_field('available_alert',pll_current_language('slug'));
		$unavailable_dates_alert = get_field('unavailable_alert',pll_current_language('slug'));
		$url= get_field('reservation_link', pll_current_language('slug'));
	
			if(isset($_POST['checkin_date'])):
				$checkin_date = test_input($_POST['checkin_date']);	
				$check_in_date = DateTime::createFromFormat('j M, Y', $checkin_date);
				$check_in_date=$check_in_date->format('Ymd');
				if ($check_in_date < $today ): 
					$validation_error['checkin_date']= $before_today;
				endif;
			else: 
				$validation_error['checkin_date']= $unexisting_field;
			endif;

			if(isset($_POST['checkout_date'])):
				$checkout_date = test_input($_POST['checkout_date']);	
				$check_out_date = DateTime::createFromFormat('j M, Y', $checkout_date);
				$check_out_date=$check_out_date->format('Ymd');		
				if ($check_out_date < $today): 
						$validation_error['checkout_date']=$before_today;			
				endif;								
			else: 
				$validation_error['checkout_date']= $unexisting_field;
			endif;

			if ($check_in_date > $check_out_date ): 
				$validation_error['checkout_date']= $wrong_date;			
			endif;

			if(isset($_POST['adults']) ):
				$adults = test_input($_POST['adults']);				
			else: 
				$validation_error['adults']= $unexisting_field;
			endif;

			if(isset($_POST['children'])):
				$children = test_input($_POST['children']);				
			else :
				$validation_error['children'] = $unexisting_field;
			endif;

			$data= array('checkin' => $checkin_date,
									'checkout'=> $checkout_date,
									'adults'=> $adults,
									'children'=>$children,
									 );

			if (empty($validation_error)):		
				if (isset($_POST['available']) ): 
					$available =  $_POST['available'];
					if ($available==0):
						wp_die(json_encode(array('success' => false,
																			'alert'=> $unavailable_dates_alert)));
					else:
						
						wp_die(json_encode(array('success' => true,
																			'alert'=> $available_dates_alert,																		
																			'data' => $data,
																			'url'=> $url
																		)));
					endif;	
				endif; 
			else:
				wp_die(json_encode(array('success' => false, 'error' => $validation_error)));
			endif; 	

	endif;
}


// форма резервации
add_action('wp_ajax_reservation', 'reservation');
add_action('wp_ajax_nopriv_reservation', 'reservation');
function reservation(){
	$validation_error = array();
		
	if ($_SERVER["REQUEST_METHOD"] === "POST"):
		$wrong_date = get_field('wrong_date',pll_current_language('slug'));
    $before_today = get_field('before_today_date',pll_current_language('slug'));
    $unexisting_field =  get_field('unexisting',pll_current_language('slug'));
    $available_dates_alert = get_field('available_alert',pll_current_language('slug'));
    $unavailable_dates_alert = get_field('unavailable_alert',pll_current_language('slug'));
    $wrong_email = get_field('wrong_email',pll_current_language('slug'));
    $wrong_input = get_field('wrong_input',pll_current_language('slug'));
    $wrong_phone = get_field('wrong_phone',pll_current_language('slug'));
    $url= get_field('reservation_link', pll_current_language('slug'));
	
    $today = date('Ymd');
  
    $phone_pattern = '/^([+]?|[0]{0,2})?(-|\s|\.)?\d*(-|\s|\.)?[(]?[0-9]{1,4}[)]?(-|\s|\.)?[(]?[0-9]{2,4}[)]?[-\s\.0-9]{7,}$/';
    $text_pattern = '/[A-Za-zА-Яа-я]{2,}/';
    $email_pattern = '/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/'; 	
  
	
		if(isset($_POST['checkin_date'])):
			$checkin_date = test_input($_POST['checkin_date']);	
			$check_in_date = DateTime::createFromFormat('j M, Y', $checkin_date);
			$check_in_date=$check_in_date->format('Ymd');
			if ($check_in_date < $today ): 
				$validation_error['checkin_date']= $before_today;
			endif;
		else: 
			$validation_error['checkin_date']= $unexisting_field;
		endif;

		if(isset($_POST['checkout_date'])):
			$checkout_date = test_input($_POST['checkout_date']);	
			$check_out_date = DateTime::createFromFormat('j M, Y', $checkout_date);
			$check_out_date=$check_out_date->format('Ymd');		
			if ($check_out_date < $today): 
					$validation_error['checkout_date']=$before_today;			
			endif;								
		else: 
			$validation_error['checkout_date']= $unexisting_field;
		endif;

		if ($check_in_date > $check_out_date ): 
			$validation_error['checkout_date']= $wrong_date;			
		endif;

		if(isset($_POST['adults']) ):
			$adults = test_input($_POST['adults']);				
		else: 
			$validation_error['adults']= $unexisting_field;
		endif;

		if(isset($_POST['children'])):
			$children = test_input($_POST['children']);				
		else :
			$validation_error['children'] = $unexisting_field;
		endif;
		
		
		if(isset($_POST['email'])):
			$email = test_input($_POST['email']);
			if (!preg_match( $email_pattern,$email)):
				$validation_error['email'] = $wrong_email;
			endif;
		else :
			$validation_error['email'] = $unexisting_field;
		endif;

		if(isset($_POST['name'])):
			$name = test_input($_POST['name']);
			if (!preg_match( $text_pattern,$name)):
				$validation_error['name'] = $wrong_input;
			endif;
		else :
			$validation_error['name'] = $unexisting_field;
		endif;

		if(isset($_POST['phone'])):
				$phone = test_input($_POST['phone']);
			if (!preg_match( $phone_pattern,$phone)):
				$validation_error['phone'] = $wrong_phone;
			endif;
		else: 
			$validation_error['phone'] = $unexisting_field;
		endif;

		if(isset($_POST['message'])):
				$message = test_input($_POST['message']);
			if ($message!='' && !preg_match( $text_pattern,$message)):
				$validation_error['message'] = $wrong_input;
			endif;
		else: 
			$validation_error['message'] = $unexisting_field;
		endif;		

		$subject = get_field('reservation_subject',pll_current_language('slug'));

		$sender_info ='Name: '. $name."\n" .
									'Email: ' .$email. "\n" . 
									'Phone: ' .$phone. "\n";

		$message_send = 'Subject:' .$subject. "\n" .
										'Checkin:'. $checkin_date."\n" .
										'Checkout:'. $checkout_date."\n" .
										'Adults:'. $adults."\n" .
										'Children:'.$children."\n" .
										$sender_info;

		
			$to = get_option('admin_email');

			if (empty($validation_error)):
				
					$booking = wp_mail( $to,	$subject , $message_send );
					if ($booking):
						$alert_message = get_field('sending_success',pll_current_language('slug'));
						wp_die(json_encode(array('success' => true, 
																		'alert'=> $alert_message,
																		'data' => $message_send)));
					else: 
						$alert_message = get_field('sending_fail',pll_current_language('slug'));
						wp_die(json_encode(array('success' => false, 'alert'=> $alert_message)));
					endif;
 				
			else: 
				wp_die(json_encode(array('success' => false, 'error' => $validation_error)));
			
			endif;

	endif;
}



// форма отправки сообщений
add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');
function send_mail(){	
	
	$validation_error = array();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"):
		$wrong_phone = get_field('wrong_phone',pll_current_language('slug'));
		$wrong_email = get_field('wrong_email',pll_current_language('slug'));
		$wrong_input = get_field('wrong_input',pll_current_language('slug'));
		$unexisting_field = get_field('unexisting',pll_current_language('slug'));

		$text_pattern = '/[A-Za-zА-Яа-я]{2,}/';
		$phone_pattern = '/^([+]?|[0]{0,2})?(-|\s|\.)?\d*(-|\s|\.)?[(]?[0-9]{1,4}[)]?(-|\s|\.)?[(]?[0-9]{2,4}[)]?[-\s\.0-9]{7,}$/';
		$email_pattern = '/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/';

			if(isset($_POST['email'])):
				$sender_email = test_input($_POST['email']);
				if (!preg_match($email_pattern, $sender_email)):
					$validation_error['email'] = $wrong_email;
				endif;
			else: 
				$validation_error['email']= $unexisting_field;
			endif;

			if(isset($_POST['name'])):
				$sender_name = test_input($_POST['name']);
				if (!preg_match($text_pattern, $sender_name)):
					$validation_error['name'] = $wrong_input ;
				endif;
			else:
				$validation_error['name'] = $unexisting_field;
			endif;	
			
			if(isset($_POST['phone'])):
				$sender_phone = test_input($_POST['phone']);
				if (!preg_match($phone_pattern, $sender_phone)):
					$validation_error['phone'] = $wrong_phone ;
				endif;
			else:
				$validation_error['phone'] = $unexisting_field;
			endif;	
		

			if(isset($_POST['message'])):
				$message = test_input($_POST['message']);
				if(!preg_match($text_pattern, $message)):
					$validation_error['message'] = $wrong_input;
				endif;
			else :
				$validation_error['message'] = $unexisting_field;
			endif;
			

			$subject = get_field('contact_subject',pll_current_language('slug'));
			$message_send = 'Message:'. $message . "\n" .
											'Subject: '. $subject."\n" .
											'Name: '. $sender_name."\n" .
											'Email: ' .$sender_email. "\n".
											'Phone:' . $sender_phone. "\n";

			$alert_message = get_field('sending_success',pll_current_language('slug'));
			

			$to = get_option('admin_email');
		
			
			if (empty($validation_error)):
				$mail = wp_mail( $to,	$subject , $message_send );
				if ($mail):
					wp_die(json_encode(array('success' => true, 'alert'=> $alert_message , 'data' => $message_send)));
				else: 
					$alert_message = get_field('sending_fail',pll_current_language('slug'));
					wp_die(json_encode(array('success' => false, 'alert'=> $alert_message)));
				endif;
			
			else: 
				wp_die(json_encode(array('success' => false, 'error' => $validation_error)));
			endif;	

	endif;
}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/
	return '<li>%3$s</li>';
}

/* ********************** */
// свои типы записей
add_action('init', 'event_posts_init');
function event_posts_init(){
	register_post_type('event', array(
			'labels'             => array(
			'name'               => 'Події', // Основное название типа записи
			'singular_name'      => 'Подія', // отдельное название записи типа 
			'add_new'            => 'Додати',
			'add_new_item'       => 'Додати нову подію',
			'edit_item'          => 'Редагувати',
			'new_item'           => 'Нова подія',
			'view_item'          => 'Подивитися',
			'search_items'       => 'Знайти ',
			'not_found'          => 'Події не знайдено',
			'not_found_in_trash' => 'В корзині подій не знайдено',
      'menu_name'          => 'Події'

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
		'menu_icon' 				 => 'dashicons-calendar-alt',
		'menu_position'      => 6,
		'taxonomies'         => array( 'category',  'post_tag' ),
		'supports'           => array( 'title', 'editor' ,'thumbnail', 'excerpt', 'comments')
	) );
}


add_action('init', 'room_posts_init');
function room_posts_init(){
	register_post_type('room', array(
			'labels'             => array(
			'name'               => 'Номери', // Основное название типа записи
			'singular_name'      => 'Номер', // отдельное название записи типа 
			'add_new'            => 'Додати новий',
			'add_new_item'       => 'Дадати новий номер',
			'edit_item'          => 'Редагурати',
			'new_item'           => 'Новий номер',
			'view_item'          => 'Переглянути ',
			'search_items'       => 'Знайти ',
			'not_found'          => 'Номерів не знайдено',
			'not_found_in_trash' => 'В корзині номерів не знайдено',
      'menu_name'          => 'Кімнати/Номери'

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
		'menu_icon' 				 => 'dashicons-admin-multisite',
		'menu_position'      => 7,
		'taxonomies'         => array( 'category',  'post_tag' ),
		'supports'           => array( 'title', 'editor' ,'thumbnail', 'excerpt', 'comments')
	) );
}

add_action('init', 'testimonial_posts_init');
function testimonial_posts_init(){
	register_post_type('testimonial', array(
			'labels'             => array(
			'name'               => 'Відгуки', // Основное название типа записи
			'singular_name'      => 'Відгук', // отдельное название записи типа 
			'add_new'            => 'Додати новий',
			'add_new_item'       => 'Додати новий відгук',
			'edit_item'          => 'Редагувати',
			'new_item'           => 'Новий відгук',
			'view_item'          => 'Переглянути ',
			'search_items'       => 'Знайти ',
			'not_found'          => 'Відгуків не найдено',
			'not_found_in_trash' => 'В корзине відгуків не найдено',
      'menu_name'          => 'Відгуки'

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
		'menu_icon' 				 => 'dashicons-testimonial',
		'menu_position'      => 8,
		'taxonomies'         => array( 'category',  'post_tag' ),
		'supports'           => array( 'title', 'editor' ,'excerpt','thumbnail' )
	) );
}

