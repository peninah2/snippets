<?php 
?>
 <section class="tabcordion has-tabs">
 
	<div class="tabcordion-tabs-wrapper">
		<div class="tabcordion--tabs flexbox tabs" role="tablist" aria-label="TabCordion">
			<?php 
			 if( have_rows('tabcordion') ):
			 
				$i = 0;
				while( have_rows('tabcordion') ) : the_row(); 
				
				$title = get_sub_field('title');
				?>
					
					<button 
						class="flex-1 tab <?php if ($i == 0) echo 'is-active'; ?>" 
						role="tab" 
						aria-selected="<?php if ($i == 0) echo 'true'; else echo 'false'; ?>" 
						aria-controls="<?php echo sanitize_title( $title ); ?>-content" 
						id="<?php echo sanitize_title( $title ); ?>" 
						<?php if ($i !== 0) echo 'tabindex="-1" '; ?>
					>
						<?php echo $title ?>
					</button>
					<?php
				$i++;
				endwhile;
			 endif;
			 ?>		  
		</div>
	</div>
	
	<?php 
		if( have_rows('tabcordion') ): 
			$i = 0; 
			while( have_rows('tabcordion') ) : the_row();
			
				$title = get_sub_field('title'); ?>
				
					<section 
						id="<?php echo sanitize_title( $title );?>-content" 
						class="tabcordion--entry <?php if ($i == 0) echo 'is-active'; ?>" 
						role="tabpanel" 	 
						data-title="<?php echo $title; ?>" 
						aria-labelledby="<?php echo sanitize_title( $title ); ?>"
					>
						<div class="tabcordion--entry-container">
							<div class="tabcordion--entry-content">
									<?php echo wp_kses_post( get_sub_field( 'description' ) ); ?>
							</div>
						</div>
					</section>
				<?php
				$i++; 
			endwhile;			
		endif;
		?>
</section>