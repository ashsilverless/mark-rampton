<?php if(is_post_type_archive('destinations')): ?>
    <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id(5) ); ?>
<?php elseif(is_post_type_archive('quarry')): ?>
    <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id(7) ); ?>
<?php elseif(is_post_type_archive('availability')): ?>
    <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id(925) ); ?>
<?php else: ?>
    <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php endif; ?>

<?php global $wp_query; ?>

<section class="hello-section<?php if(is_search()) echo ' hello-section--search'; ?> background-cover text-center section-paddings--both <?php the_field('align_main_image'); ?>" style="background-image: url('<?php echo $featured_image_url; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="hello-section__title">
                    <?php if(is_archive()) {
                        post_type_archive_title();
                    } elseif(is_search()) {
                        echo $wp_query->found_posts; ?> search results for "<?php if(isset($_GET['s'])) echo $_GET['s'];
                    } else {
                        the_title();
                    } ?>
                </h1><!-- /.hello-section__title -->
                <?php if(!is_search()): ?>
                    <div class="hello-section__content">
                        <?php if(is_post_type_archive('destinations')): ?>
                            <?php the_field('hello_section_content', 5); ?>
                        <?php elseif(is_post_type_archive('quarry')): ?>
                            <?php the_field('hello_section_content', 7); ?>
                        <?php elseif(is_post_type_archive('availability')): ?>
                            <?php the_field('hello_section_content', 925); ?>
                        <?php else: ?>
                            <?php the_field('hello_section_content'); ?>
                        <?php endif; ?>
                    </div><!-- /.hello-section__content -->
                <?php endif; ?>
            </div><!-- /.col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.hello-section background-cover text-center section-paddings--both -->
