<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );


function add_sistaraden_scripts() {

  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(), '1.1', 'all');
 
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom_script.js', array ( 'jquery' ), 1.1, true);
 
}
add_action( 'wp_enqueue_scripts', 'add_sistaraden_scripts' );

// Essential Grid Shortcodes


function esgrid_meta_func( $atts ) {

	$atts = shortcode_atts( array(
		'id' => ''
	), $atts, 'esgrid_meta' );

	$author_id = get_post_field( 'post_author',$atts['id'] );
	$author_name = get_the_author_meta('user_nicename', $author_id);

	$date = get_the_date( 'F j Y',  $atts['id']);
	$post_tags = get_the_tags($atts['id']);

	

	$separator = ', ';
	$post_tags_output = "";

	if ( $post_tags ) {
	    foreach( $post_tags as $tag ) {
	    		$tag_output[] = '<a href="'. get_tag_link($tag->term_id) . '">#'. $tag->name . '</a>'; 
	    }


	   //echo '<pre>'.print_r($tag_output, true).'</pre>';
	    $post_tags_output = implode($separator, $tag_output);
	}

	$output = "<div class='esgrid-wrapper'>";
	$output .= '<p class="esgrid-meta-text">'.$author_name.' - '.$date.'</p>';
	$output .= '<p class="esgrid-tag-text">'.$post_tags_output.'<p>'; 
	$output .= "</div>";

	return $output;

}

add_shortcode( 'esgrid_meta', 'esgrid_meta_func' );