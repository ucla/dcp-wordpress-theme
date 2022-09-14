<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="ucla campus masthead">
        <div class="col span_12_of_12">
            <?php
                get_breadcrumb();
                the_title( '<h1 class="entry-title">', '</h1>' );
                if ( has_post_thumbnail() ) { ?>
                    <figure>
                        <?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
                    </figure>
                <?php } ?>
             <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
             <p><?php echo get_the_author(); ?></p>
        </div>
    </header>
    <div class="ucla campus entry-content">
        <div class="col span_<?=is_active_sidebar( 'primary-widget-area' ) ? '9' : '12' ?>_of_12">
            <?php the_content(); ?>
        </div>
        <?php if (is_active_sidebar( 'primary-widget-area' )) : ?>
            <aside class="col span_3_of_12">
                <?php get_sidebar(); ?>
            </aside>
        <?php endif; ?>
    </div>
</article>