<?php
/*
Template Name: Lodge Page
*/
?><?php get_header(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>
<html>
<head>
<title></title>
</head>

<body>
	<section class="lodge-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
	                <h2><?php the_field('small_heading'); ?></h2>
	                <?php the_field('body_copy'); ?>
                </div>
                
                <div class="col-md-5">
	                <img src="<?php the_field('map'); ?>"/>
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
            </div><!--row-->
        </div><!--container-->
    </section><!-- ? -->


</body>
</html>
