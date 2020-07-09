<?php

// Remove related videos from o-embedded videos, from: https://wordpress.org/plugins/hide-youtube-related-videos
add_filter('oembed_result', 'hide_youtube_related_videos', 10, 3);
function hide_youtube_related_videos($data, $url, $args = array()) {

	//Autoplay
	$autoplay = strpos($url, "autoplay=1") !== false ? "&autoplay=1" : "";

	//Setup the string to inject into the url
	$str_to_add = apply_filters("hyrv_extra_querystring_parameters", "wmode=transparent&amp;") . 'rel=0';

	//Regular oembed
	if (strpos($data, "feature=oembed") !== false) {
		$data = str_replace('feature=oembed', $str_to_add . $autoplay . '&amp;feature=oembed', $data);

	//Playlist
	} elseif (strpos($data, "list=") !== false) {
		$data = str_replace('list=', $str_to_add . $autoplay . '&amp;list=', $data);
	}

	//All Set
	return $data;
}
