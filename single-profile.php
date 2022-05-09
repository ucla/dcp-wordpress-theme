<?php
    /* Template Name: Profile Template */
    get_header();
?>
    <main id="main" class="main profile-page">
        <div class="ucla campus entry-content">
                <?php the_content(); ?>
                <?php edit_post_link(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>