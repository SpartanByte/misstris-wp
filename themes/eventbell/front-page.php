<?php
/**
 * The template for displaying home page.
 * @package EventBell
 */
$disable_homepage_content_section = eventbell_get_option( 'disable_homepage_content_section' );
if ( 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php $enabled_sections = eventbell_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = eventbell_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?> 

        <?php } elseif( $section['id'] == 'singleevent' ) { ?>
                <?php $disable_singleevent_section = eventbell_get_option( 'disable_singleevent_section' );
                if( true ==$disable_singleevent_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>     

            <?php } elseif( $section['id'] == 'message' ) { ?>
                <?php $disable_message_section = eventbell_get_option( 'disable_message_section' );
                if( true ==$disable_message_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                    </section>
            <?php endif; ?>

            <?php } elseif ( $section['id'] == 'blog' ) { ?>
                <?php $disable_blog_section = eventbell_get_option( 'disable_blog_section' );
                if( true === $disable_blog_section): 
                    $background_blog_section = eventbell_get_option( 'background_blog_section' ); ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class=" page-section" style="background-image: url('<?php echo esc_url( $background_blog_section );?>');">
                        <div class="overlay"></div>
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'eventgoal' ) { ?>
                <?php $disable_eventgoal_section = eventbell_get_option( 'disable_eventgoal_section' );
                if( true ==$disable_eventgoal_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>  
            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $disable_cta_section = eventbell_get_option( 'disable_cta_section' );
                $background_cta_section = eventbell_get_option( 'background_cta_section' );
                if( true ==$disable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = eventbell_get_option( 'disable_about_section' );
                if( true ==$disable_about_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>

            

            <?php } elseif ( $section['id'] == 'video' ) { ?>
                <?php $disable_video_section = eventbell_get_option( 'disable_video_section' );
                if( true === $disable_video_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class=" page-section">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'popular' ) { ?>
                <?php $disable_popular_section = eventbell_get_option( 'disable_popular_section' );
                 if( true ==$disable_popular_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section blog-posts">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; 

             }
        }
        if(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) {
            include( get_page_template() );
        }

    }
    elseif('posts' == get_option( 'show_on_front' )){
        include( get_home_template() );
    } 
    get_footer();
} 
else{
    include( get_home_template() );
}