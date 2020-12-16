<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    require get_template_directory() . '/inc/template-functions.php';
    $parenthandle = 'education-zone-pro-style';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
                      array(),
                      $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'cfa35pp-style', get_stylesheet_uri(),
                      array( $parenthandle ),
                      $theme->get('Version')
    );
}

function education_zone_pro_footer_credit(){ 

    $ed_social_link   = get_theme_mod( 'education_zone_pro_ed_social_footer' ); // From customizer
    $footer_copyright = get_theme_mod( 'education_zone_pro_footer_copyright' );
    $ed_author_link   = get_theme_mod( 'education_zone_pro_ed_author_link' );
    $ed_wp_link       = get_theme_mod( 'education_zone_pro_ed_wp_link' ); 
    $text = ''; ?>

    <div class="site-info"> 
        <?php 
        if( $ed_social_link ) education_zone_pro_get_social_links(); 

        if( $footer_copyright ){
        $text .= '<span>' .wp_kses_post( education_zone_pro_apply_footer_shortcode( $footer_copyright ) ) . '</span>';
        }else{
            $text .= '<span>';
            $text .=  esc_html__( 'Copyright &copy;', 'education-zone-pro' ) . date_i18n( esc_html__( 'Y', 'education-zone-pro' ) ); 
            $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.</span>';
        }

        if( ! $ed_author_link || ! $ed_wp_link ) $text .= '<span class="by">';
    
        if( ! $ed_author_link ){
            $text .= esc_html__( ' | Développé par ', 'education-zone-pro' );
            $text .= '<a href="' . esc_url( 'https://www.linkedin.com/in/enzo-hamelin-a295a760/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Enzo Hamelin', 'education-zone-pro' ) . '</a>.';
        }
        
        if( ! $ed_wp_link ){
            $text .= sprintf( esc_html__( ' Powered by: %s.', 'education-zone-pro' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'education-zone-pro' ) ) .'" target="_blank">WordPress</a>' );
        }
        
        if( ! $ed_author_link || ! $ed_wp_link ) $text .= '</span>'; 
        
        echo apply_filters( 'education_zone_pro_footer_text', $text );

        if ( function_exists( 'the_privacy_policy_link' ) ) {
            the_privacy_policy_link( '<span class="policy_link">', '</span>');
        }

        ?>
    
    </div>

    <?php 
}

function cfa35pp_customize_register_home_why_choose( ) {
    
    
    /** why_choose Section */
    Kirki::add_section( 'education_zone_pro_why_choose_settings', array(
        'title' => __( 'Why Choose Us Section', 'education-zone-pro' ),
        'priority' => 60,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** why_choose Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_why_choose_title',
        'label'       => __( 'Why Choose Us Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
    ) );

    /** why_choose Section Content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_why_choose_content',
        'label'       => __( 'Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
    ) );     
    
    /** why_choose Post One */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_one',
        'label'       => __( 'Select Post/Page One', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    
    /** why_choose Post Two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_two',
        'label'       => __( 'Select Post/Page Two', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    
    /** why_choose Post Three */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_three',
        'label'       => __( 'Select Post/Page Three', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    
    /** why_choose Post Four */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_four',
        'label'       => __( 'Select Post/Page Four', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
	    /** why_choose Post Five */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_why_choose_post_five',
        'label'       => __( 'Select Post/Page Five', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_why_choose_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );
    /** why_choose Section Ends */
    
}
add_action( 'init', 'cfa35pp_customize_register_home_why_choose');

remove_action("wp_head", "wp_generator");
add_filter('login_errors',create_function('$a', "return null;"));
define('DISALLOW_FILE_EDIT',true);
