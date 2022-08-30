<?php
get_header(); ?>
<main id="main">
    <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_12_of_12">
                <?php get_breadcrumb(); ?>
                <h1 class="entry-title"><?php echo wp_kses_post(get_the_archive_title()); ?></h1>
                <?php if (get_the_archive_description()) { ?>
                    <b><?php echo wp_kses_post(get_the_archive_description()); ?></b>
                <?php } ?>
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">

        <div class="col span_<?php echo (is_active_sidebar('right-widget-area') ? '7' : '12') ?>_of_12">

            <?php

            if (have_posts()) :
                // Start the Loop
                while (have_posts()) : the_post();
                    // Loop Content
                    include 'templates/entry-content.php';
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

            <div class="col span_2_of_12" style="min-height: 1px;"></div>
            <div class="col span_3_of_12">
                <?php dynamic_sidebar('right-widget-area'); ?>
            </div>
        <?php endif; ?>

    </div>

    <?php get_template_part('nav', 'below'); ?>
</main>
<?php get_footer(); ?>
