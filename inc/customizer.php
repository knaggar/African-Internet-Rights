<?php
/**
 * @package air
 *
 */
 
// Add Logo uploader

function air_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'air_logo_section' , array(
        'title'       => __( 'Logo', 'air' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
        
) );
    $wp_customize->add_setting( 'air_logo' );
   
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'air_logo', array(
    'label'    => __( 'Logo', 'air' ),
    'section'  => 'air_logo_section',
    'settings' => 'air_logo',
) ) );

}
add_action('customize_register', 'air_theme_customizer');