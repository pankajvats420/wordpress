
<?php /* Template Name: Logout Template */ ?>
<?php get_header(); 
unset($_SESSION["FOOD_USER_EMAIL"]);
unset($_SESSION["FOOD_USER_ID"]);
unset($_SESSION["FOOD_USER_NAME"]);

$url = home_url('/product/');



 ?>
 	
 <script>window.location.href= '<?php echo $url ?>';</script>

<?php get_footer(); ?>  
