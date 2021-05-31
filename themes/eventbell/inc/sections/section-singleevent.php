<?php 
/**
 * Template part for displaying Single Event Section
 *
 *@package EventBell
 */


    $btn_text = eventbell_get_option( 'singleevent_btn_text');
    $enable_counter = eventbell_get_option( 'disable_singleevent_counter');
    $singleevent_address = eventbell_get_option( 'singleevent_address');
    $singleevent_date = eventbell_get_option( 'singleevent_date');  
    $singleevent_time = eventbell_get_option( 'singleevent_time');  
    ?>  
    <?php  
        $singleevent_id = eventbell_get_option( 'singleevent_page' ); 
            $args = array (
            'post_type'     => 'page',
            'posts_per_page' => 1,
            'p' => $singleevent_id,
            
        ); 
        $the_query = new WP_Query( $args );

        // The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>
        <?php if ($enable_counter == true): ?>
            <div class="event-starting-time">
                <h4 id="event-timer" data-countdown="<?php echo esc_attr( $singleevent_date); ?>"></h4>
            </div><!-- .event-starting-time -->    
        <?php endif ?>
        <div class="single-event-info">
            <ul class="date-info">
                
                <li class="event-date"><i class="fa fa-calendar"></i><?php echo esc_html( $singleevent_date ); ?></li>
                <li class="event-header">
                    <ul>
                        <li class="event-img" >
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>">
                        </li>
                        <li class="event-detail"> 
                            <h2 class="event-title"><?php the_title(); ?></h2>
                            <p class="event-address"><i class="fa fa-map"></i><?php echo esc_html( $singleevent_address ); ?></p>
                        </li>
                    </ul>
                </li>
                <li class="event-time"><i class="fa fa-clock-o"></i><?php echo esc_html( $singleevent_time ); ?></li>                      
            </ul>
            
            <div class="read-more">
                <a class="btn" href="<?php the_permalink(); ?>"><i class="fa fa-pencil-square-o"></i><?php echo esc_html( $btn_text ); ?></a>
            </div> 
        </div>
        <?php endwhile; 
        wp_reset_postdata(); ?>
        