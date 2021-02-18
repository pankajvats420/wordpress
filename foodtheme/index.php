<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Billy - Food & Drink eCommerce Bootstrap4 Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style1.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <div class="slider-area">
            <div class="slider-active owl-dot-style owl-carousel">
                <div class="single-slider pt-210 pb-220 bg-img" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/slider/slider-1.jpg);">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated">Drink & Heathy Food</h1>
                            <h3 class="animated">Fresh Heathy and Organic.</h3>
                            <div class="slider-btn mt-90">
                                <a class="animated" href="<?php echo site_url('/product/'); ?>">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider pt-210 pb-220 bg-img" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/slider/slider-2.jpg);">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated">Drink & Heathy Food</h1>
                            <h3 class="animated">Fresh Heathy and Organic.</h3>
                            <div class="slider-btn mt-90">
                                <a class="animated" href="<?php echo site_url('/product/'); ?>">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>


        <?php 
$args = array( 'post_type' => 'book', 'posts_per_page' => 10 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<h2><?php the_title(); ?></h2>
<div class="entry-content">
<?php the_content(); ?> 
</div>
<?php endwhile;
wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
    </body>
</html>
