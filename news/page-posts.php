<?php   /*   Template Name: Post Page  */ ?>


<?php get_header(); ?>


<?php 
$args = array("post_type" => "banner");
$the_query = new WP_Query( $args ); ?>
 
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- pagination here -->
 
    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <h2><a href="<?php echo get_the_permalink($post->ID); ?>"  ><?php the_title(); ?></a></h2>
        <img src="<?php echo get_the_post_thumbnail_url($post->ID , 'full'); ?>"  style="width: 20%;">

        <?php echo get_post_meta($post->ID,"fetch_name",true); ?>
         
         <?php $file =  get_post_meta($post->ID,"fetch_image",true);
    
          
            $array = explode('.', $file);

           

            if($array [1] == "mp3"){
                ?>

                 <a href="<?php echo get_post_meta($post->ID,"fetch_image",true); ?>">Download</a>
                 <audio controls>
                     <source src="<?php echo get_post_meta($post->ID,"fetch_image",true); ?>" type="">
                 </audio>
                <?php

            }else{
?>
                <img src="<?php echo get_post_meta($post->ID,"fetch_image",true); ?>" style="width: 20%;">

                <img src="<?php echo get_post_meta($post->ID,"fetch_image1",true); ?>" style="width: 20%;">
             
<?php
            }

          

         ?>

         

        
        
    <?php endwhile; ?>
    <!-- end of the loop -->
 
    <!-- pagination here -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>





  <?php get_footer(); ?>