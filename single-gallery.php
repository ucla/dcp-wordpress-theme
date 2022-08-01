<?php
    /* Template Name: Gallery Template */
    global $id;

    $thumb_id = get_post_thumbnail_id( $id );

    if ( '' != $thumb_id ) {
        $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'full', true );
        $image      = $thumb_url[0];
    }
    get_header();
?>
    <main id="main" class="main gallery-page">
        <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_8_of_12">
            <?php get_breadcrumb(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
        </div>
        </header>
        <div class="ucla campus entry-content">
            <div class="col span_8_of_12">
                <?php 
                if (has_post_thumbnail()) {
                    $title_name = get_the_title();
                    $featured_caption = get_post_meta($post->ID,'featured_caption', true);
                    echo '<img src="' . $image .'" class="gallery-img" alt="' . $title_name . '"><p class="featured-caption">' . $featured_caption . '</p>';
                }
                ?>
                <?php the_content(); ?>
                <?php edit_post_link(); ?>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="ucla campus related-content pt-80 pb-80">
                <div class="col span_12_of_12">
                    <h2>Related Content</h2>
                    <div id="related-card" class="splide">
                        <div class="splide__slider">
                            <!-- relative -->
                            <div class="splide__track">
                                <ul class="splide__list">
                                <?php 
                                    $recent_posts = wp_get_recent_posts(array('post_type'=>'gallery', 'numberposts' => '5'));

                                    foreach( $recent_posts as $recent ){
                                        $thumb_id = get_post_thumbnail_id( $recent["ID"] );
                                        if ( '' != $thumb_id ) {
                                            $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'full', true );
                                            $image      = $thumb_url[0];
                                        }
                                        else {
                                            $image = '/wp-content/themes/ucla-wp/images/overlay.jpg';
                                        }

                                        echo '<li class="splide__slide"> <article class="basic-card"><img class="basic-card__image" src="' . $image . '" alt="' . $recent["post_title"] . '"><a class="story__secondary-card-link" href="' . get_permalink($recent["ID"]) . '" title="Look ' . esc_attr($recent["post_title"]).'" > <div class="basic-card__info-wrapper"><h1 class="basic-card__title"><span>' .   $recent["post_title"] .'</span></h1>' . '<p class="basic-card__description">' . get_the_excerpt($recent["ID"]) . '</p></div></a></article></li> ';
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
<script>
    new Splide("#related-card", {
        perPage: 3,
        rewind: true, 
        breakpoints: {
            1280: {
                perPage: 2,
            },
            1024: {
                perPage: 1,
            },
        }
    }).mount();
</script>