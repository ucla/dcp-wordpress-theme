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
                <img src="<?php echo (has_post_thumbnail() ? $image : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y&s=400'); ?>" class="gallery-img" alt="">
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
                                <?php $recent_posts = wp_get_recent_posts(array('post_type'=>'gallery', 'numberposts' => '5'));
                                    foreach( $recent_posts as $recent ){
                                        echo '<li class="splide__slide"> <article class="basic-card-grey"><a class="story__secondary-card-link" href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" > <div class="basic-card__info-wrapper"><h1 class="basic-card__title"><span>' .   $recent["post_title"].'</span></h1></div></a></article></li> ';
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
        rewind: true
    }).mount();
</script>