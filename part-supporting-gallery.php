<?php 

$images = get_field('sl-gallery');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
<div class="owl-carousel owl-theme supporting-gallery">

        <?php foreach( $images as $image ): ?>
            <div class="item">
            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div>


<script type="text/javascript">
	jQuery(document).ready(function( $ ) {
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ["",""],
    autoPlay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
});
</script>


