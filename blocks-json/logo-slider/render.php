<?php
/**
 * Logo slider/carousel
 *
 * @package  HCStarter
**/

$images = get_field('logos');
$size = 'full';
if( $images ): ?>

<?php if ( is_admin() ) {
	
	$i = 0;
	
	foreach( $images as $image_id ) {
	$i++; 
	if( $i > 3 ):
			break;
	endif; ?>
		<div style="width: 33%; padding: 0 30px; float: left;" class="swiper-slide">
			<?php echo wp_get_attachment_image( $image_id, $size ); ?>
		</div>
	<?php }
	
	echo '<div style="clear: both"></div>';
}
else { ?>

	<div class="logo-slider swiper">
		<div class="swiper-wrapper">
			<?php foreach( $images as $image_id ): ?>
				<div class="swiper-slide slide">
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>
				</div>				
			<?php endforeach; ?>
		</div>
	</div>	
	
<?php 
  }
endif; ?>	