<?php
/**
 * @package IT Company
 * @subpackage it-company
 * Setup the WordPress core custom header feature.
 *
 * @uses it_company_header_style()
*/

function it_company_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'it_company_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'it_company_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'it_company_custom_header_setup' );

if ( ! function_exists( 'it_company_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see it_company_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'it_company_header_style' );
function it_company_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$it_company_custom_css = "
        .header-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'it-company-basic-style', $it_company_custom_css );
	endif;
}
endif; // it_company_header_style