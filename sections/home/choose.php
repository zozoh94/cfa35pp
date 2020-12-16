<?php
/**
 * 
 * Why Choose Us Section
*/ 
          
$title       = get_theme_mod( 'education_zone_pro_why_choose_title' );
$description = get_theme_mod( 'education_zone_pro_why_choose_content' );
$post_one    = get_theme_mod( 'education_zone_pro_why_choose_post_one' );
$post_two    = get_theme_mod( 'education_zone_pro_why_choose_post_two' );
$post_three  = get_theme_mod( 'education_zone_pro_why_choose_post_three' );
$post_four   = get_theme_mod( 'education_zone_pro_why_choose_post_four' );
$post_five   = get_theme_mod( 'education_zone_pro_why_choose_post_five' );


$choose_posts = array( $post_one, $post_two, $post_three, $post_four, $post_five );
$choose_posts = array_diff( array_unique( $choose_posts ), array('') );

$args = array(
    'post_type' => array( 'post', 'page'),
    'post__in'   => $choose_posts,
    'orderby'   => 'post__in',
    'ignore_sticky_posts' => true,
);
        
$qry = new WP_Query( $args );

if( $title || $description || ( $choose_posts && $qry->have_posts() ) ){ ?>
    <section id="choose_us_section" class="choose-us">
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

                if( $choose_posts && $qry->have_posts() ){ ?>
                    <div class="row">
                        <?php  
                            while( $qry->have_posts() ){ 
                                $qry->the_post(); ?>
                                <div class="col">
                                    <?php 
                                        if( is_university_zone_child_theme_activated() ) echo '<div class="text-holder">'; 

                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail"> 
                                            <?php
                                            if(has_post_thumbnail()){ 
                                                the_post_thumbnail( 'thumbnail' );  
                                            }else{
                                                education_zone_pro_get_fallback_svg( 'thumbnail');
                                            } ?>
                                        </a>
                                        <?php
                                        //the_title( '<h3><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h3>' );
                                        the_title( '<h3>', '</h3>' ); 
                                         
                                        if( has_excerpt() ){
                                            the_excerpt();        
                                        }else{
                                            echo wpautop( wp_kses_post( wp_trim_words( strip_shortcodes( get_the_content() ), 100, '.' ) ) );        
                                        }
                                        
                                        if( is_university_zone_child_theme_activated() ) echo '</div>';
                                    ?>
                                </div>
                                <?php 
                            }
                            wp_reset_postdata(); 
                        ?>
                    </div>
                    <?php 
                } 
            ?>
        </div>
    </section>
    <?php
}