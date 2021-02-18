<?php


function custom_enqueue(){
   
    wp_enqueue_style('bootstrap-1', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );

    wp_enqueue_style('bootstrap-2', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0.0', 'all' );

    wp_enqueue_style('bootstrap-3', get_template_directory_uri() . '/assets/vendor/icofont/icofont.min.css', array(), '1.0.0', 'all' );


    wp_enqueue_style('bootstrap-4', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css', array(), '1.0.0', 'all' );

    wp_enqueue_style('bootstrap-5', get_template_directory_uri() . '/assets/vendor/remixicon/remixicon.css', array(), '1.0.0', 'all' );


    wp_enqueue_style('bootstrap-6', get_template_directory_uri() . '/assets/vendor/venobox/venobox.css', array(), '1.0.0', 'all' );
 
    wp_enqueue_style('bootstrap-7', get_template_directory_uri() . '/assets/vendor/owl.carousel/assets/owl.carousel.min.css', array(), '1.0.0', 'all' );

    wp_enqueue_style('bootstrap-8', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), '1.0.0', 'all' );


   wp_enqueue_style('bootstrap-9', get_template_directory_uri() . '/assets/css/css.css', array(), '1.0.0', 'all' );


  wp_enqueue_style('bootstrap-10', get_template_directory_uri() . '/', array(), '1.0.0', 'all' );





















    wp_enqueue_script('modernizr-1', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-2', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-3', get_template_directory_uri() . '/assets/vendor/jquery.easing/jquery.easing.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-4', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-5', get_template_directory_uri() . '/assets/vendor/waypoints/jquery.waypoints.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-6', get_template_directory_uri() . '/assets/vendor/counterup/counterup.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-7', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-8', get_template_directory_uri() . '/assets/vendor/venobox/venobox.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-9', get_template_directory_uri() . '/assets/vendor/owl.carousel/owl.carousel.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-10', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-11', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-12', get_template_directory_uri() . '/assets/js/jquery-1.12.0.min.js', array(), '1.0.0', 'true' );

    wp_enqueue_script('modernizr-13', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.0', 'true' );

    wp_localize_script("modernizr-13","news", array("ajax_url" =>admin_url('admin-ajax.php')));
   

}

add_action('wp_enqueue_scripts', 'custom_enqueue');


 function register_nav_bar_menu1(){

        register_nav_menus(
            array(
                   "primary-menu" => "Header Menu",
                   "footer-menu" => "Footer Menu"
            ));
        
 }

 add_action("init","register_nav_bar_menu1");







function theme_custom_logo(){

    $default = array(
            "height" => 50,
            "width" => 177,
            "flex-height" =>true,
            "flex-width" =>true,
    );
    add_theme_support("custom-logo",$default);

    add_theme_support('post-thumbnails');

}

add_action("after_setup_theme","theme_custom_logo");

if(isset($_POST["submit"])){

         $name = $_POST["name"];

         global $wpdb;


       $sql = $wpdb->prepare(

         $wpdb->insert("wp_form",array(



                 "name" =>$name
         ))

         );

       if($sql== true){

        echo "insedf";
       }
}


add_action("wp_ajax_news_front_request" , "news_front_request_callback");
add_action("wp_ajax_nopriv_news_front_request" , "news_front_request_callback");

function news_front_request_callback(){

    // require_once(get_template_directory_uri() .'/ajax.php');
    include_once( get_stylesheet_directory() .'/ajax.php');

    wp_die();
}