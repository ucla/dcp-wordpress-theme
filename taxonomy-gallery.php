<?php
/*
Template Name: Taxonomy - Gallery
*/
get_header(); ?>
<?php
$term = get_queried_object();
?>
<main id="main" class="gallery-archive">
    <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_12_of_12">
                <?php get_breadcrumb(); ?>
                <h1 class="entry-title"> <?php echo $term->name; ?></h1>
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">
        <div class="col span_12_of_12">
        <div id="nav-second" class="nav-secondary" aria-label="Secondary Menu">
            <ul class="nav-secondary__list">
                <?php
                    $gallery_position = get_terms(
                        array(
                            'taxonomy' => 'gallery_position'
                        )
                        );
                    if (! empty( $gallery_position ) && is_array( $gallery_position )) {
                        foreach ($gallery_position as $position) {
                ?>
                    <li class="nav-secondary__item">
                        <a class="nav-secondary__link" href="<?php echo esc_url( get_term_link( $position ) ) ?>">
                            <?php echo $position->name; ?>
                        </a>
                    </li>
                <?php
                        }
                    }
                ?>
            </ul>
        </div>
        </div>
        <div class="col span_12_of_12">
            <?php
                $args = array(
                    'post_type' => 'gallery',
                    'gallery_position' => $term->slug
                );
                $query = new WP_Query( $args );
                if ( $the_query->have_posts()) :
                    // Start the Loop
                    while (have_posts()) : the_post();
                        // Loop Content
                        $thumb_id = get_post_thumbnail_id( $post->ID );
                        if ( '' != $thumb_id ) {
                            $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'full', true );
                            $image      = $thumb_url[0];
                        }
                        ?>
                        
                        <article class="basic-card">
                            <a href="<?php echo get_permalink( $post->ID ); ?>"><img class="basic-card__image" src="<?php echo (has_post_thumbnail() ? $image : '/wp-content/themes/ucla-wp/images/overlay.jpg'); ?>" alt=<?php the_title(); ?>></a>
                            <div class="basic-card__info-wrapper">
                                <a href="<?php echo get_permalink( $post->ID ); ?>">
                                    <h1 class="basic-card__title"><span><?php the_title(); ?></span></h1>
                                    <p class="basic-card__description"><?php the_excerpt(); ?></p>
                                </a>
                            </div>
                        </article>
                    <?php
                    // End the Loop
                    endwhile;
                else :
                    // If no posts match this query, output this text.
                    _e('Sorry, no results match your criteria.', 'textdomain');
                endif;
                wp_reset_postdata();
            ?>
        </div>
        <div class="col span_1_of_12" style="min-height: 1px;"></div>
    </div>

    <?php get_template_part('nav', 'below'); ?>
</main>
<?php get_footer(); ?>
