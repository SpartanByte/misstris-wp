<?php 
/**
 * Template part for displaying Event Goal Section
 *
 *@package EventBell
 */

    $eventgoal_title       = eventbell_get_option( 'eventgoal_title' );
    for( $i=1; $i<=6; $i++ ) :
        $eventgoal_page_posts[] = absint(eventbell_get_option( 'eventgoal_page_'.$i ) );
    endfor;
    ?>
    <div class="wrapper"> 
        <?php if( !empty($eventgoal_title)):?>
            <div class="section-header">
                <?php if( !empty($eventgoal_title)):?>
                    <h2 class="section-title"><?php echo esc_html($eventgoal_title);?></h2>
                <?php endif;?>
            </div>       
        <?php endif;?>       
        <div class="section-content col-3 clear">
            <?php 
            $args = array (
                'post_type'     => 'page',
                'post_per_page' => 6,
                'post__in'      => $eventgoal_page_posts,
                'orderby'       =>'post__in', 
            ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=1;  
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <article>
                    <?php 
                    $eventgoal_icon = eventbell_get_option( 'eventgoal_icon_'.$i );
                    if ( !empty($eventgoal_icon) ) { ?>
                        <div class="eventgoal-icon-container">
                            <i class="fa <?php echo esc_attr( $eventgoal_icon); ?>"></i>
                        </div>
                    <?php  } ?>
                    <div class="service-content">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = eventbell_the_excerpt( 10 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div>
                </article>  
            <?php $i++; ?>
        
            <?php endwhile;?>
          <?php wp_reset_postdata(); endif; ?>

        </div>  
    </div>
