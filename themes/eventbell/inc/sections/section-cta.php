<?php 
/**
 * Template part for displaying CTA Section
 *
 *@package Eventbell
 */

    $cta_button_label       = eventbell_get_option( 'cta_button_label' );
?>
<?php
    $cta_id = eventbell_get_option( 'cta_page' );
        $args = array (
        'post_type'     => 'page',
        'posts_per_page' => 1,
        'p' => $cta_id,
        
    ); 
        
    $the_query = new WP_Query( $args );

    // The Loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
    ?>
            <div class="section-header">
                <h2 class="section-title">
                    <?php the_title(); ?>
                </h2>
                <?php $excerpt = eventbell_the_excerpt( 10 );
                    echo wp_kses_post( wpautop( $excerpt ) ); ?>
            </div><!-- .section-header -->

        <?php if ( !empty($cta_button_label ) )  :?>
            <div class="read-more">
                <?php if ( ! empty( $cta_button_label ) ) : ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html($cta_button_label); ?></a>
                <?php endif; ?>
            </div><!-- .read-more -->
        <?php endif;?>
<?php endwhile; 
wp_reset_postdata(); ?>
