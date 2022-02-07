<?php
/**
 * Slider
 *
 * @package  HCStarter
**/

$images = get_field('gallery');
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

	<div class="slider featherlight-init swiper">
		<div class="swiper-wrapper" data-featherlight-gallery data-featherlight-filter="a">
			<?php foreach( $images as $image_id ): ?>
				<div class="swiper-slide slide">
					<a href="<?php echo wp_get_attachment_url( $image_id ); ?>" rel="carousel">
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>
					</a>
				</div>				
			<?php endforeach; ?>
		</div>
		<div class="swiper-button-next"></div> <div class="swiper-button-prev"></div>
	</div>	
	
<?php 
  }
  endif; ?>	