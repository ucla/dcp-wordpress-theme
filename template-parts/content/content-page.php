<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( ! is_front_page() ) : ?>
        <header class="ucla campus masthead">
            <div class="col span_12_of_12">
                <?php
                    get_breadcrumb();
                    the_title( '<h1 class="entry-title">', '</h1>' );
                ?>
            </div>
        </header>
    <?php endif; ?>
    <?php if ( is_page_template() ) : ?>
        <?php if ( has_post_thumbnail() ) : ?>
            <figure class="page-template__featured-image">
                <?php the_post_thumbnail(); ?>
            </figure>
        <?php endif;
     endif; ?>
    <div class="ucla campus entry-content">
        <?php if ( is_page_template('templates/left-sidebar.php') ) : ?>
            <aside class="col span_3_of_12">
                <?php get_sidebar(); ?>
            </aside>
            <div class="col span_1_of_12" style="min-height:1px;"></div>
        <?php endif; ?>
        <div class="col span_<?php echo (is_page_template('templates/left-sidebar.php') || is_page_template('templates/right-sidebar.php')) ? '7' : '12' ?>_of_12">
            <?php the_content(); ?>
        </div>
        <?php if ( is_page_template('templates/right-sidebar.php') ) : ?>
            <div class="col span_1_of_12" style="min-height:1px;"></div>
            <aside class="col span_3_of_12">
                <?php get_sidebar(); ?>
            </aside>
        <?php endif; ?>
    </div>
</article>