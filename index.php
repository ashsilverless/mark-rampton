<?php get_header(); ?>

<?php echo do_shortcode('[rev_slider alias="homepage"]'); ?>

<main class="homepage">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <section id="who-we-are" class="who-we-are section-paddings--both text-center">
        			<div class="row">
        				<div class="col-xs-12">
        					<div class="circled-social-icons circled-social-icons--green-light">
        						<?php get_template_part('part', 'socials'); ?>
        					</div><!-- /.circled-social-icons circled-social-icons--green-light -->
        					<h2 class="who-we-are__title"><?php the_field('homepage_who_we_are_title', 'option'); ?></h2><!-- /.who-we-are__title -->
        				</div><!-- /.col-xs-12 -->
        			</div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="who-we-are__content"><?php the_field('homepage_who_we_are_content', 'option'); ?></div><!-- /.who-we-are__content -->
        					<a href="<?php the_field('homepage_who_we_are_read_more_button', 'option'); ?>" class="khaki-dust-button khaki-dust-button__flat khaki-dust-button__flat--green animsition-link">Read more</a>
                        </div><!-- /.col-md-8 col-md-offset-2 -->
                    </div><!-- /.row -->
            	</section><!-- /.who-we-are section-paddings--both text-center -->

                <?php
                    $loop = new WP_Query( array(
                        'post_type' => 'destinations'
                    ) );
                ?>

                <?php if ( $loop->have_posts() ) : ?>

                    <section id="destinations" class="destinations section-paddings--bottom text-center">
            			<div class="row">
            				<div class="col-xs-12">
        						<h2 class="bordered-title bordered-title--black">Destinations</h2><!-- /.bordered-title bordered-title--black -->
                                <div class="destinations-gallery">
        							<div class="row">

                                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                            <?php $post_id = get_the_ID(); ?>
                                            <?php $images = get_field('gallery'); ?>
                                            <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>


                                            <div class="col-sm-6 col-md-4 text-left">
                                                <div class="single-destination" data-mh="single-destinations-match-height">
                                                    <div class="covered-link-image covered-link-image--height-260" style="background-image: url('<?php echo $featured_image_url; ?>');">
                                                        <h3 class="single-destination__title"><?php the_title(); ?></h3>

                                                        <?php $terms = get_the_terms( get_the_ID(), 'destinations_territories' ); ?>

                                                        <h4 class="single-destination__country">

                                                        <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                                                            <?php foreach ( $terms as $term ) : ?>
                                                                <?php echo $term->name ?>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                        </h4><!-- /.single-destination__country -->
                                                    </div><!-- /.covered-link-image covered-link-image--height-430 -->
                                                    <div class="single-destination__excerpt">
                                                        <p><?php echo wp_trim_words( get_field('excerpt'), 20, '...' ); ?></p>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="single-destination__learn-more animsition-link"><img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-arrow--right.svg" alt="Learn more icon" /></a>
                                                </div>
                                            </div>

                                            <?php if( $images ): ?>

                                                <div class="fancybox-hidden">
                                                    <div class="image-gallery section-paddings--top">
                                                        <div class="row">

                                                        <?php $i=0; ?>
                                                        <?php foreach( $images as $image ): ?>

                                                            <?php if($i==0) { $i++; continue; } ?>

                                                            <div class="col-xs-4">
                                                                <div class="single-image">
                                                                    <img src="<?php echo $image['sizes']['image-gallery']; ?>" class="single-image__image img-responsive" alt="<?php echo $image['title']; ?>">
                                                                    <div class="inside-wrapper">
                                                                        <div class="vertical-center">
                                                                            <a href="<?php echo $image['url']; ?>" class="single-image__show-gallery" rel="gallery-<?php echo $post_id; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-plus.svg" /></a>
                                                                        </div><!-- /.vertical-center -->
                                                                    </div><!-- /.inside-wrapper -->
                                                                </div><!-- /.single-image -->
                                                            </div><!-- /"col-xs-4 -->

                                                            <?php $i++; ?>

                                                        <?php endforeach; ?>

                                                        </div><!-- /.row -->
                                                    </div><!-- /.image-gallery section-paddings--top -->
                                                </div><!-- /.fancybox-hidden -->

                                            <?php endif; ?>

                                        <?php endwhile; ?>

                                    </div><!-- /.row -->
        						</div><!-- /.destinations-gallery -->
                            </div><!-- /.col-xs-12 -->
            			</div><!-- /.row -->
                	</section><!-- /.destinations section-paddings--bottom text-center -->

                 <?php endif; ?>

            </div><!-- /.col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.homepage -->

<?php get_template_part('part', 'quarry'); ?>
<?php get_template_part('part', 'gallery'); ?>

<?php get_footer(); ?>