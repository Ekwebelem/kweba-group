<?php
//about theme info
add_action( 'admin_menu', 'it_company_gettingstarted' );
function it_company_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'it-company'), esc_html__('Get Started', 'it-company'), 'edit_theme_options', 'it_company_guide', 'it_company_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function it_company_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'it_company_admin_theme_style');

//guidline for about theme
function it_company_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'it-company' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to IT Company WordPress Theme', 'it-company' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
			<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'it-company' ); ?></p>
			<div class="blink">
				<h4><?php esc_html_e( 'Theme Created By Themesglance', 'it-company' ); ?></h4>
			</div>
			<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'it-company' ); ?> <span><?php esc_html_e( '20% off', 'it-company' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'it-company' ); ?> <span><?php esc_html_e( '" Get20 "', 'it-company' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'it-company' ); ?></h3>
			<p><?php esc_html_e( 'IT Company is a modern, stylish, feature-rich and robust WordPress theme for information technology companies, IT start-ups, corporates, digital agencies, techno-savvy firms, IT and business endeavours, technical businesses and similar websites. Its developers have designed the theme to present all your products and services with absolute precision without compromising on the professional look of the website. It is a retina ready theme with absolute stunning look on varying screen sizes and browsers with its responsive layout and cross-browser compatibility. With sliders and banners, the website looks impressive. The theme is readily translatable into different languages. It is secured with clean and bug-free Bootstrap based coding. It is optimized for search engines to get good traffic influx. IT Company theme is extremely lightweight loading with a lightning fast speed. It is deeply customizable to give the website any look through theme customizer which offers customization options right at your fingertips. Give an easy publicity to your website by using social media icons. This theme offers integration of different media like image, videos, audios, links etc.', 'it-company')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'it-company' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'IT Company', 'it-company' ); ?> <a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'it-company' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with IT Company Theme', 'it-company' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/free-screenshot.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'it-company' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'it-company' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'it-company' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'it-company' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'it-company' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'it-company'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'it-company'); ?></a>
			<a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'it-company'); ?></a>
			<a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'it-company'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'it-company'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Slider with unlimited slides', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "testimonial" listing', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Projects" listing', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'About Us Section', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Team" listing', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Pricing Plans', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Section to specify how we work', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Latest News Section', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Partner/Sponser listing', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Social Icon widget', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Blog Post section on home', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Newsletter with contact form 7', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Single page design for all custom posttype', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Record Section', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Shortcodes for all the custom posttype listing', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Contact widget for footer', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Contact page Template', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Recent Post Widget with thumbnails', 'it-company'); ?></li>
		 	<li><?php esc_html_e( 'Blog full width, With Left and Right sidebar Template', 'it-company'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'it-company'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'it-company'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'it-company'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'it-company'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'it-company'); ?></a> <?php esc_html_e('your website.', 'it-company'); ?></li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'it-company'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'it-company'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'it-company' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'IT Company Lite', 'it-company' ); ?> <a href="<?php echo esc_url( IT_COMPANY_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'it-company' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>