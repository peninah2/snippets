<?php
/**
 * Carousel
 *
 * @package    HCStarter
**/

$images = get_field('marquee');
$size = 'full';
if( $images ): ?>

<?php if ( is_admin() ) {
	
	$i = 0;
	
	foreach( $images as $image_id ) {
	$i++; 
	if( $i > 3 ):
			break;
	endif; ?>
		<div style="width: 33%; padding: 0 30px; float: left;" class="swiper-slide carousel-slide">
			<?php echo wp_get_attachment_image( $image_id, $size ); ?>
		</div>
	<?php }
	
	echo '<div style="clear: both"></div>';
}
else { ?>

	<div class="hct-marquee">
		<?php foreach( $images as $image_id ): ?>
			<?php echo wp_get_attachment_image( $image_id, $size ); ?>
		<?php endforeach; ?>
	</div>
	
<?php 
  }
  endif; ?>	