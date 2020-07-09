wp_enqueue_style(
	'theme-styles',
	get_stylesheet_directory_uri() . '/style.css',
	array(),
	filemtime( get_stylesheet_directory() . '/style.css' )
);