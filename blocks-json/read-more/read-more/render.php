<?php 

$initial_content = get_field( 'initial_content' );
$hidden_content = get_field( 'hidden_content' );

if ( is_admin() ) {
	echo $initial_content;
	echo '<a href="#">Read more</a>';
}

else {
	echo $initial_content;
	echo '<a class="read-more-show" href="#">Read more</a>';
	echo '<span class=" read-more-content hide">';
	echo $hidden_content;
	echo '<a class="read-more-hide" href="#">Read Less</a>';
	echo '</span>';

}