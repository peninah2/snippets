<?php
/**
 * Plugin Name: BE Media from Production
 * Plugin URI:  http://www.github.com/billerickson/be-media-from-production
 * Description: Uses local media when it's available, and uses the production server for rest.
 * Author:      Bill Erickson
 * Author URI:  http://www.billerickson.net
 * Version:     1.4.0
 * Text Domain: be-media-from-production
 * Domain Path: languages
 *
 * BE Media from Production is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * BE Media from Production is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with BE Media from Production. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    BE_Media_From_Production
 * @author     Bill Erickson
 * @since      1.0.0
 * @license    GPL-2.0+
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Class
 * @since 1.0.0
 * @package BE_Media_From_Production
 */
class BE_Media_From_Production {

	/**
	 * Production URL
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $production_url = '';

	/**
	 * Holds list of upload directories
	 * Can set manually here, or allow function below to automatically create it
	 *
	 * @since 1.0.0
	 * @var array
	 */
	public $directories = array();
	
	/**
	 * Start Month
	 * 
	 * @since 1.0.0
	 * @var int
	 */
	public $start_month = false;
	
	/**
	 * Start Year 
	 *
	 * @since 1.0.0
	 * @var int
	 */
	public $start_year = false;
	
	/**
	 * Primary constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set upload directories
		add_action( 'init',                               array( $this, 'set_upload_directories' )     );
		
		// Update Image URLs
		add_filter( 'wp_get_attachment_image_src',        array( $this, 'image_src'              )     );
		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'image_attr'             ), 99 );
		add_filter( 'wp_prepare_attachment_for_js',       array( $this, 'image_js'               ), 10, 3 );
		add_filter( 'the_content',                        array( $this, 'image_content'          )     );
		
	}
	
	/**
	 * Set upload directories
	 *
	 * @since 1.0.0
	 */
	function set_upload_directories() {
		
		if( empty( $this->directories ) )
			$this->directories = $this->get_upload_directories();
		
	}

	/**
	 * Determine Upload Directories
	 *
	 * @since 1.0.0
	 */
	function get_upload_directories() {
	
		// Include all upload directories starting from a specific month and year
		$month = str_pad( apply_filters( 'be_media_from_production_start_month', $this->start_month ), 2, 0, STR_PAD_LEFT );
		$year = apply_filters( 'be_media_from_production_start_year', $this->start_year );
	
		$upload_dirs = array();

		if( $month && $year ) {
			for( $i = 0; $year . $month <= date( 'Ym' ); $i++ ) {
				$upload_dirs[] = $year . '/' . $month;
				$month++;
				if( 13 == $month ) {
					$month = 1;
					$year++;
				}
				$month = str_pad( $month, 2, 0, STR_PAD_LEFT );
			}
		}
		
		return apply_filters( 'be_media_from_production_directories', $upload_dirs );
			
	}

	/**
	 * Modify Main Image URL
	 *
	 * @since 1.0.0
	 * @param array $image
	 * @return array $image
	 */
	function image_src( $image ) {
	
		if( isset( $image[0] ) )
			$image[0] = $this->update_image_url( $image[0] );
		return $image;
				
	}
	
	/**
	 * Modify Image Attributes
	 *
	 * @since 1.0.0
	 * @param array $attr
	 * @return array $attr
	 */
	function image_attr( $attr ) {
		
		if( isset( $attr['srcset'] ) )
			$attr['srcset'] = $this->update_image_url( $attr['srcset'] );
		return $attr;

	}
	
	/**
	 * Modify Image for Javascript
	 * Primarily used for media library
	 *
	 * @since 1.3.0
	 * @param array      $response   Array of prepared attachment data
	 * @param int|object $attachment Attachment ID or object
	 * @param array      $meta       Array of attachment metadata
	 * @return array     $response   Modified attachment data
	 */
	function image_js( $response, $attachment, $meta ) {
	
		if( isset( $response['url'] ) )
			$response['url'] = $this->update_image_url( $response['url'] );
		
		foreach( $response['sizes'] as &$size ) {
			$size['url'] = $this->update_image_url( $size['url'] );
		}	
			
		return $response;
	}

	/**
	 * Modify Images in Content
	 *
	 * @since 1.2.0
	 * @param string $content
	 * @return string $content
	 */
	function image_content( $content ) {
		$upload_locations = wp_upload_dir();

		$regex = '/https?\:\/\/[^\" ]+/i';
		preg_match_all($regex, $content, $matches);

		foreach( $matches[0] as $url ) {
			if( false !== strpos( $url, $upload_locations[ 'baseurl' ] ) ) {
				$new_url = $this->update_image_url( $url );
				$content = str_replace( $url, $new_url, $content );
			}
		}
		return $content;
	}

	/**
	 * Convert a URL to a local filename
	 *
	 * @since 1.4.0
	 * @param string $url
	 * @return string $local_filename
	 */
	function local_filename( $url ) {
		$upload_locations = wp_upload_dir();
		$local_filename = str_replace( $upload_locations[ 'baseurl' ], $upload_locations[ 'basedir' ], $url );
		return $local_filename;
	}

	/**
	 * Determine if local image exists
	 *
	 * @since 1.4.0
	 * @param string $url
	 * @return boolean
	 */
	function local_image_exists( $url ) {
		return file_exists( $this->local_filename( $url ) );
	}

	/**
	 * Update Image URL
	 *
	 * @since 1.0.0
	 * @param string $image_url
	 * @return string $image_url
	 */
	function update_image_url( $image_url ) {

		if( ! $image_url )
			return $image_url;

		if ( $this->local_image_exists( $image_url ) ) {
			return $image_url;
		}
		
		$production_url = esc_url( apply_filters( 'be_media_from_production_url', $this->production_url ) );
		if( empty( $production_url ) )
			return $image_url;
	
		$exists = false;
		$upload_dirs = $this->directories;
		if( $upload_dirs ) {		
			foreach( $upload_dirs as $option ) {
				if( strpos( $image_url, $option ) ) {
					$exists = true;
				}
			}
		}
				
		if( ! $exists ) {
			$image_url = str_replace( home_url(), $production_url, $image_url );
		}
			
		return $image_url;
	}
	
}

new BE_Media_From_Production;

function prefix_production_url( $url ) {
	return 'https://realcleardaf.com';
}
add_filter( 'be_media_from_production_url', 'prefix_production_url' );