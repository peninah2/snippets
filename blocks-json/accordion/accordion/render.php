<?php
/**
 * Accordion Block
 * Accessible accordion via
 * https://www.hassellinclusion.com/blog/accessible-accordion-pattern/
 *
 * @package      HCStarter
**/

$classes = ['accordion-container'];
if( !empty( $block['align'] ) )
    $classes[] = 'align' . $block['align'];

$rows = get_field('accordion');
if( $rows ) {
   echo '<div class="' . join( ' ', $classes ) . '">';
   
    foreach( $rows as $row ) {
		
		$question	= $row['question'];		
		echo '<h4 class="accordion-title">' . $question . '</h4>';
		echo $row['answer'];
					
    }
	
    echo '</div>';
}