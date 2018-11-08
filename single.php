<?php get_header(); ?>
<?php the_post(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>

<?php $post_id = get_the_ID(); ?>
<?php $post_objects_quarry = get_field('quarry'); ?>
<?php $the_title = get_the_title(); ?>

<main class="single-post">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <article class="section-paddings--both">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="text-center"><?php the_field('title'); ?></h2><!-- /.text-center -->
                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <?php the_field('excerpt'); ?>

                            <?php if(get_field('expanded_description')): ?>

                                <div class="collapse" id="collapseContent">
                                    <?php the_field('expanded_description'); ?>
                                </div>

                                <div class="text-center">
                                    <button id="toggle-content-button" class="khaki-dust-button khaki-dust-button__flat khaki-dust-button__flat--green" type="button" data-toggle="collapse" data-target="#collapseContent" aria-expanded="false" aria-controls="collapseContent">
                                        Read more
                                    </button>
                                </div><!-- /.text-center -->

                            <?php endif; ?>

                        </div><!-- /.col-md-8 col-md-offset-2 -->
                    </div><!-- /.row -->

                    <?php if(get_post_type($post->ID)=='destinations'): ?>

                        <?php if( have_rows('introduction_descriptions') ): ?>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="introduction-descriptions">
                                        <h3><?php the_field('introduction_descriptions_title'); ?></h3>

                                        <?php while( have_rows('introduction_descriptions') ): the_row(); ?>

                                            <div class="single-description">
                                                <h4 class="single-description__title"><?php the_sub_field('title'); ?></h4>
                                                <div class="single-description__content">
                                                    <?php the_sub_field('content'); ?>
                                                </div><!-- /.single-description__content -->
                                            </div><!-- /.single-description section-paddings--top -->

                                        <?php endwhile; ?>

                                    </div><!-- /.introduction-descriptions section-paddings--top -->
                                </div><!-- /.col-md-8 col-md-offset-2 -->
                            </div><!-- /.row -->


                        <?php endif; ?>

                    <?php endif; ?>

                    <?php $images = get_field('gallery'); ?>

                    <?php if( $images ): ?>

                        <div class="image-gallery section-paddings--top">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h3 class="image-gallery__title text-center"><?php the_field('gallery_title'); ?></h3><!-- /.image-gallery__title text-center -->
                                </div><!-- /.col-md-8 col-md-offset-2 -->

                            <?php foreach( $images as $image ): ?>

                                <div class="col-xs-4">
                                    <div class="single-image">
                                        <img src="<?php echo $image['sizes']['image-gallery']; ?>" class="single-image__image img-responsive" alt="<?php echo $image['title']; ?>">
                                        <div class="inside-wrapper">
                                            <div class="vertical-center">
                                                <a href="<?php echo $image['url']; ?>" class="single-image__show-gallery" rel="gallery-<?php the_slug(); echo '-'.$post_id; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-plus.svg" /></a>
                                            </div><!-- /.vertical-center -->
                                        </div><!-- /.inside-wrapper -->
                                    </div><!-- /.single-image -->
                                </div><!-- /"col-xs-4 -->

                            <?php endforeach; ?>

                            </div><!-- /.row -->
                        </div><!-- /.image-gallery section-paddings--top -->

                    <?php endif; ?>

                </article><!-- /.section-paddings--both -->

            </div><!-- /.col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php if(get_post_type($post->ID)=='destinations'): ?>

        <div class="container">
            <section class="destinations section-paddings--bottom text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="destinations__title"><?php the_field('travels_title'); ?></h3><!-- /.destinations__title -->
                    </div><!-- /.col-md-8 col-md-offset-2 -->
                    <div class="col-xs-12">
                        <div class="destinations-gallery">
                            <div class="row">

                                <?php $i = 1; ?>
                                <?php while( have_rows('travels') ): the_row(); ?>

                                    <?php $image = get_sub_field('image_travel'); ?>

                                    <div class="col-sm-6 col-md-4 text-left">
                                        <div class="single-destination" data-mh="single-destinations-match-height">
                                            <div class="covered-link-image covered-link-image--height-260" style="background-image: url('<?php echo $image['url']; ?>');">
                                                <h3 class="single-destination__title"><?php the_sub_field('name_travel'); ?></h3>
                                                <h4 class="single-destination__country">South Africa</h4><!-- /.single-destination__country -->
                                            </div><!-- /.covered-link-image covered-link-image--height-430 -->
                                            <div class="single-destination__excerpt" data-mh="excerpt">
                                                <?php $excerpt = wp_trim_words( get_sub_field('caption' ), $num_words = 30, $more = '...' ); ?>
                                                <?php echo $excerpt; ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <span class="single-destination__description">Read more</span>
                                                </div><!-- /.col-xs-8 -->
                                                <div class="col-xs-2">
                                                    <button type="button" onclick="location.href='#modal-<?php echo $i; ?>'" data-toggle="modal" data-target="#myModal">
                                                        <a href="#modal-<?php echo $i; ?>" class="single-destination__learn-more"><img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-arrow--right.svg" alt="Learn more icon" /></a>
                                                    </button>
                                                </div><!-- /.col-xs-2 -->
                                            </div><!-- /.row -->
                                        </div>
                                    </div>

                                    <?php $i++; ?>
                                <?php endwhile; ?>

                            </div><!-- /.row -->
                        </div><!-- /.destinations-gallery -->
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </section><!-- /.destinations section-paddings--bottom text-center -->
        </div><!-- /.container -->

        <div class="map">

            <?php $location = get_field('location'); ?>

            <?php if( !empty($location) ): ?>

                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>

            <?php endif; ?>

        </div><!-- /.map -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog modal-lg vertical-align-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="owl-carousel">

                                <?php $i = 1; ?>
                                <?php while( have_rows('travels') ): the_row(); ?>
                                    <?php $image = get_sub_field('image_travel'); ?>

                                    <div class="owl-item" data-hash="modal-<?php echo $i; ?>">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="modal-body__image background-cover" style="background-image: url('<?php echo $image['url']; ?>');"></div><!-- /.modal-body__image background-cover -->
                                            </div><!-- /.col-md-7 -->
                                            <div class="col-md-5">
                                                <h4 class="modal-body__title"><?php the_sub_field('name_travel'); ?></h4>
                                                <div class="modal-body__content">
                                                    <?php the_sub_field('caption'); ?>
                                                </div><!-- /.modal-body__content -->
                                                <a href="#contact" class="modal-body__link page-scroll" data-dismiss="modal" >Contact us for more information</a>
                                            </div><!-- /.col-md-5 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.owl-item -->

                                    <?php $i++; ?>
                                <?php endwhile; ?>

                            </div><!-- /.owl-carousel owl-theme -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</main><!-- /.single-post -->

<?php get_footer(); ?>
