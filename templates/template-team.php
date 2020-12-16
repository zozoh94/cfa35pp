<?php
/**
 * Template Name: Team Page
 *
 * @package Education Zone Pro
 */

get_header();
$team_order = get_theme_mod( 'education_zone_pro_team_order', 'date' );

  while ( have_posts() ) : the_post();

?>
	<div class="template-team">
	    <div class="team-section">
			<div class="container">
				<?php the_content(); 
				   
	                $args = array(
	                    'post_type'      => 'team',
	                    'post_status'    => 'publish',
	                    'posts_per_page' => -1,
	                );
	                if( $team_order == 'menu_order' ){
				        $args['orderby'] = 'menu_order title';            
				        $args['order']   = 'ASC';
				    }
	                
	                $qry = new WP_Query( $args );
	                
	                if( $qry->have_posts() ){ ?>

	                    <div class="row">

	                        <?php
	                        while( $qry->have_posts() ){
	                            $qry->the_post();
                                if(the_title('','',false) == "Emmanuelle DUCASSE" || the_title('','',false) == "Nadège GUELET")
                                    continue;
	                            
			                    $designation = get_post_meta( get_the_ID(), '_education_zone_pro_team_designation', true );
			                    $facebook    = get_post_meta( get_the_ID(), '_education_zone_pro_team_facebook', true );
			                    $twitter     = get_post_meta( get_the_ID(), '_education_zone_pro_team_twitter', true );
			                    $linkedin    = get_post_meta( get_the_ID(), '_education_zone_pro_team_linkedin', true );
			                    $youtube     = get_post_meta( get_the_ID(), '_education_zone_pro_team_youtube', true );
			                    $instagram   = get_post_meta( get_the_ID(), '_education_zone_pro_team_instagram', true );
			                    $gplus       = get_post_meta( get_the_ID(), '_education_zone_pro_team_gplus', true ); 
			                    $email       = get_post_meta( get_the_ID(), '_education_zone_pro_team_email', true ); 

    			                if( has_post_thumbnail() ){ ?>
                                    
	                                <div class="col">
				                        <div class="holder">
				                        	<div class="img-holder">
				                            <?php the_post_thumbnail( 'education-zone-pro-team' ); ?>
				                            </div>
				                            <div class="text-holder">
				                                <strong class="name"><?php the_title(); ?></strong>
				                                <span class="designation"><?php echo esc_html( $designation ); ?></span>
				                                <?php the_content(); ?>
				                                <?php 
				                                if( $facebook || $twitter || $youtube || $gplus || $linkedin || $instagram || $email ){ ?>
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
				                                        <?php } if( $email ){ ?>
				                                        <li><a href="mailto:<?php echo sanitize_email( $email ); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
				                                        <?php } ?>
				                                    </ul>
				                                <?php } ?>
				                            </div>
				                        </div>
				                    </div>
		                        <?php }
	                        } ?>
	                    </div>
				    <?php 
	                    wp_reset_postdata();
	                } ?>
			</div>
        </div>	
	</div>

<?php 
 endwhile;

get_footer(); ?> 
