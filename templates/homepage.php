<?php
    /*
        Template Name: Home
    */
?><?php get_header(); ?><?php echo do_shortcode('[rev_slider alias="homepage"]'); ?>

<html>
<head>
    <title></title>
</head>

<body>
    <section class="quote">
        <div class="container">
            <div class="row">
                <p class="body">"<?php the_field('quote'); ?>"<span>Mark Rampton</span></p>
                <p class="supporting"><?php the_field('supporting_text'); ?></p>
                <img src="<?php the_field('image'); ?>" />
            </div><!--row-->
        </div><!--container-->
    </section><!--quote-->

    <section class="image-leader">
        <div class="container">
            <?php

            if( have_rows('image_link') ):
                while ( have_rows('image_link') ) : the_row();
            ?>

                    <a href="<?php the_sub_field('button_target'); ?>"><img src="<?php the_sub_field('image'); ?>">
                    <div class="content-wrap"><h2><?php the_sub_field('heading'); ?></h2>
	                    <p><?php the_sub_field('button_text'); ?></p></div>
                    </a>

            <?php
                endwhile;

            else :
                // no rows found
            endif;

            ?>
        </div><!--container-->
            <div id="int"></div>
    </section><!--quote-->

    <h2>International Sporting Travel</h2>
    
    <section class="image-leader">
        <div class="container">
	        <div class="row">
            <?php

            if( have_rows('image_link_small') ):
                while ( have_rows('image_link_small') ) : the_row();
            ?>


                <div class="col-sm-4">
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
    </section><!--quote-->    
    
<script type="text/javascript">
	jQuery(document).ready(function( $ ) {
var $root = $('html, body');

$('a[href^="#"]').click(function () {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 800);

    return false;
});
});
</script>    
    
    
    
    
    <?php get_template_part('part', 'quarry'); ?><?php get_template_part('part', 'gallery'); ?><?php get_footer(); ?>
</body>
</html>
