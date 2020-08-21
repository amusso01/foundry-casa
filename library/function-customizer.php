<?php 
/**
 *
 * @author Andrea Musso
 * 
 *
 * @package foundry
 */



//  TODO CONSIDER REPLACE ALL THE FILE AND USE KIRKI FRAMEWORK PLUGIN https://kirki.org

	// ========== VARIABLES ==========//


	// FONT-SIZE
	$fontsize[] = array(
		'slug'=>'text-h1', 
		'default' => 36,
		'label' => 'Font size h1'
	);
	$fontsize[] = array(
		'slug'=>'text-h2', 
		'default' => 28,
		'label' => 'Font size h2'
	);
	$fontsize[] = array(
		'slug'=>'text-h3', 
		'default' => 21,
		'label' => 'Font size h3'
	);
	$fontsize[] = array(
		'slug'=>'text-h4', 
		'default' => 13,
		'label' => 'Font size h4'
	);
	$fontsize[] = array(
		'slug'=>'text-h5', 
		'default' => 18,
		'label' => 'Font size h5'
	);
	$fontsize[] = array(
		'slug'=>'text-h6', 
		'default' => 16,
		'label' => 'Font size h6'
	);
	$fontsize[] = array(
		'slug'=>'text-p', 
		'default' => 16,
		'label' => 'Font size p'
	);

	// SITE SETTING
	// social
	$social[] = array(
		'slug'=>'instagram', 
		'default' => '',
		'label' => 'Instagram URL'
	);

	$social[] = array(
		'slug'=>'facebook', 
		'default' => '',
		'label' => 'Facebook URL'
	);
	
	$social[] = array(
		'slug'=>'linkedin', 
		'default' => '',
		'label' => 'Linkedin URL'
	);


function foundry_customize_register( $wp_customize ) {


	global $fontsize;
	global $social;
	


	// FONT SIZE
	foreach( $fontsize as $size ) {
		// font  setting
		$wp_customize->add_setting(
			$size['slug'], array(
				'default' => $size['default'],
				'type' => 'theme_mod',
				'sanitize_callback' => 'absint', //converts value to a non-negative integer
				'transport' => 'refresh',
			)
		); 
		// font  control
		$wp_customize->add_control( $size['slug'],
			array('label' => $size['label'], 
			'description' => 'enter value in px',
			'section' => 'fontsize',
			'type'=> 'number',
			'settings' => $size['slug'])
		);
	}
	// font section
	$wp_customize->add_section( 'fontsize' , array(
		'description' => __( 'Those are the font size for the theme', 'foundry' ),
		'title' =>  'Typography',
		'priority' => 21,
	) );
	
	// SOCIAL
	foreach( $social as $link ) {
		// social  setting
		$wp_customize->add_setting(
			$link['slug'], array(
				'default' => $link['default'],
				'type' => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw', //cleans URL from all invalid characters
				'transport' => 'refresh',
			)
		); 
		// social  control
		$wp_customize->add_control( $link['slug'],
			array('label' => $link['label'], 
			'section' => 'social',
			'type'=> 'url',
			'settings' => $link['slug'])
		);
	}
	// social  setting -out loop
	$wp_customize->add_setting(
		'display-social', array(
			'default' => 0,
			'type' => 'theme_mod',
			'transport' => 'refresh',
		)
	); 
	// social  control -out loop
	$wp_customize->add_control( 'display-social',
		array('label' => 'Display in main navigation', 
		'section' => 'social',
		'type'=> 'checkbox',
		'settings' => 'display-social',
		)
	);
	// social section
	$wp_customize->add_section( 'social' , array(
		'description' => __( 'Those are the setting for social channel', 'foundry' ),
		'title' =>  'Social',
		'priority' => 21,
	) );
	
 }
 add_action( 'customize_register', 'foundry_customize_register' );


//  Add custom variables as css variable
function fd_root_variables(){
	global $fontsize;
	$css_root = get_stylesheet_directory(  ).'/dist/styles/root.css';
	$handle = fopen($css_root, 'w') or die('Cannot open file:  '.$css_root);
	$data = '';
	
	$data .= ':root{'.PHP_EOL;
	foreach( $fontsize as $size ) {
		$data .= '--'.$size["slug"].':'.get_theme_mod($size["slug"], $size["default"] ).'px;'.PHP_EOL;
	}
	$data .= '}';
	fwrite($handle, $data);
	fclose($handle);
}
add_action( 'customize_save_after', 'fd_root_variables');
add_action( 'init', 'fd_root_variables');
// TODO => SET THE STYLESHEET TO REWRITE ON REFRESHING THE CUSTOMISER IF POSSIBLE