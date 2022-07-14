<?php 


$location = get_field('address');
$title    = get_field( 'title' );
if( $location ): ?>
    <div class="acf-map" data-zoom="16">
		<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                <h3><?php echo esc_html( $title ); ?></h3>
                <p><?php echo esc_html( $location['address'] ); ?></p>
            </div>
    </div>
<?php endif; ?>