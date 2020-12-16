<?php
/**
 * 
 * Team Section
*/ 
          
$title       = get_theme_mod( 'education_zone_pro_team_title' );
$description = get_theme_mod( 'education_zone_pro_team_content' );
$post_one    = get_theme_mod( 'education_zone_pro_team_post_one' );
$post_two    = get_theme_mod( 'education_zone_pro_team_post_two' );
$post_three  = get_theme_mod( 'education_zone_pro_team_post_three' );
$post_four   = get_theme_mod( 'education_zone_pro_team_post_four' );
$view_all    = get_theme_mod( 'education_zone_pro_team_viewall_label', __( 'View All Team', 'education-zone-pro' ) );
$link        = get_theme_mod( 'education_zone_pro_team_viewall_link' );
$team_posts  = array( $post_one, $post_two, $post_three );
$team_posts  = array_diff( array_unique( $team_posts ), array('') );

$uz_team_posts = array( $post_one, $post_two, $post_three, $post_four );
$uz_team_posts = array_diff( array_unique( $uz_team_posts ), array('') );

$child_theme_support = get_theme_mod( 'education_zone_pro_child_additional_support','default' ); 

if( $child_theme_support === 'university_zone' ){
    $class = 'team-text-holder';
    $team_posts = $uz_team_posts;
}else{
    $class = 'text-holder';
}

$args = array(
    'post__in'  => $team_posts,
    'post_type' => 'team',
    'orderby'   => 'post__in',
);
        
$qry = new WP_Query( $args );

if( $title || $description || ( $team_posts && $qry->have_posts() ) ){ ?>
    <div id="team_section" class="team-section">
        <div class="container">
            <?php 
                if( $title || $description ){ ?>
                    <header class="header-part">
                        <?php 
                            if( $title ) echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
                            if( $description ) echo apply_filters( 'the_content', $description );
                        ?>
                    </header>
                    <?php 
                } 

                if( $team_posts && $qry->have_posts() ){ ?>
                    <div class="row">
						<div class="col">
						</div>
                        <?php  
                            while( $qry->have_posts() ){ 
                                $qry->the_post();
                                $designation = get_post_meta( get_the_ID(), '_education_zone_pro_team_designation', true );
                                $facebook    = get_post_meta( get_the_ID(), '_education_zone_pro_team_facebook', true );
                                $twitter     = get_post_meta( get_the_ID(), '_education_zone_pro_team_twitter', true );
                                $linkedin    = get_post_meta( get_the_ID(), '_education_zone_pro_team_linkedin', true );
                                $youtube     = get_post_meta( get_the_ID(), '_education_zone_pro_team_youtube', true );
                                $instagram   = get_post_meta( get_the_ID(), '_education_zone_pro_team_instagram', true );
                                $gplus       = get_post_meta( get_the_ID(), '_education_zone_pro_team_gplus', true ); 

                                if( has_post_thumbnail() ){ ?>
                                    <div class="col">
                                        <div class="holder">
                                            <div class="img-holder">
                                            <?php the_post_thumbnail( 'education-zone-pro-team' ); ?>
                                            </div>
                                            <div class="<?php if( $class ) echo $class; ?>">
                                                <strong class="name"><?php the_title(); ?></strong>
                                                <span class="designation"><?php echo esc_html( $designation ); ?></span>
                                                <?php the_content(); ?>
                                                <?php 
                                                if( $facebook || $twitter || $youtube || $gplus || $linkedin || $instagram ){ ?>
                                                    <ul class="social-networks">
                                                        <?php if( $facebook ){?>
                                                        <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                                        <?php } if( $twitter ){ ?>
                                                        <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                        <?php } if( $youtube ){ ?>
                                                        <li><a href="<?php echo esc_url( $youtube );?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                                        <?php } if( $gplus ){ ?>
                                                        <li><a href="<?php echo esc_url( $gplus );?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                        <?php } if( $instagram ){ ?>
                                                        <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                                        <?php } if( $linkedin ){ ?>
                                                        <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }
                            wp_reset_postdata(); ?>
						<div class="col">
						</div>

                    </div>
                    <?php 
                    if( $view_all && $link ){ ?>
                        <div class="btn-holder">
                            <a href="<?php echo esc_url( $link ); ?>" class="learn-more"><?php echo esc_html( $view_all ); ?></a>
                        </div>
                        <?php 
                    }
                 } 
            ?>
        </div>
    </div>
    <?php
}