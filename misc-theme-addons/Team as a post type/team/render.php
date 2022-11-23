<?php 



$args = array(
	'posts_per_page' => -1,
	'post_type' => 'team',
);
$team_query = new WP_Query( $args );


if ( $team_query->have_posts() ) {
	
	while ( $team_query->have_posts() ) : $team_query->the_post(); 
		
		global $post;
		
		$name = get_the_title();
		$title = get_field( 'title', $post->ID );
		$phone = get_field( 'phone', $post->ID );
		$email = get_field( 'email', $post->ID );
		$img = get_field( 'image', $post->ID );
		$gif = get_field( 'gif', $post->ID );
		?>
		<div class="team-member riseUp">
			<div class="team-thumbnail">
				<?php 
				if( $img ) {
					echo wp_get_attachment_image( $img, 'full', false, array( "class" => "team-pic" ) );
				} 
				else {
					echo '<span class="placeholder"></span>';
				}
				?>
			</div>
			<div aria-hidden="true" class="wp-block-spacer spacer-small-height"></div>
			<h4 class="has-text-color has-XXX-color"><strong><?php echo $name; ?></strong></h4>
			<p style="margin-bottom: 0;">
				<?php echo $title ?> 
				<?php if ($bio) echo ' &nbsp; &middot; &nbsp; <a data-featherlight="#' . $slug . '-show">Bio</a>'; ?>
			</p>
			<?php if ($bio) : ?>	
				<div class="team-bio has-text-align-center f-hide" id="<?php echo $slug; ?>-show">
					<figure class="team-thumbnail thumb-bio">
						<?php				
						if( $img ) {
							echo wp_get_attachment_image( $img, 'full', false, array( "class" => "team-pic" ) );
						}
						?>
					</figure>
					<h4 class="has-text-color has-XXX-color"><strong><?php echo $name; ?></strong></h4>
					<p><?php echo $title ?></p>
					<div class="has-text-align-left"><?php echo $bio; ?></div>			
				</div>
			<?php endif; ?>
		</div>	
			
			
		<?php
	endwhile;
	
	wp_reset_postdata();
}