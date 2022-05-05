<?php
    /* Template Name: Profile Template */
    get_header();

    global $id;

    $thumb_id = get_post_thumbnail_id($id);

    if ('' != $thumb_id) {
    $thumb_url  = wp_get_attachment_image_src($thumb_id, 'actual_size', true);
    $image      = $thumb_url[0];
    }
?>
    <main id="main" class="main profile-page">
        <div class="ucla campus entry-content">
            <div class="col span_5_of_12">
                <img class="profile-img" src="<?php if ( has_post_thumbnail() ) { echo $image; } ?>" alt="">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php echo get_post_meta($post->ID, 'Mood', true); ?>
                <?php endwhile; ?>
                
            </div>
            <div class="col span_<?php echo (is_active_sidebar('right-widget-area') ? '7' : '12') ?>_of_12">
                <?php the_content(); ?>
                <?php edit_post_link(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>