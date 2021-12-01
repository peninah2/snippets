<?php 
/*
 * Number counter
 * Corresponding jquery on acf-block-setup.php
 */
 
 
 
$classes = [];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
 
 $num 	= get_field( 'number' );
 $pre 	= get_field( 'pre' );
 $post	= get_field( 'post' );
 
 if ( is_admin() ) {
	echo '<span class="' . join( ' ', $classes ) . '">';
	if ($pre) echo $pre;
	echo $num;
	if ($post) echo $post;
	echo '</span>';
	 
 }
 
 else {
	
	
	echo '<span class="' . join( ' ', $classes ) . '">';
	if ($pre) echo $pre;
	echo '<span class="counter" data-count="' . $num . '"></span>';
	if ($post) echo $post;
	echo '</span>';
 
 }