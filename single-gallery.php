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
        <div class="ucla campus related-content">
            <h2>Related Content</h2>
            <?php $recent_posts = wp_get_recent_posts(array('post_type'=>'gallery'));
            foreach( $recent_posts as $recent ){
                echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
            } ?>
        </div>
    </main>
<?php get_footer(); ?>