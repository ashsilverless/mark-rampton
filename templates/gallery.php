<?php
    /*
        Template Name: Gallery
    */
?>

<?php get_header(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>

<main class="template-about-gallery">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <?php $images = get_field('gallery'); ?>

                <?php if( $images ): ?>

                    <section class="section-paddings--both">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-center">
                                    <h2 class="bordered-title bordered-title--black">Gallery</h2><!-- /.bordered-title bordered-title--black -->
                                </div><!-- /.text-center -->
                            </div><!-- /.col-xs-12 -->
                        </div><!-- /.row -->
                        <div class="mix-it-up">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="mix-it-up__controls text-center">
                                        <button class="filter active" data-filter="all">All</button>

                                        <?php
                                            $loop = new WP_Query( array(
                                                'post_type' => 'destinations'
                                            ) );
                                        ?>

                                        <?php if ( $loop->have_posts() ) : ?>
                                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                                <button class="filter" data-filter=".<?php the_slug(); ?>"><?php the_title(); ?></button>

                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                        <?php wp_reset_query(); ?>

                                    </div><!-- /.mix-it-up__controls text-center -->
                                </div><!-- /.col-xs-12 -->
                            </div><!-- /.row -->
                            <div class="image-gallery mix-it-up__containers">
                                <div class="row">

                                    <?php while( have_rows('gallery_repeater') ): the_row(); ?>
                                        <?php $connections = get_sub_field('connection'); ?>

                                        <?php if( get_sub_field('type') == 'Video' ): ?>

                                            <?php $file = get_sub_field('video'); ?>
                                            <?php if( !empty($file) ): ?>

                                                <?php
                                                    $video = get_sub_field('video');

                                                    preg_match('/src="(.+?)"/', $video, $matches_url );
                                                    $src = $matches_url[1];

                                                    preg_match('/embed(.*?)?feature/', $src, $matches_id );
                                                    $id = $matches_id[1];
                                                    $id = str_replace( str_split( '?/' ), '', $id );
                                                ?>

                                                    <div class="mix <?php foreach( $connections as $connection) { echo ' '.get_the_slug($connection->ID); }; ?>">
                                                        <div class="single-image" data-mh="box">
                                                            <div alt="Youtube thumbnail" style="background-image: url('http://img.youtube.com/vi/<?php echo $id; ?>/0.jpg');" class="single-image__image single-image__image--youtube img-responsive" /></div>
                                                            <div class="inside-wrapper">
                                                                <div class="vertical-center">
                                                                    <a href="<?php echo get_sub_field('video', false, false) ?>" class="iframe single-image__show-gallery single-image__show-gallery--youtube" rel="galleri">
                                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon__play.svg" />
                                                                    </a>
                                                                </div><!-- /.vertical-center -->
                                                            </div><!-- /.inside-wrapper -->
                                                        </div><!-- /.single-image -->
                                                    </div><!-- /.mix -->

                                            <?php endif; ?>

                                        <?php else: ?>

                                            <?php $image = get_sub_field('image'); ?>

                                                <div class="mix <?php foreach( $connections as $connection) { echo ' '.get_the_slug($connection->ID); }; ?>">
                                                    <div class="single-image" data-mh="box">
                                                        <img src="<?php echo $image['sizes']['image-gallery']; ?>" class="single-image__image img-responsive" alt="<?php echo $image['title']; ?>">
                                                        <div class="inside-wrapper">
                                                            <div class="vertical-center">
                                                                <a href="<?php echo $image['url']; ?>" class="single-image__show-gallery" rel="galler">
                                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-plus.svg" />
                                                                </a>
                                                            </div><!-- /.vertical-center -->
                                                        </div><!-- /.inside-wrapper -->
                                                    </div><!-- /.single-image -->
                                                </div><!-- /.mix -->

                                        <?php endif; ?>

                                    <?php endwhile; ?>

                                </div><!-- /.row -->
                                <div class="gap"></div>
                                <div class="gap"></div>
                            </div><!-- /.image-gallery section-paddings--top -->
                        </div><!-- /.mix-it-up -->
                    </section><!-- /.section-paddings--both -->

                <?php endif; ?>

            </div><!-- /.col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.template-about-gallery -->

<?php get_template_part('part', 'plan-your-next-safari'); ?>

<?php get_footer(); ?>
