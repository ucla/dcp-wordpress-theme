<?php
    /* Template Name: Profile Template */
    global $id;

    $thumb_id = get_post_thumbnail_id( $id );

    if ( '' != $thumb_id ) {
        $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'full', true );
        $image      = $thumb_url[0];
    }
    get_header();
?>
    <main id="main" class="main profile-page">
        <div class="ucla campus pt-24">
            <div class="col span_4_of_12" style="min-height: 1px"></div>
            <div class="col span_8_of_12">

            <a href="/profile" class="btn btn--sm btn--lightbg" style="display:inline-block;color:#fff;">View All</a>
            </div>
        </div>
        <div class="ucla campus entry-content">
            <div class="col span_3_of_12">
                <figure>
                <img src="<?php echo (has_post_thumbnail() ? $image : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y&s=400'); ?>" class="profile-img" alt="">
                    <figcaption>
                        <h1 class="profile-name"><?php the_title(); ?></h1>
                        <?php
                            if (get_post_meta($post->ID,'profile-pronouns', true) !== 'Prefer not to say') {            
                        ?>
                        <p class="profile-pronoun"><?php echo get_post_meta($post->ID,'profile-pronouns', true) ?></p>

                        <?php } ?>
                        <div class="mt-16">
                            <p class="profile-title"><em><?php echo get_post_meta($post->ID,'profile-title', true) ?></em></p>
                            <p class="profile-office"><strong>Office:</strong> <?php echo get_post_meta($post->ID, 'profile-office', true) ?></p>
                            <p class="profile-email"><strong>Email:</strong> <a href="mailto:<?php echo get_post_meta($post->ID, 'profile-email', true) ?>"><?php echo get_post_meta($post->ID, 'profile-email', true) ?></a></p>
                            <p class="profile-phone"><strong>Phone:</strong> <?php echo get_post_meta($post->ID, 'profile-phone', true) ?></p>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col span_1_of_12" style="min-height: 1px"></div>
            <div class="col span_8_of_12">
                <?php the_content(); ?>
                <?php edit_post_link(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>