<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

function ndd_archive_title( $title ) {
	if ( is_post_type_archive( array( 'instructors') ) ) {
		$title = 'Meet the Team';
	} if  ( is_post_type_archive( array( 'classes') ) ) {
		$title = 'Our Packages';
	}
	elseif ( is_tax( 'class-type' ) ) {
		$title = single_term_title( '', false );
	}
	return $title;
}
	add_filter( 'get_the_archive_title', 'ndd_archive_title' );


// add custom logo and url to login page
function nnd_the_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'nnd_the_url' );
/**
*   adds a logo to the admin login page and changes the link to the website root
*/
function nnd_login_logo() {
     echo '<style type="text/css">
         h1 a { background-image:url('.get_template_directory_uri().'/images/night-day-dance-logo.jpg) !important;
				 background-size:contain !important;
			   width:100% !important;}
     </style>';
}
add_action('login_head', 'nnd_login_logo');


?>
