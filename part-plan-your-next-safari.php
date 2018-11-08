<?php $images = get_field('gallery', 13); ?>
<?php $rand = array_rand($images, 1); ?>

<?php if( $images ): ?>

    <section class="plan-your-next-safari section-paddings--both parallax-window" data-parallax="scroll" data-image-src="<?php echo $images[$rand]['url']; ?>">
        <div class="vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="bordered-title bordered-title--white">Book now</h2><!-- /.bordered-title bordered-title--white -->
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.vertical-center -->
        <a href="#contact" class="plan-your-next-safari__cta page-scroll">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        FILL IN OUR FORM, OR CALL US TODAY TO DISCUSS YOUR NEXT TRIP
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon__bordered-arrow--right.svg" alt="Contact us icon" />
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </a>
        <div class="plan-your-next-safari__shadow"></div><!-- /.gallery__shadow -->
    </section><!-- /.plan-your-next-safari section-paddings--both -->

<?php endif; ?>
