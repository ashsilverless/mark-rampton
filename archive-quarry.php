<?php get_header(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>

<main class="archive-quarry">

    <div class="container">

        <?php if ( have_posts() ) : ?>

            <section class="quarry-images-gallery section-paddings--both text-center">
                <div class="row">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php $post_id = get_the_ID(); ?>
                        <?php $images = get_field('gallery'); ?>
                        <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <?php $current_quarry_title = get_the_title(); ?>

                        <div class="col-sm-6 col-ms-6">
                            <div class="single-image-quarry match-height">
                                <div class="covered-link-image covered-link-image--height-430" style="background-image: url('<?php echo $featured_image_url; ?>');">
                                    <div class="inside-wrapper">
                                        <div class="vertical-center">
                                            <a href="<?php echo $images[0]['url']; ?>" class="covered-link-image__show-gallery" rel="gallery-<?php echo $post_id; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-plus.svg" /></a>
											<a href="<?php the_permalink(); ?>" class="covered-link-image__learn-more animsition-link"><img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-arrow--right.svg" alt="Learn more icon" /></a>
                                        </div><!-- /.vertical-center -->
                                    </div><!-- /.inside-wrapper -->
                                </div><!-- /.covered-link-image covered-link-image--height-430 -->
                                <div class="title-wrapper" data-mh="content-wrapper-height">
                                    <a href="#" class="title-wrapper__title"><h3><?php the_title(); ?></h3></a>

                                    <?php
                                        $loop = new WP_Query( array(
                                            'post_type' => 'destinations'
                                        ) );
                                    ?>

                                    <?php if ( $loop->have_posts() ) : ?>

                                        <div class="centered-list">
                                            <ul class="title-wrapper__places reset-list">

                                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                                    <?php $post_objects = get_field('quarry'); ?>
                                                    <?php $current_destination_title = get_the_title(); ?>

                                                    <?php if( $post_objects ): ?>

                                                        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>

                                                            <?php setup_postdata($post); ?>
                                                            <?php $quarry_title_inside_single_destination = get_the_title(); ?>

                                                            <?php if($quarry_title_inside_single_destination == $current_quarry_title): ?>
                                                                <li><?php echo $current_destination_title; ?></li>
                                                            <?php endif; ?>

                                                        <?php endforeach; ?>

                                                        <?php wp_reset_postdata();?>

                                                    <?php endif; ?>

                                                <?php endwhile; ?>

                                            </ul><!-- /.title-wrapper__places reset-list -->
                                            <div class="clearfix"></div><!-- /.clearfix -->
                                        </div><!-- /.centered-list -->

                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>

                                </div><!-- /.title-wrapper -->
                            </div><!-- /.single-image-quarry -->
                        </div><!-- /.col-sm-6 col-ms-6 -->


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
            </section><!-- /.quarry-image-gallery section-paddings--both text-center -->

        <?php endif; ?>

    </div><!-- /.container -->

</main><!-- /.archive-quarry -->

<?php get_template_part('part', 'gallery'); ?>

<?php get_footer(); ?>
