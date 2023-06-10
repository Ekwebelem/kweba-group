<?php
/**
 * IT Company Theme Customizer
 * @package IT Company
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function it_company_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-selector.php' );

	class IT_Company_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_attr($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}	

	//add home page setting pannel
	$wp_customize->add_panel( 'it_company_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'it-company' ),
	    'description' => __( 'Description of what this panel does.', 'it-company' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'it_company_theme_color_option', array( 
		'panel' => 'it_company_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'it-company' ) 
	) );

  	$wp_customize->add_setting( 'it_company_first_theme_color', array(
	    'default' => '#c5351f',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_first_theme_color', array(
  		'label' => 'Color Option 1',
	    'description' => __('One can change complete theme global color settings on just one click.', 'it-company'),
	    'section' => 'it_company_theme_color_option',
	    'settings' => 'it_company_first_theme_color',
  	)));

  	$wp_customize->add_setting( 'it_company_second_theme_color', array(
	    'default' => '#232c2b',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_second_theme_color', array(
  		'label' => 'Color Option 2',
	    'description' => __('One can change complete theme global color settings on just one click.', 'it-company'),
	    'section' => 'it_company_theme_color_option',
	    'settings' => 'it_company_second_theme_color',
  	)));

	// font array
	$it_company_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );

	//Typography
	$wp_customize->add_section( 'it_company_typography', array(
    	'title'      => __( 'Typography', 'it-company' ),
		'priority'   => 30,
		'panel' => 'it_company_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'it_company_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_paragraph_color', array(
		'label' => __('Paragraph Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('it_company_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_paragraph_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'Paragraph Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	$wp_customize->add_setting('it_company_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'it_company_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_atag_color', array(
		'label' => __('"a" Tag Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('it_company_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_atag_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( '"a" Tag Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'it_company_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_li_color', array(
		'label' => __('"li" Tag Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('it_company_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_li_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( '"li" Tag Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'it_company_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_h1_color', array(
		'label' => __('H1 Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('it_company_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_h1_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'H1 Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('it_company_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_h1_font_size',array(
		'label'	=> __('h1 Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'it_company_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_h2_color', array(
		'label' => __('h2 Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('it_company_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_h2_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'h2 Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('it_company_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_h2_font_size',array(
		'label'	=> __('h2 Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'it_company_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_h3_color', array(
		'label' => __('h3 Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('it_company_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_h3_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'h3 Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('it_company_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_h3_font_size',array(
		'label'	=> __('h3 Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'it_company_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_h4_color', array(
		'label' => __('h4 Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('it_company_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_h4_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'h4 Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('it_company_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_h4_font_size',array(
		'label'	=> __('h4 Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'it_company_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_h5_color', array(
		'label' => __('h5 Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('it_company_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_h5_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'h5 Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('it_company_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_h5_font_size',array(
		'label'	=> __('h5 Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'it_company_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_h6_color', array(
		'label' => __('h6 Color', 'it-company'),
		'section' => 'it_company_typography',
		'settings' => 'it_company_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('it_company_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control(
	    'it_company_h6_font_family', array(
	    'section'  => 'it_company_typography',
	    'label'    => __( 'h6 Fonts','it-company'),
	    'type'     => 'select',
	    'choices'  => $it_company_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('it_company_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_h6_font_size',array(
		'label'	=> __('h6 Font Size','it-company'),
		'section'	=> 'it_company_typography',
		'setting'	=> 'it_company_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('it_company_topbar_icon',array(
		'title'	=> __('Topbar Section','it-company'),
		'description'	=> __('Add Topbar Content here','it-company'),
		'priority'	=> null,
		'panel' => 'it_company_panel_id',
	));

	$wp_customize->add_setting('it_company_top_header',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_top_header',array(
       'type' => 'checkbox',
       'label' => __('Enable Top Header','it-company'),
       'section' => 'it_company_topbar_icon'
    ));

    $wp_customize->add_setting('it_company_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('it_company_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','it-company'),
		'section'=> 'it_company_topbar_icon',
		'active_callback' => 'it_company_topbar_enabled'
	));

    $wp_customize->add_setting('it_company_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_top_topbar_padding',array(
		'description'	=> __('Top','it-company'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'it_company_topbar_icon',
		'type'=> 'number',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_bottom_topbar_padding',array(
		'description'	=> __('Bottom','it-company'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'it_company_topbar_icon',
		'type'=> 'number',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_question',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_question',array(
		'label'	=> __('Add Text','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_question',
		'type'		=> 'text',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_email_icon',array(
		'label'	=> __('Email Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_topbar_icon',
		'type'		=> 'icon',
		'active_callback' => 'it_company_topbar_enabled'
	)));

	$wp_customize->add_setting('it_company_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_email',array(
		'label'	=> __('Add Email Address','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_email',
		'type'		=> 'text',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_phone_icon',array(
		'default'	=> 'fa fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_phone_icon',array(
		'label'	=> __('Phone Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_topbar_icon',
		'type'		=> 'icon',
		'active_callback' => 'it_company_topbar_enabled'
	)));

	$wp_customize->add_setting('it_company_call_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_call_number',array(
		'label'	=> __('Add Contact Number','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_call_number',
		'type'		=> 'text',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_facebook_icon',array(
		'label'	=> __('Facebook Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_topbar_icon',
		'type'		=> 'icon',
		'active_callback' => 'it_company_topbar_enabled'
	)));

	$wp_customize->add_setting('it_company_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_facebook',array(
		'label'	=> __('Add Facebook link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_facebook',
		'type'		=> 'url',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_twitter_icon',array(
		'label'	=> __('Twitter Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_topbar_icon',
		'type'		=> 'icon',
		'active_callback' => 'it_company_topbar_enabled'
	)));

	$wp_customize->add_setting('it_company_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_twitter',array(
		'label'	=> __('Add Twitter link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_twitter',
		'type'	=> 'url',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_youtube_icon',array(
		'label'	=> __('Youtube Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_topbar_icon',
		'type'		=> 'icon',
		'active_callback' => 'it_company_topbar_enabled'
	)));

	$wp_customize->add_setting('it_company_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_youtube',array(
		'label'	=> __('Add Youtube link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_youtube',
		'type'	=> 'url',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_setting('it_company_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_linkedin_icon',array(
		'label'	=> __('Linkedin Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_topbar_icon',
		'type'		=> 'icon',
		'active_callback' => 'it_company_topbar_enabled'
	)));

	$wp_customize->add_setting('it_company_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('it_company_linkedin',array(
		'label'	=> __('Add Linkedin link','it-company'),
		'section'	=> 'it_company_topbar_icon',
		'setting'	=> 'it_company_linkedin',
		'type'	=> 'url',
		'active_callback' => 'it_company_topbar_enabled'
	));

	$wp_customize->add_section( 'it_company_header_section' , array(
    	'title'      => __( 'Header', 'it-company' ),
		'description'	=> __('Add Header Content here','it-company'),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

    $wp_customize->add_setting('it_company_sticky_header',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Stick header on Desktop','it-company'),
       'section' => 'it_company_header_section'
    ));

    $wp_customize->add_setting('it_company_show_search',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_show_search',array(
       'type' => 'checkbox',
       'label' => __('Show/Hide Search','it-company'),
       'section' => 'it_company_header_section'
    ));

	$wp_customize->add_setting('it_company_header_layout',array(
        'default' => __('Default Header','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_header_layout',array(
        'type' => 'select',
        'label' => __('Header Layout','it-company'),
        'section' => 'it_company_header_section',
        'choices' => array(
            'Default Header' => __('Default Header','it-company'),
            'Logo above Menu' => __('Logo above Menu','it-company'),
        ),
	) );

	$wp_customize->add_setting('it_company_logo_alignment',array(
        'default' => __('Center','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_logo_alignment',array(
        'type' => 'radio',
        'label' => __('Logo Alignment','it-company'),
        'section' => 'it_company_header_section',
        'choices' => array(
            'Left' => __('Left','it-company'),
            'Center' => __('Center','it-company'),
            'Right' => __('Right','it-company'),
        ),
		'active_callback' => 'it_company_logo_enabled'
	) );

	$wp_customize->add_setting('it_company_menu_alignment',array(
        'default' => __('Center','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_menu_alignment',array(
        'type' => 'radio',
        'label' => __('Navigation Alignment','it-company'),
        'section' => 'it_company_header_section',
        'choices' => array(
            'Left' => __('Left','it-company'),
            'Center' => __('Center','it-company'),
            'Right' => __('Right','it-company'),
        ),
		'active_callback' => 'it_company_menu_alignment_enable'
	) );

	$wp_customize->add_setting('it_company_menu_case',array(
        'default' => 'uppercase',
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_menu_case',array(
        'type' => 'select',
        'label' => __('Menu Case','it-company'),
        'section' => 'it_company_header_section',
        'choices' => array(
            'uppercase' => __('Uppercase','it-company'),
            'capitalize' => __('Capitalize','it-company'),
        ),
	) );

	$wp_customize->add_setting( 'it_company_menu_font_size', array(
		'default'=> '13',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new IT_Company_WP_Customize_Range_Control( $wp_customize, 'it_company_menu_font_size', array(
        'label'  => __('Menu Font Size','it-company'),
        'section'  => 'it_company_header_section',
        'description' => __('Measurement is in pixel.','it-company'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//home page slider
	$wp_customize->add_section( 'it_company_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'it-company' ),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

	$wp_customize->add_setting('it_company_slider_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','it-company'),
       'section' => 'it_company_slider_section',
    ));

    $wp_customize->add_setting('it_company_slider_display_option',array(
    	'default' => 'frontpage',
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_slider_display_option',array(
        'type' => 'radio',
        'label' => __('Slider Display Option','it-company'),
        'section' => 'it_company_slider_section',
        'choices' => array(
            'frontpage' => __('Show slider in frontpage only','it-company'),
            'blog' => __('Show slider in blog page only','it-company'),
            'both' => __('Show slider in both','it-company'),
        ),
		'active_callback' => 'it_company_slider_enabled'
	) );

	$wp_customize->add_setting('it_company_slider_indicator',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_slider_indicator',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Indicators','it-company'),
      	'section' => 'it_company_slider_section',
		'active_callback' => 'it_company_slider_enabled'
	));

	$wp_customize->add_setting('it_company_slider_title',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_slider_title',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Title','it-company'),
      	'section' => 'it_company_slider_section',
		'active_callback' => 'it_company_slider_enabled'
	));

	$wp_customize->add_setting('it_company_slider_content',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_slider_content',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Content','it-company'),
      	'section' => 'it_company_slider_section',
		'active_callback' => 'it_company_slider_enabled'
	));

	$wp_customize->add_setting('it_company_slider_button',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_slider_button',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Button','it-company'),
      	'section' => 'it_company_slider_section',
		'active_callback' => 'it_company_slider_enabled'
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'it_company_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'it_company_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'it_company_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'it-company' ),
			'section'  => 'it_company_slider_section',
			'type'     => 'dropdown-pages',
			'active_callback' => 'it_company_slider_enabled'
		) );
	}

	$wp_customize->add_setting( 'it_company_slider_speed', array(
		'default'              => 3000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_speed', array(
		'label'       => esc_html__( 'Slider Speed','it-company' ),
		'section'     => 'it_company_slider_section',
		'type'        => 'number',
		'settings'    => 'it_company_slider_speed',
		'input_attrs' => array(
			'step'             => 500,
			'min'              => 500,
			'max'              => 5000,
		),
		'active_callback' => 'it_company_slider_enabled'
	) );

	//content Alignment
    $wp_customize->add_setting('it_company_slider_alignment_option',array(
    'default' => __('Center Align','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_slider_alignment_option',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','it-company'),
        'section' => 'it_company_slider_section',
        'choices' => array(
            'Center Align' => __('Center Align','it-company'),
            'Left Align' => __('Left Align','it-company'),
            'Right Align' => __('Right Align','it-company'),
        ),
		'active_callback' => 'it_company_slider_enabled'
	) );

	$wp_customize->add_setting('it_company_content_position',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('it_company_content_position',array(
		'label'	=> esc_html__('Slider Content Position','it-company'),
		'section'=> 'it_company_slider_section',
	));

	$wp_customize->add_setting( 'it_company_slider_top_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_top_position', array(
		'label' => esc_html__( 'Top','it-company' ),
		'section' => 'it_company_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'it_company_slider_bottom_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_bottom_position', array(
		'label' => esc_html__( 'Bottom','it-company' ),
		'section' => 'it_company_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'it_company_slider_left_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_left_position', array(
		'label' => esc_html__( 'Left','it-company'),
		'section' => 'it_company_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'it_company_slider_right_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_right_position', array(
		'label' => esc_html__('Right','it-company'),
		'section' => 'it_company_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    //Slider excerpt
	$wp_customize->add_setting( 'it_company_slider_excerpt_number', array(
		'default'              => 25,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','it-company' ),
		'section'     => 'it_company_slider_section',
		'type'        => 'number',
		'settings'    => 'it_company_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'it_company_slider_enabled'
	) );

	//Opacity
	$wp_customize->add_setting('it_company_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control( 'it_company_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','it-company' ),
		'section'     => 'it_company_slider_section',
		'type'        => 'select',
		'settings'    => 'it_company_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','it-company'),
	      '0.1' =>  esc_attr('0.1','it-company'),
	      '0.2' =>  esc_attr('0.2','it-company'),
	      '0.3' =>  esc_attr('0.3','it-company'),
	      '0.4' =>  esc_attr('0.4','it-company'),
	      '0.5' =>  esc_attr('0.5','it-company'),
	      '0.6' =>  esc_attr('0.6','it-company'),
	      '0.7' =>  esc_attr('0.7','it-company'),
	      '0.8' =>  esc_attr('0.8','it-company'),
	      '0.9' =>  esc_attr('0.9','it-company')
		),
		'active_callback' => 'it_company_slider_enabled'
	));

	$wp_customize->add_setting( 'it_company_slider_button_label', array(
		'default' => __('DETAILS','it-company' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','it-company' ),
		'section'     => 'it_company_slider_section',
		'type'        => 'text',
		'settings'    => 'it_company_slider_button_label',
		'active_callback' => 'it_company_slider_enabled'
	) );

	//About Us Section
	$wp_customize->add_section('it_company_about',array(
		'title'	=> __('About Us','it-company'),
		'description'	=> __('Add About Us sections below.','it-company'),
		'panel' => 'it_company_panel_id',
	));

	$wp_customize->add_setting('it_company_page_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_page_title',array(
		'label'	=> __('Section Title','it-company'),
		'section'	=> 'it_company_about',
		'type'		=> 'text'
	));

	// category left
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting( 'it_company_category', array(
      'default'           => '',
      'sanitize_callback' => 'it_company_sanitize_choices'
    ));
    $wp_customize->add_control('it_company_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','it-company'),
		'section' => 'it_company_about',
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
 	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('it_company_about_setting',array(
		'sanitize_callback' => 'it_company_sanitize_choices',
	));

	$wp_customize->add_control('it_company_about_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','it-company'),
		'section' => 'it_company_about',
	));

	// category right
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post1[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting( 'it_company_category1', array(
      'default'           => '',
      'sanitize_callback' => 'it_company_sanitize_choices'
    ));
    $wp_customize->add_control('it_company_category1',array(
		'type'    => 'select',
		'choices' => $cat_post1,
		'label' => __('Select Category to display Latest Post','it-company'),
		'section' => 'it_company_about',
	));

	//Blog setting
	$wp_customize->add_section( 'it_company_theme_layout', array(
    	'title'      => __( 'Blog Settings', 'it-company' ),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('it_company_layout',array(
        'default' => __( 'Right Sidebar', 'it-company' ),
        'sanitize_callback' => 'it_company_sanitize_choices'    
    ));
	$wp_customize->add_control('it_company_layout', array(
        'type' => 'select',
        'label' => __( 'Blog Layout', 'it-company' ),
        'section' => 'it_company_theme_layout',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company'),
            'Right Sidebar' => __('Right Sidebar','it-company'),
            'One Column' => __('One Column','it-company'),
            'Three Columns' => __('Three Columns','it-company'),
            'Four Columns' => __('Four Columns','it-company'),
            'Grid Layout' => __('Grid Layout','it-company')
        ),
    ));

    $wp_customize->add_setting('it_company_blog_post_alignment',array(
	        'default' => 'left',
	        'sanitize_callback' => 'it_company_sanitize_choices'
	    )
    );
	$wp_customize->add_control('it_company_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'it-company' ),
        'section' => 'it_company_theme_layout',
        'choices' => array(
            'left' => __('Left Align','it-company'),
            'right' => __('Right Align','it-company'),
            'center' => __('Center Align','it-company')
        ),
    ));

    $wp_customize->add_setting('it_company_metafields_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','it-company'),
       'section' => 'it_company_theme_layout'
    ));

    $wp_customize->add_setting('it_company_metafields_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','it-company'),
       'section' => 'it_company_theme_layout'
    ));

    $wp_customize->add_setting('it_company_metafields_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','it-company'),
       'section' => 'it_company_theme_layout'
    ));

    $wp_customize->add_setting('it_company_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','it-company'),
       'section' => 'it_company_theme_layout'
    ));

    $wp_customize->add_setting('it_company_blog_post_content',array(
    	'default' => __('Excerpt Content','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_blog_post_content',array(
        'type' => 'radio',
        'label' => __('Blog Post Content Type','it-company'),
        'section' => 'it_company_theme_layout',
        'choices' => array(
            'No Content' => __('No Content','it-company'),
            'Full Content' => __('Full Content','it-company'),
            'Excerpt Content' => __('Excerpt Content','it-company'),
        ),
	) );

    $wp_customize->add_setting( 'it_company_post_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Excerpt Number (Max 50)','it-company' ),
		'section'     => 'it_company_theme_layout',
		'type'        => 'number',
		'settings'    => 'it_company_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'it_company_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'it_company_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','it-company' ),
		'section'     => 'it_company_theme_layout',
		'type'        => 'text',
		'settings'    => 'it_company_button_excerpt_suffix',
		'active_callback' => 'it_company_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'it_company_pagination_type', array(
        'default'			=> 'page-numbers',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'it_company_pagination_type', array(
        'section' => 'it_company_theme_layout',
        'type' => 'select',
        'label' => __( 'Blog Pagination Style', 'it-company' ),
        'choices'		=> array(
            'page-numbers'  => __( 'Number', 'it-company' ),
            'next-prev' => __( 'Next/Prev', 'it-company' ),
    )));


    $wp_customize->add_setting( 'it_company_single_post_prev_nav_text', array(
		'default' => __('Previous','it-company' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','it-company' ),
		'section'     => 'it_company_theme_layout',
		'type'        => 'text',
		'settings'    => 'it_company_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'it_company_single_post_next_nav_text', array(
		'default' => __('Next','it-company' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','it-company' ),
		'section'     => 'it_company_theme_layout',
		'type'        => 'text',
		'settings'    => 'it_company_single_post_next_nav_text'
	) );

    $wp_customize->add_setting('it_company_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Posts','it-company'),
       'section' => 'it_company_theme_layout'
    ));

    $wp_customize->add_setting('it_company_related_posts_title',array(
       'default' => __('You May Also Like','it-company'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','it-company'),
       'section' => 'it_company_theme_layout'
    ));

    $wp_customize->add_setting( 'it_company_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','it-company' ),
		'section' => 'it_company_theme_layout',
		'type' => 'number',
		'settings' => 'it_company_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'it_company_post_shown_by', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'it_company_post_shown_by', array(
        'section' => 'it_company_theme_layout',
        'type' => 'radio',
        'label' => __( 'Related Posts must be shown:', 'it-company' ),
        'choices'		=> array(
            'categories'  => __('By Categories', 'it-company'),
            'tags' => __( 'By Tags', 'it-company' ),
    )));

	// Button option
	$wp_customize->add_section( 'it_company_button_options', array(
		'title' =>  __( 'Button Options', 'it-company' ),
		'panel' => 'it_company_panel_id',
	));

    $wp_customize->add_setting( 'it_company_button_text', array(
		'default'   => 'Read Full',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'it_company_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','it-company' ),
		'section'     => 'it_company_button_options',
		'type'        => 'text',
		'settings'    => 'it_company_button_text'
	) );

	$wp_customize->add_setting('it_company_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_top_button_padding',array(
		'label'	=> __('Top','it-company'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'it_company_button_options',
		'type'=> 'number',
		'active_callback' => 'it_company_button_enabled'
	));

	$wp_customize->add_setting('it_company_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_bottom_button_padding',array(
		'label'	=> __('Bottom','it-company'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'it_company_button_options',
		'type'=> 'number',
		'active_callback' => 'it_company_button_enabled'
	));

	$wp_customize->add_setting('it_company_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_left_button_padding',array(
		'label'	=> __('Left','it-company'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'it_company_button_options',
		'type'=> 'number',
		'active_callback' => 'it_company_button_enabled'
	));

	$wp_customize->add_setting('it_company_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_right_button_padding',array(
		'label'	=> __('Right','it-company'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'it_company_button_options',
		'type'=> 'number',
		'active_callback' => 'it_company_button_enabled'
	));

	$wp_customize->add_setting( 'it_company_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new IT_Company_WP_Customize_Range_Control( $wp_customize, 'it_company_button_border_radius', array(
            'label'  => __('Border Radius','it-company'),
            'section'  => 'it_company_button_options',
            'description' => __('Measurement is in pixel.','it-company'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 50,
            ),
			'active_callback' => 'it_company_button_enabled'
    )));

	//Sidebar setting
	$wp_customize->add_section( 'it_company_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'it-company' ),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

	$wp_customize->add_setting('it_company_single_page_layout',array(
        'default' => __( 'One Column', 'it-company' ),
        'sanitize_callback' => 'it_company_sanitize_choices'
    ));
	$wp_customize->add_control('it_company_single_page_layout', array(
        'type' => 'select',
        'label' => __( 'Single Page Layout', 'it-company' ),
        'section' => 'it_company_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company'),
            'Right Sidebar' => __('Right Sidebar','it-company'),
            'One Column' => __('One Column','it-company')
        ),
    ));

    $wp_customize->add_setting('it_company_single_post_layout',array(
        'default' => __( 'Right Sidebar', 'it-company' ),
        'sanitize_callback' => 'it_company_sanitize_choices'
    ));
	$wp_customize->add_control('it_company_single_post_layout', array(
        'type' => 'select',
        'label' => __( 'Single Post Layout', 'it-company' ),
        'section' => 'it_company_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company'),
            'Right Sidebar' => __('Right Sidebar','it-company'),
            'One Column' => __('One Column','it-company')
        ),
    ));

	//Advance Options
	$wp_customize->add_section( 'it_company_advance_options', array(
    	'title' => __( 'Advance Options', 'it-company' ),
		'priority'   => null,
		'panel' => 'it_company_panel_id'
	) );

	$wp_customize->add_setting('it_company_preloader',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','it-company'),
       'section' => 'it_company_advance_options'
    ));

    $wp_customize->add_setting( 'it_company_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_preloader_color', array(
  		'label' => __('Preloader Color', 'it-company'),
	    'section' => 'it_company_advance_options',
	    'settings' => 'it_company_preloader_color',
		'active_callback' => 'it_company_preloader_enabled'
  	)));

  	$wp_customize->add_setting( 'it_company_preloader_bg_color', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'it_company_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'it-company'),
	    'section' => 'it_company_advance_options',
	    'settings' => 'it_company_preloader_bg_color',
		'active_callback' => 'it_company_preloader_enabled'
  	)));

  	$wp_customize->add_setting('it_company_preloader_type',array(
        'default' => __('Square','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Type','it-company'),
        'section' => 'it_company_advance_options',
        'choices' => array(
            'Square' => __('Square','it-company'),
            'Circle' => __('Circle','it-company'),
        ),
		'active_callback' => 'it_company_preloader_enabled'
	) );

	$wp_customize->add_setting('it_company_theme_layout_options',array(
        'default' => __('Default Theme','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_theme_layout_options',array(
        'type' => 'radio',
        'label' => __('Theme Layout','it-company'),
        'section' => 'it_company_advance_options',
        'choices' => array(
            'Default Theme' => __('Default Theme','it-company'),
            'Container Theme' => __('Container Theme','it-company'),
            'Box Container Theme' => __('Box Container Theme','it-company'),
        ),
	) );

    //404 Page Option
	$wp_customize->add_section('it_company_404_settings',array(
		'title'	=> __('404 Settings','it-company'),
		'priority'	=> null,
		'panel' => 'it_company_panel_id',
	));

	$wp_customize->add_setting('it_company_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_404_title',array(
		'label'	=> __('404 Title','it-company'),
		'section'	=> 'it_company_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('it_company_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_404_button_label',array(
		'label'	=> __('404 button Label','it-company'),
		'section'	=> 'it_company_404_settings',
		'type'		=> 'text'
	));	

	//Responsive Settings
	$wp_customize->add_section('it_company_responsive_options',array(
		'title'	=> __('Responsive Options','it-company'),
		'panel' => 'it_company_panel_id'
	));

	$wp_customize->add_setting('it_company_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_menu_open_icon',array(
		'label'	=> __('Menu Open Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_responsive_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('it_company_menu_close_icon',array(
		'default'	=> 'fas fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Icon_Selector(
        $wp_customize,'it_company_menu_close_icon',array(
		'label'	=> __('Menu Close Icon','it-company'),
		'transport' => 'refresh',
		'section'	=> 'it_company_responsive_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('it_company_hide_topbar_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_hide_topbar_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Top Header','it-company'),
      	'section' => 'it_company_responsive_options',
	));

	$wp_customize->add_setting('it_company_sticky_header_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_sticky_header_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Sticky Header','it-company'),
      	'section' => 'it_company_responsive_options',
	));

	$wp_customize->add_setting('it_company_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Slider','it-company'),
      	'section' => 'it_company_responsive_options',
	));

	$wp_customize->add_setting('it_company_search_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_search_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Search','it-company'),
      	'section' => 'it_company_responsive_options',
	));

	//Woocommerce Options
	$wp_customize->add_section('it_company_woocommerce',array(
		'title'	=> __('WooCommerce Options','it-company'),
		'panel' => 'it_company_panel_id',
	));

	$wp_customize->add_setting('it_company_shop_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Sidebar','it-company'),
       'section' => 'it_company_woocommerce'
    ));

    $wp_customize->add_setting('it_company_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Single Product Page Sidebar','it-company'),
       'section' => 'it_company_woocommerce'
    ));

    $wp_customize->add_setting('it_company_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_products_per_page',array(
		'label'	=> __('Products Per Page','it-company'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'it_company_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('it_company_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_products_per_row',array(
		'label'	=> __('Products Per Row','it-company'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'it_company_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('it_company_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_product_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide product border','it-company'),
       'section' => 'it_company_woocommerce',
    ));

    $wp_customize->add_setting('it_company_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('it_company_product_padding',array(
		'label'	=> esc_html__('Product Padding','it-company'),
		'section'=> 'it_company_woocommerce',
	));

	$wp_customize->add_setting( 'it_company_product_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_top_padding', array(
		'label' => esc_html__( 'Top','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_left_padding', array(
		'label' => esc_html__( 'Left','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'it_company_product_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_right_padding', array(
		'label' => esc_html__( 'Right','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'it_company_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new IT_Company_WP_Customize_Range_Control( $wp_customize, 'it_company_product_border_radius', array(
        'label'  => __('Product Border Radius','it-company'),
        'section'  => 'it_company_woocommerce',
        'description' => __('Measurement is in pixel.','it-company'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting('it_company_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('it_company_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','it-company'),
		'section'=> 'it_company_woocommerce',
	));

	$wp_customize->add_setting( 'it_company_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_button_top_padding', array(
		'label' => esc_html__( 'Top','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_button_left_padding',array(
		'default' => 15,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_button_left_padding', array(
		'label' => esc_html__( 'Left','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'it_company_product_button_right_padding',array(
		'default' => 15,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_button_right_padding', array(
		'label' => esc_html__( 'Right','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'it_company_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new IT_Company_WP_Customize_Range_Control( $wp_customize, 'it_company_product_button_border_radius', array(
        'label'  => __('Product Button Border Radius','it-company'),
        'section'  => 'it_company_woocommerce',
        'description' => __('Measurement is in pixel.','it-company'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('it_company_product_sale_position',array(
        'default' => __('Right','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','it-company'),
        'section' => 'it_company_woocommerce',
        'choices' => array(
            'Left' => __('Left','it-company'),
            'Right' => __('Right','it-company'),
        ),
	) );

    $wp_customize->add_setting('it_company_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('it_company_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','it-company'),
		'section'=> 'it_company_woocommerce',
	));

	$wp_customize->add_setting( 'it_company_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('it_company_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','it-company' ),
		'type' => 'number',
		'section' => 'it_company_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'it_company_product_sale_border_radius',array(
		'default' => '50',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new IT_Company_WP_Customize_Range_Control( $wp_customize, 'it_company_product_sale_border_radius', array(
        'label'  => __('Product Sale Border Radius','it-company'),
        'section'  => 'it_company_woocommerce',
        'description' => __('Measurement is in pixel.','it-company'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//footer text
	$wp_customize->add_section('it_company_footer_section',array(
		'title'	=> __('Footer Section','it-company'),
		'panel' => 'it_company_panel_id'
	));

	$wp_customize->add_setting('it_company_hide_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_hide_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back To Top','it-company'),
      	'section' => 'it_company_footer_section',
	));

	$wp_customize->add_setting('it_company_back_to_top',array(
        'default' => __('Right','it-company'),
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_back_to_top',array(
        'type' => 'radio',
        'label' => __('Back to Top Alignment','it-company'),
        'section' => 'it_company_footer_section',
        'choices' => array(
            'Left' => __('Left','it-company'),
            'Right' => __('Right','it-company'),
            'Center' => __('Center','it-company'),
        ),
		'active_callback' => 'it_company_back_to_top_enabled'
	) );

	$wp_customize->add_setting('it_company_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'it_company_sanitize_choices',
    ));
    $wp_customize->add_control('it_company_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer columns', 'it-company'),
        'section'     => 'it_company_footer_section',
        'description' => __('Select the number of footer columns and add your widgets in the footer.', 'it-company'),
        'choices' => array(
            '1'     => __('One column', 'it-company'),
            '2'     => __('Two columns', 'it-company'),
            '3'     => __('Three columns', 'it-company'),
            '4'     => __('Four columns', 'it-company')
        ),
    )); 

    $wp_customize->add_setting('it_company_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('it_company_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','it-company'),
		'section'=> 'it_company_footer_section',
	));

    $wp_customize->add_setting('it_company_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_top_copyright_padding',array(
		'description'	=> __('Top','it-company'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'it_company_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('it_company_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_bottom_copyright_padding',array(
		'description'	=> __('Bottom','it-company'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'it_company_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('it_company_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'it_company_sanitize_choices'
	));
	$wp_customize->add_control('it_company_copyright_alignment',array(
        'type' => 'radio',
        'label' => __('Copyright Alignment','it-company'),
        'section' => 'it_company_footer_section',
        'choices' => array(
            'left' => __('Left','it-company'),
            'right' => __('Right','it-company'),
            'center' => __('Center','it-company'),
        ),
	) );

	$wp_customize->add_setting( 'it_company_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new IT_Company_WP_Customize_Range_Control( $wp_customize, 'it_company_copyright_font_size', array(
        'label'  => __('Copyright Font Size','it-company'),
        'section'  => 'it_company_footer_section',
        'description' => __('Measurement is in pixel.','it-company'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));
	
	$wp_customize->add_setting('it_company_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_text',array(
		'label'	=> __('Copyright Text','it-company'),
		'description'	=> __('Add some text for footer like copyright etc.','it-company'),
		'section'	=> 'it_company_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'it_company_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class IT_Company_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'IT_Company_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new IT_Company_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 9,
			'title'    => esc_html__( 'IT Company Pro', 'it-company' ),
			'pro_text' => esc_html__( 'Go Pro', 'it-company' ),
			'pro_url'  => esc_url('https://www.themesglance.com/themes/it-company-wordpress-theme/')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'it-company-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'it-company-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
IT_Company_Customize::get_instance();