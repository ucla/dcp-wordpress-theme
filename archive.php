<?php get_header(); ?>
<main id="main">
    <header class="header">
        <div class="ucla campus">
            <div class="col span_12_of_12">
                <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
                <h1 class="entry-title"><?php single_term_title(); ?></h1>
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">

        <div class="col span_<?php echo(is_active_sidebar('primary-widget-area') ? '7' : '12') ?>_of_12">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php include 'templates/entry-content.php'; ?>
            <?php endwhile;
            endif; ?>
        </div>

        <?php if (is_active_sidebar('primary-widget-area')) : ?>

            <div class="col span_2_of_12"></div>
            <div class="col span_3_of_12">
                <?php dynamic_sidebar('primary-widget-area'); ?>
            </div>
        <?php endif; ?>


    </div>

    <?php get_template_part('nav', 'below'); ?>
</main>
<?php get_footer(); ?>