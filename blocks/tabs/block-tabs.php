<?php
/**
 * Tabs block
 *
 * @package      HCStarter
**/
?>
<?php 

if( have_rows('tabs') ):
		
	// Set up tabs
	echo '<div class="tabs flexbox">';
	
	$i = 0;
    while( have_rows('tabs') ) : the_row(); 
	
		$default = '';
		if ( get_sub_field('default_open') == true )
			$default = 'defaultOpen';		
		?>
		
		<button class="tablinks flex-1" onclick="openView(event, 'tab<?php echo $i; ?>')" id="<?php echo $default; ?>">
			<?php echo the_sub_field('tab_title'); ?>
		</button>
	
	<?php 
	$i++;
	
	endwhile;
	
	echo '</div>';
	
	
	// Set up tab content
	echo '<div class="tabbed-content">';
	
	$i = 0;
    while( have_rows('tabs') ) : the_row(); 
			
		?>
		
		<div id="tab<?php echo $i; ?>" class="tabcontent">
			<?php echo the_sub_field('tab_content'); ?>			
		</div>
	
	<?php 
	$i++;
	
	endwhile;
	echo '</div>';
	

endif;