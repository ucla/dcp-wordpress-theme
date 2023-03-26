<?php get_header(); ?> 
<article id="primary" class="card-gallery">
    <header class="category-header">
        <h1 class="category-title"><?php single_cat_title(); ?></h1>
        <?php
            if ( is_category() ) {
                $query_obj = get_queried_object();
                $term_id = $query_obj->term_id;
                echo '<div class="category-breadcrumb">';
                echo get_term_parents_list( $term_id, 'category' );
                echo '</div>';
            }
        ?>
    </header>
    
    <div class="ucla campus entry-content">
        <aside class="col span_2_of_12">
            <?php
                if ( is_category() ) {
                    echo "<h3 class='subcategories-title'>Subcategories</h3>";
                    $query_obj = get_queried_object();
                    $term_id   = $query_obj->term_id;
                    echo '<ul class="subcategories-list">';
                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'parent'  => $term_id
                    ) );
                    
                    foreach ( $categories as $category ) {
                        printf( '<a href="%1$s">%2$s</a><br />',
                            esc_url( get_category_link( $category->term_id ) ),
                            esc_html( $category->name )
                        );
                    }
                    echo '</ul>';
                }
            ?>
        </aside>
        <div class="col span_10_of_12">
            <div class="grid">
                <?php
                    $query_obj = get_queried_object();
                    $term_id   = $query_obj->term_id;
                    $args = array('post_type' => 'any', 'category__in' => $term_id);
                    
                    $cpt_query = new WP_Query($args);

                    while ( $cpt_query->have_posts() ) : $cpt_query->the_post();
                ?>
                <div class="grid-item">
                    <div class="card" onclick="window.location.href = '<?php the_permalink() ?>';">
                        <?php
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img_src = wp_get_attachment_image_src($img_id, 'post-thumbnail' );
                            if(!$img_src)
                                $img_src = get_template_directory_uri() . "/images/card-default-image.jpg";
                            else
                                $img_src = $img_src[0];
                            $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
                            if (!$img_alt)
                                $img_alt = "UCLA logo";
                            echo "<img class='card-img' src='" . $img_src . "' alt='" . $img_alt . "'></img>";
                        ?>
                        <h2 class="card-title"><?php the_title(); ?></h2>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</article>
<?php get_footer(); ?>
