<?php
/**
 * Gallery
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
		if( $i > 1 ):
				break;
		endif; ?>
			<div class="swiper-slide">
				<?php echo wp_get_attachment_image( $image_id, $size ); ?>
			</div>
		<?php }
	
	echo '<div style="clear: both"></div>';
			
	} else {	?>
		<div class="gallery">

			<div class="slider featherlight-init swiper">
				<div class="swiper-wrapper" data-featherlight-gallery data-featherlight-filter="a">
					<?php foreach( $images as $image_id ): ?>
						<div class="swiper-slide slide">
							<a href="<?php echo wp_get_attachment_url( $image_id ); ?>" rel="gallery">
								<?php echo wp_get_attachment_image( $image_id, $size ); ?>
							</a>
						</div>				
					<?php endforeach; ?>
				</div>
				<div class="swiper-button-next"></div> <div class="swiper-button-prev"></div>
			</div>	

			<div class="thumbs-container">
				<div class="swiper thumbsSlider">
					<div class="swiper-wrapper">
						<?php foreach( $images as $image_id ): ?>
							<div class="swiper-slide slide">
								<?php echo wp_get_attachment_image( $image_id, $size ); ?>
							</div>				
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			
		</div>	
	<?php 
	
	} 
	
endif;
?>	