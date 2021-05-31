<?php 
/**
 * Template part for displaying Upcoming Event Section
 *
 *@package EventBell
 */
?>
<?php 
	 $blog_post_title    = eventbell_get_option( 'blog_title' );
    for( $i=1; $i<=3; $i++ ) :
        $blog_post_posts[] = absint(eventbell_get_option( 'blog_post_'.$i ) );
    endfor;
	 
	 
?> 
<div class="wrapper">
    <?php if( !empty($blog_post_title) ):?>
            <div class="section-header">
                <?php if( !empty($blog_post_title)):?>
                    <h2 class="section-title"><?php echo esc_html($blog_post_title);?></h2>
                <?php endif;?>
            </div>       
        <?php endif;
    ?>

    <div class="section-content clear col-3">
  	     <?php 
                $args = array (
                    'post_type'     => 'post',
                    'post_per_page' =>3,
                    'post__in'      => $blog_post_posts,
                    'orderby'       =>'post__in',
                    'ignore_sticky_posts' => true, 
                ); 
            $i=1; 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                 
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <article >
                        <div class="post-items">
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');');">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <div class="entry-meta">
                                    <?php 
                                        $blog_address = eventbell_get_option( 'blog_address_'.$i );
                                        $blog_date = eventbell_get_option( 'blog_date_'.$i );?>
                                        <span class="event-address"><?php echo esc_html($blog_address); ?></span>
                                        <span class="event-time"><?php echo esc_html($blog_date); ?></span>
                                </div>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </header>
                                    <div class="entry-content">
                                        <?php 
                                            $excerpt = eventbell_the_excerpt( 10 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->

                                    <span class="cat-links">
                                        <span><?php echo esc_html__('Event Type: ', 'eventbell'); ?><?php eventbell_entry_meta(); ?></span>
                                    </span>
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>
	           <?php $i++; endwhile;?>
	   <?php wp_reset_postdata(); endif; ?>
  </div>
</div>