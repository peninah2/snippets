<?php
/**
 * Simple slider
 *
 * @package  HCStarter
**/

$classes = [];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) ); 


$images = get_field('images');
$size = 'full';
if( $images ): ?>

	<div class="img-slider swiper <?php echo join( ' ', $classes ); ?>">
		<div class="swiper-wrapper">
			<?php foreach( $images as $image_id ): ?>
				<div class="swiper-slide slide">
						<?php echo wp_get_attachment_image( $image_id, $size ); ?>
				</div>				
			<?php endforeach; ?>
		</div>
	</div>	
	
<?php endif; ?>	