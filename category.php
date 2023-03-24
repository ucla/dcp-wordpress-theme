<?php get_header(); ?> 
<article id="primary" class="card-gallery">
    <header class="archive-header">
        <h1 class="archive-title"><?php single_cat_title(); ?></h1>
        
        <!-- Display the parent category breadcrumb -->
        <?php
            if ( is_category() ) {
                $query_obj = get_queried_object();
                $term_id = $query_obj->term_id;
                echo get_term_parents_list( $term_id, 'category' );
            }
        ?>
    </header>
    
    <div class="ucla campus entry-content">
        <aside class="col span_3_of_12">
            <?php
                if ( is_category() ) {
                    echo "<h3>Subcategories</h3>";
                    $query_obj = get_queried_object();
                    $term_id   = $query_obj->term_id;
                    echo '<ul>';
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
        <div class="col span_1_of_12" style="min-height:1px;"></div>
        <div class="col span_7_of_12">
            <div style="display: grid; grid-template-columns: auto auto auto; padding: 10px;">
                <?php
                    $query_obj = get_queried_object();
                    $term_id   = $query_obj->term_id;
                    $args = array('post_type' => 'any', 'category__in' => $term_id);
                    
                    $cpt_query = new WP_Query($args);

                    while ( $cpt_query->have_posts() ) : $cpt_query->the_post();
                ?>
                <!-- <div class="category-card" style="background: url('<?php echo $backgroundImg[0]; ?>');"> -->
                <div class="category-card" onclick="window.location.href = '<?php the_permalink() ?>';">
                    <?php //$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );?>
                    <h2><?php the_title(); ?></h2>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</article>
<?php get_footer(); ?>
