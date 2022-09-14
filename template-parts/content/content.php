<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class = 'story__secondary-card'); ?>>
    <a class="story__secondary-card-image-link" href="<?= esc_url( get_permalink() )?>">
        <figure>
            <?php
                the_post_thumbnail( 'post-thumbnail', array( 'loading' => false, 'class' => 'story__secondary-card-image' ) );
            ?>
        </figure>
    </a>
    <div class="story__secondary-card-content">
        <p class="story__secondary-card-date"><?= get_the_date() ?></p>
        <h3 class="story__secondary-card-title"><a class="story__secondary-card-link" href="<?= esc_url( get_permalink() )?>"><?=get_the_title(); ?></a></h3>
        <p class="story__secondary-card-blurb"><?=get_the_excerpt(); ?></p>
    </div>
</article>