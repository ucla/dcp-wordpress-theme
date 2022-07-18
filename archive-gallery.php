<?php
/*
Template Name: Archives - Gallery
*/
get_header(); ?>
<main id="main" class="gallery-archive">
    <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_12_of_12">
                <?php get_breadcrumb(); ?>
                <h1 class="entry-title"><?php echo get_the_archive_title() ?></h1>
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">
        <div class="col span_12_of_12">
            <?php
                $args = array(
                    'post_type'=>'gallery'
                );
                query_posts($args);
                
                if (have_posts()) :
                    // Start the Loop
                    while (have_posts()) : the_post();
                        // Loop Content
                        $thumb_id = get_post_thumbnail_id( $post->ID );
                        if ( '' != $thumb_id ) {
                            $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'full', true );
                            $image      = $thumb_url[0];
                        }
                        ?>
                        
                        <article class="basic-card-grey">
                            <a href="<?php echo get_permalink( $post->ID ); ?>"><img class="basic-card__image" src="<?php echo (has_post_thumbnail() ? $image : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y&s=400'); ?>" alt=<?php the_title(); ?>></a>
                            <div class="basic-card__info-wrapper">
                                <h1 class="basic-card__title"><span><?php the_title(); ?></span></h1>
                                <p class="basic-card__description"><?php the_excerpt(); ?></p>
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
