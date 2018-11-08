<?php
    $loop = new WP_Query( array(
        'post_type' => 'quarry-disabled'
    ) );
?>

<?php if ( $loop->have_posts() ) : ?>

    <section id="quarry" class="quarry section-paddings--both text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="bordered-title bordered-title--green-light">Quarry</h2><!-- /.bordered-title bordered-title--green-light -->
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
            <div class="quarry-icons-gallery">
                <div class="row">

                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <?php $image = get_field('icon'); ?>

                        <div class="col-md-15 col-sm-4 col-ms-4 col-xs-6">
                            <a href="<?php the_permalink(); ?>" class="single-icon-quarry animsition-link">

                                <?php if( !empty($image) ): ?>

                                    <div class="single-icon-quarry__icon">
                                        <div class="vertical-center">
                                            <img src="<?php echo $image['url']; ?>" class="svg" alt="<?php echo $image['title']; ?>" />
                                        </div><!-- /.vertical-center -->
                                    </div><!-- /.single-icon-quarry__icon -->

                                <?php endif; ?>

                                <h3 class="single-icon-quarry__title"><?php the_title(); ?></h3><!-- /.single-icon-quarry__title -->
                            </a><!-- /.single-icon-quarry -->
                        </div><!-- /.col-md-15 col-sm-4 col-ms-4 col-xs-6 -->

                    <?php endwhile; ?>

                </div><!-- /.row -->
            </div><!-- /.quarry-icons-gallery -->
        </div><!-- /.container -->
    </section><!-- /.quarry section-paddings--both text-center -->

<?php endif; ?>
