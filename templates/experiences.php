<?php
    /*
        Template Name: Experiences
    */
?><?php get_header(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>
<html>
<head>
    <title></title>
</head>

<body>
    <section class="experience-info">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
	                <h2><?php the_field('small_heading'); ?></h2>
	                <?php the_field('body_copy'); ?>
                
                </div>
                
                <div class="col-md-5 text-center">
	                <a href="/availability/" class="main-cta <?php the_field('show_check_availability'); ?>">Check Availability</a>
	                <img src="<?php the_field('map'); ?>"/>
	                <p class="context"><?php the_field('context'); ?></p>
	                <a href="<?php the_field('explore_link'); ?>"><p class="explore">Explore all <?php the_field('explore_location'); ?> Experiencess</p></a>
	                
                </div>
            </div><!--row-->
        </div><!--container-->
        
        <div class="container">
	        
	        <div class="row">
<div class="ul-panel">
	                
	                <h2>Useful facts</h2>
	                
					<ul>
			            <?php
			
			            if( have_rows('features_list') ):
			                while ( have_rows('features_list') ) : the_row();
			            ?>
			                
				                <li><?php the_sub_field('feature_text'); ?></li>
			                
			            <?php
			            endwhile;
			            else :
			                // no rows found
			            endif;
			            ?>	                
	                </ul>	                
	                
	                </div>				
			    <?php get_template_part('part', 'supporting-gallery'); ?>		        
	        </div>
	        
        </div>
        
        
        
    </section><!-- ? -->

  
    <?php get_template_part('part', 'quarry'); ?><?php get_template_part('part', 'gallery'); ?><?php get_footer(); ?>
</body>
</html>