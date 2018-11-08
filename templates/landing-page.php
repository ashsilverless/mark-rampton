<?php
/*
Template Name: Generic Landing Page
*/
?><?php get_header(); ?><?php get_template_part('part','hello-section'); ?><?php get_template_part('part','info-bar'); ?>

<html>
<head>
    <title></title>
</head>

<body>
    <section class="landing-page-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2><?php the_field('small_heading'); ?></h2><?php the_field('body_copy'); ?>
                </div>
            </div><!--row-->

<div class="row">
                    <?php

if( have_rows('sub_item') ):?>



	<?php while ( have_rows('sub_item') ) : the_row();
?>
            
                
                    <div class="col-md-4">
	                    <div class="card">
	                    <div class="image-wrapper">
	                    <img src="<?php the_sub_field('image'); ?>">
	                
                        <h2><?php the_sub_field('heading'); ?></h2>
	                    </div>
	                    
                        <?php the_sub_field('copy'); ?>
	                        
	                    <a href="<?php the_sub_field('button_target'); ?>">See More</a>
	                </div><!--card-->   
                    </div>
                    
                    
            

                    <?php
endwhile;
else :
endif;
?>
</div><!--row-->

            <div class="row">
                <div class="lodge-leader-outer-wrapper"></div>
            </div><!--row-->
        </div><!--container-->
    </section><!-- ? -->
    <?php get_template_part('part', 'quarry'); ?><?php get_template_part('part', 'gallery'); ?><?php get_footer(); ?>
</body>
</html>
