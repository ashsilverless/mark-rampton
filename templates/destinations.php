<?php
    /*
        Template Name: Destinations
    */
?><?php get_header(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>

<html>
<head>
    <title></title>
</head>

<body>
    <section class="destination-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
	                <h2><?php the_field('small_heading'); ?></h2>
	                <?php the_field('body_copy'); ?>
                </div>
                
                <div class="col-md-6">
	                <img src="<?php the_field('map'); ?>"/>
	                <!--<ul>
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
	                </ul>-->
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

 <section class="image-leader experiences">
        <div class="container">
            <div class="row">

<h3>Experiences in <?php the_title();?></h3>

<?php

            if( have_rows('experiences') ):
                while ( have_rows('experiences') ) : the_row();
            ?>

                <div class="col-sm-4 item">
                    <a href="<?php the_sub_field('button_target'); ?>"><img src="<?php the_sub_field('image'); ?>">

                    <div class="content-wrap">
	                    <p><?php the_sub_field('button_text'); ?></p>
	                </div>
	                    </a>
	                    
	                    	            <?php 
                        if (get_sub_field('coming_soon')) {
                            ?>

                    <div class="sl-label">
                        <p><?php the_sub_field('coming_soon'); ?></p>
                    </div><?php 
                        }
                    ?>
	                    
                </div>




            <?php
                endwhile;

            else :
                // no rows found
            endif;

            ?>

            </div><!--row-->
        </div><!--container-->
        
    </section><!-- ? -->   

<?php
if( have_rows('luxury') ):
while ( have_rows('luxury') ) : the_row();
?>
<?php $file = get_sub_field('image'); ?>
    
<section class="lodges-leader">

<div class="container">
	
	<div class="inner" style="background-image: url(<?php echo $file; ?>)">
		<h3><?php the_sub_field('heading'); ?></h3>
		<?php the_sub_field('body'); ?>
		<a href="<?php the_sub_field('button_target'); ?>">Discover More</a>

	</div>
	
</div>

</section>    

<?php
endwhile;
else :
// no rows found
endif;
?>  
    
    <?php get_template_part('part', 'quarry'); ?><?php get_template_part('part', 'gallery'); ?><?php get_footer(); ?>
</body>
</html>
