<?php
/**
 * Team Member block
 *
 * @package      HCStarter
**/
?>
<?php

$name 	= get_field( 'name' );
$slug 	= sanitize_title( $name );
$role	= get_field( 'role' );
$bio	= get_field( 'bio' );
$img	= get_field( 'image' );
?>
<div class="team-member has-text-align-center riseUp">
	<div class="team-thumbnail">
		<?php 
		if( $img ) {
			echo wp_get_attachment_image( $img, 'full' );
		} 
		else {
			echo '<span class="placeholder"></span>';
		}
		?>
	</div>
	<div aria-hidden="true" class="wp-block-spacer spacer-small-height"></div>
	<h4 class="has-text-color has-XXX-color"><strong><?php echo $name; ?></strong></h4>
	<p style="margin-bottom: 0;">
		<?php echo $role ?> 
		<?php if ($bio) echo ' &nbsp; &middot; &nbsp; <a data-featherlight="#' . $slug . '-show">Bio</a>'; ?>
	</p>
	<?php if ($bio) : ?>	
		<div class="team-bio has-text-align-center f-hide" id="<?php echo $slug; ?>-show">
			<figure class="team-thumbnail thumb-bio">
				<?php				
				if( $img ) {
					echo wp_get_attachment_image( $img, 'full' );
				}
				?>
			</figure>
			<h4 class="has-text-color has-XXX-color"><strong><?php echo $name; ?></strong></h4>
			<p><?php echo $role ?></p>
			<div class="has-text-align-left"><?php echo $bio; ?></div>			
		</div>
	<?php endif; ?>
</div>