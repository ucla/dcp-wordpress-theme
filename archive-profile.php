<?php
/*
Template Name: Archives - Profiles
*/
get_header(); ?>
<main id="main" class="profile-archive">
    <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_12_of_12">
                <h1 class="entry-title">Profiles</h1>
                
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">

        <div class="col span_<?php echo (is_active_sidebar('right-widget-area') ? '9' : '12') ?>_of_12">
            <hr />
            <?php
                if (have_posts()) :
                    // Start the Loop
                    while (have_posts()) : the_post();
                        // Loop Content
                        $thumb_id = get_post_thumbnail_id( $post->ID );
                        if ( '' != $thumb_id ) {
                            $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'full', true );
                            $image      = $thumb_url[0];
                        }
                        ?>
                        <h2 class="mb-8"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>
                        <p class="profile-pronoun"><?php echo get_post_meta($post->ID,'profile-pronouns', true) ?></p>
                        <p><?php echo get_post_meta($post->ID,'profile-title', true) ?></p>
                        <div class="profile-card">
                            <figure>
                                <img src="<?php if ( has_post_thumbnail() ) { echo $image; } ?>" class="profile-img" alt="">
                            </figure>
                            <div><?php echo get_the_excerpt() ?></div>
                            <div class="profile-contact-information">
                                <h3 class="mx-auto">Contact Information</h3>
                                <address>
                                    <p class="profile-office"><strong>Office:</strong> <?php echo get_post_meta($post->ID, 'profile-office', true) ?></p>
                                    <p class="profile-email"><strong>Email:</strong> <a href="mailto:<?php echo get_post_meta($post->ID, 'profile-email', true) ?>"><?php echo get_post_meta($post->ID, 'profile-email', true) ?></a></p>
                                    <p class="profile-phone"><strong>Phone:</strong> <?php echo get_post_meta($post->ID, 'profile-phone', true) ?></p>
                                </address>
                            </div>
                        </div>
                        <hr />
                    <?php
                    // End the Loop
                    endwhile;
                else :
                    // If no posts match this query, output this text.
                    _e('Sorry, no results match your criteria.', 'textdomain');
                endif;
                wp_reset_postdata();
            ?>

            <div class="pagination mb-64">
                <?php echo get_the_posts_pagination([
                    'format'  => 'page/%#%',
                    'current' => $paged ? $paged : 1,
                    'mid_size'        => 10,
                    'prev_text'       => __('&laquo;'),
                    'next_text'       => __('&raquo;')
                ]); ?>
            </div>
        </div>



        <?php if (is_active_sidebar('right-widget-area')) : ?>

            <div class="col span_1_of_12" style="min-height: 1px;"></div>
            <div class="col span_2_of_12">
                <?php dynamic_sidebar('right-widget-area'); ?>
            </div>
        <?php endif; ?>

    </div>

    <?php get_template_part('nav', 'below'); ?>
</main>
<?php get_footer(); ?>
