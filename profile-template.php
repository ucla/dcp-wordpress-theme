<?php
    /* Template Name: Profile Template */
    get_header();
?>
    <main id="main" class="main profile-page">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php echo get_post_meta($post->ID, 'Mood', true); ?>
        <?php endwhile; ?>
        <div class="ucla campus entry-content">
            <div class="col span_<?php echo (is_active_sidebar('right-widget-area') ? '7' : '12') ?>_of_12">
                <?php the_content(); ?>
                <?php edit_post_link(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>