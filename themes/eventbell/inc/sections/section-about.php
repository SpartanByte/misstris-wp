<?php 
/**
 * Template part for displaying Successful Event  Section
 *
 *@package EventBell
 */
    $about_title    = eventbell_get_option( 'about_title' );
    $about_category = eventbell_get_option( 'about_category' );


    ?>
    <?php if( !empty($about_title)):?>
        <div class="section-header">
            <?php if( !empty($about_title)):?>
                <h2 class="section-title"><?php echo esc_html($about_title);?></h2>
            <?php endif;?>
        </div>       
    <?php endif;?> 
    
    <div class="section-content col-3">
    

                <?php $args = array (

                    'posts_per_page' =>6,              
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => 1,
                    );
                    if ( absint( $about_category ) > 0 ) {
                        $args['cat'] = absint( $about_category );
                    }
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>

                <article>

                    <div class="about-item-wrapper" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">                    
                        <div class="entry-container">
                            <h4><a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a></h4>
                        </div><!-- .entry-container -->
                    </div><!-- .about-item-wrapper -->
                </article>

                <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>

    </div>   