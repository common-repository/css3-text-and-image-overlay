<?php
	/*
	Plugin Name: CSS3 Image & Text Overlay
	Plugin URI: http://gfxcomplex.com/qr-barcode
	Description: CSS3 Text and Image Overlay aims to make a simple and easy way to add a rollover effect to images with use of shortcodes. Added use for title and alt
	Author: Joshua Randall Chernoff | GFX Complex
	Version: 1.2
	Author URI: http://gfxcomplex.com
	Thanks To: Roger Cyr and Keliah of http://codecanyon.net. 
	*/

	add_shortcode('overlay', 'writeOverLay');  	
	add_action( 'wp_head', 'suptic_head' );

	function suptic_head() {
		$stylesheet_url = get_bloginfo('wpurl').'/wp-content/plugins/'.basename(dirname(__FILE__)).'/css/overlay_styles.css';	
		if ( SUPTIC_LOAD_CSS )
			echo '<link rel="stylesheet" href="' . $stylesheet_url . '" type="text/css" />';
	}
	
	function writeOverLay($atts, $content) {  
		extract(shortcode_atts(array("image" => '', "alt" => '', "title" => ''), $atts));  
			
		$output;		
		$output .= '<div style="overflow:auto" >';
		$output .= '<div class="full_overlay">';
        $output .= '<div class="overlay_content">';
		$output .= $content;
        $output .= '</div>';
        $output .= '<img style="display: block;" src="'. $image. '" alt="'. htmlspecialchars($alt).'" title="'.htmlspecialchars($title).'">';      
    	$output .= '</div>';
		$output .= '</div>';
		
		return  $output;
	}
	
?>