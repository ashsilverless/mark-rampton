<?php
/*
Template Name: Lodges Landing
*/
?><?php get_header(); ?><?php get_template_part('part','hello-section'); ?><?php get_template_part('part','info-bar'); ?>

<html>
<head>
    <title></title>
</head>

<body>
    <section class="lodge-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2><?php the_field('small_heading'); ?></h2><?php the_field('lead_copy'); ?>
                </div>
            </div><!--row-->


                    <?php

if( have_rows('lodge_details') ):?>



	<?php while ( have_rows('lodge_details') ) : the_row();
?><div class="lodge-card">
            <div class="row">
                
                    <div class="col-md-6">
	                    <img src="<?php the_sub_field('image'); ?>">                
	                    
                        <?php if( have_rows('supporting_images') ):?>
                        
                        <div class="owl-carousel owl-theme supporting-gallery">
	                        
	                        <?php while ( have_rows('supporting_images') ) : the_row();?>
	                        <div class="item">
		                        
	                        <img src="<?php the_sub_field('image'); ?>" />
	                        
	                        </div>
	                        
                       <?php endwhile; 
	                       
                      ?></div>
                        
	                   <?php endif; ?>
	                    
	                    </div>

                    <div class="col-md-6">
                        <h2><?php the_sub_field('title'); ?></h2>

                        <?php the_sub_field('leader_copy'); ?>
	                   
                    </div>
                                    </div>
            </div><!--row-->
                    <?php
endwhile;
else :
endif;
?>
<script type="text/javascript">
	jQuery(document).ready(function( $ ) {
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ["",""],
    autoPlay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
});
</script>

            <div class="row">
                <div class="lodge-leader-outer-wrapper"></div>
            </div><!--row-->
        </div><!--container-->
    </section><!-- ? -->
    <?php get_template_part('part', 'quarry'); ?><?php get_template_part('part', 'gallery'); ?><?php get_footer(); ?>
</body>
</html>