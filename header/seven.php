<?php
/**
 * Header Seven
 * 
 * @package education_zone_pro
*/

    $ed_social_link = get_theme_mod( 'education_zone_pro_ed_social_header' ); // From customizer
    $phone          = get_theme_mod( 'education_zone_pro_phone_number' );
    $email          = get_theme_mod( 'education_zone_pro_email' );
    $address        = get_theme_mod( 'education_zone_pro_address' );
    $ed_search_form = get_theme_mod( 'education_zone_pro_ed_search_form', '1' ); // From customizer
    $cta_lebel      = get_theme_mod( 'education_zone_pro_cta_label', __( 'Apply Now', 'education-zone-pro' ) );
    $cta_links      = get_theme_mod( 'education_zone_pro_cta_link' );
?>

<header id="masthead" class="site-header header-seven" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    
    <div class="header-holder">
        <?php 
        if( has_nav_menu( 'secondary' ) || $ed_social_link ){ ?>
            <div class="header-top">
                <div class="container">
                    <div class="top-links">
                        <?php education_zone_pro_secondary_nav(); ?>
                    </div>
                    <?php if( $ed_social_link ) education_zone_pro_get_social_links(); ?>
                </div>
            </div>
        <?php 
        } ?>
        <div class="header-m">
            <div class="container">
                <?php 
                    education_zone_pro_site_branding(); 

                    if( $cta_lebel && $cta_links ): ?>
                        <a href="<?php echo esc_url( $cta_links ); ?>" class="apply-btn"><?php echo esc_html( $cta_lebel ); ?></a>
                    <?php
                    endif; 
                    if( $address ){ ?>
                        <div class="info-box">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span><?php echo esc_html( $address ); ?></span>
                        </div>

                    <?php
                    } 
                    if( $phone ){ 
						?>
						<div class="info-box"><i class="fa fa-phone" aria-hidden="true"></i>
						<?php
				        $phones = explode("/", $phone);
						$last_key = end(array_keys($phones));
						foreach($phones as $key => $p) {
							?>
                            <span>
								<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', trim($p) ) ); ?>"><?php echo esc_html( trim($p) ); ?></a>
                            </span>
							<?php
							if($key != $last_key) {
							?>
								<span> / </span>
  							<?php
							}
						}
						?>
						</div>
						<?php
                   }
                ?>
            </div>
        </div>
    </div>
    <div class="sticky-holder"></div>  
    <div class="header-bottom">
        <div class="container">
            <?php 
            education_zone_pro_primary_nav();
            
            if( $ed_search_form ){ ?>
                <div class="form-section">
                <a href="#" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="example">                       
                        <?php get_search_form(); ?>
                    </div>
                </div>
             <?php 
            } ?>
        </div>
    </div>
    
</header>