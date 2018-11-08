<?php get_header(); ?>

<?php get_template_part('part','hello-section'); ?>
<?php get_template_part('part','info-bar'); ?>

<main class="archive-availability">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <section class="availability section-paddings--both text-center">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="bordered-title bordered-title--black">Availability</h2><!-- /.bordered-title bordered-title--black -->
                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="mix-it-up">

                                <?php if ( have_posts() ) : ?>

                                    <div class="mix-it-up__controls">
                                        <button class="filter" data-filter="all">All</button>

                                        <?php $i = 0; ?>
                                        <?php $destinations = array(); ?>
                                        <?php while ( have_posts() ) : the_post(); ?>

                                            <?php if(!in_array(get_field('destination'), $destinations)): ?>

                                                <button class="filter" data-filter=".<?php echo sanitize_title(get_field('destination')) ;?>"><?php the_field('destination') ;?></button>

                                            <?php endif; ?>

                                            <?php $destinations[$i] = get_field('destination'); ?>
                                            <?php $i++; ?>

                                        <?php endwhile; ?>

                                        <button class="filter" data-filter=".mixed-bag">Mixed bag</button>
                                    </div><!-- /.mix-it-up-controls -->

                                    <div id="mix-it-up" class="mix-it-up__container">

                                        <div class="availability__table-titles">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <span class="title title--first">Date</span>
                                                </div><!-- /.col-sm-2 -->
                                                <div class="col-sm-2">
                                                    <span class="title">Destination</span>
                                                </div><!-- /.col-sm-2 -->
                                                <div class="col-sm-3">
                                                    <span class="title">Estate</span>
                                                </div><!-- /.col-sm-3 -->
                                                <div class="col-sm-1">
                                                    <span class="title bag">Bag</span>
                                                </div><!-- /.col-sm-1 -->
                                                <div class="col-sm-1">
                                                    <span class="title guns">Guns</span>
                                                </div><!-- /.col-sm-1 -->
                                                <div class="col-sm-3">
                                                    <span class="title">Price</span>
                                                </div><!-- /.col-sm-3 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.availability__table-titles -->

                                        <?php while ( have_posts() ) : the_post(); ?>

                                            <div class="mix single-availability <?php echo sanitize_title(get_field('destination')) ;?><?php if(get_field('mixed_bag')=='yes') echo ' mixed-bag'; ?>">

                                                <div class="row">
                                                    <div class="col-sm-2 col-xs-10">
                                                        <span class="single-availability__date"><?php the_field('date'); ?></span>
                                                    </div><!-- /.col-sm-2 col-xs-10 -->
                                                    <div class="col-sm-2 col-xs-10">
                                                        <span class="single-availability__destination"><?php the_field('destination') ;?></span>
                                                    </div><!-- /.col-sm-2 col-xs-10 -->
                                                    <div class="col-sm-3 col-xs-10">
                                                        <span class="single-availability__estate"><?php the_title(); ?></span>
                                                    </div><!-- /.col-sm-3 col-xs-10 -->
                                                    <div class="col-sm-1 col-xs-10">
                                                        <span class="single-availability__bag"><?php the_field('bag') ?></span>
                                                    </div><!-- /.col-sm-1 col-xs-10 -->
                                                    <div class="col-sm-1 col-xs-10">
                                                        <span class="single-availability__guns"><?php the_field('guns') ?></span>
                                                    </div><!-- /.col-sm-1 col-xs-10 -->
                                                    <div class="col-sm-2 col-xs-10">
                                                        <span class="single-availability__price"><?php the_field('price') ?></span>
                                                    </div><!-- /.col-sm-2 col-xs-10 -->
                                                </div><!-- /.row -->
                                                <a href="mailto:<?php the_field('email_address', 'option');?>?subject=Enquiry about <?php the_title(); ?> (<?php the_field('date'); ?>)" class="single-availability__link-button">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-arrow--right.svg" alt="Link icon" />
                                                </a>
                                            </div>

                                        <?php endwhile; ?>

                                        <div class="gap"></div>
                                        <div class="gap"></div>
                                    </div><!-- /#mix-it-up.mix-it-up__container -->
                                </div><!-- /.mix-it-up -->

                            <?php endif; ?>

                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->
                </section><!-- /.availability section-paddings--both text-center -->

            </div><!-- /.col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php get_template_part('part', 'gallery'); ?>

</main><!-- /.archive-availability -->

<?php get_footer(); ?>
