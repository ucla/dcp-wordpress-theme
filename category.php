<?php get_header(); ?> 
<section id="primary" class="site-content">
    <div id="content" role="main">
        <header class="archive-header">
            <h1 class="archive-title"><?php single_cat_title(); ?></h1>
            <h1>parents</h1>
            <?php
                if ( is_category() ) {
                    // Get the current category term id.
                    $query_obj = get_queried_object();
                    $term_id = $query_obj->term_id;
                    
                    echo get_term_parents_list( $term_id, 'category' );
                    echo "<h1>children</h1>";
                    $query_obj = get_queried_object();
                    $term_id   = $query_obj->term_id;
                    // $taxonomy_name = 'category';
                    // $termchildren = get_term_children( $term_id, $taxonomy_name );
            
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
                    // foreach ( $termchildren as $child ) {
                    //   $term = get_term_by( 'id', $child, $taxonomy_name );
                    //   echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
                    // }
                    echo '</ul>';
                }
            ?>
        </header>
        <div class="ucla campus entry-content">
            <aside class="col span_3_of_12">
                <?php get_sidebar(); ?>
            </aside>
            <div class="col span_1_of_12" style="min-height:1px;"></div>
            <div class="col span_9_of_12">
                <div style="display: grid; grid-template-columns: auto auto auto; padding: 10px;">
                <?php
                    $query_obj = get_queried_object();
                    $term_id   = $query_obj->term_id;
                    // Define args
                    $args = array('post_type' => 'any', 'category__in' => $term_id);
                    
                    // Execute query
                    $cpt_query = new WP_Query($args);

                    // The Loop
                    while ( $cpt_query->have_posts() ) : $cpt_query->the_post();
                ?>
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );?>
                <div style="
                    background: url('<?php echo $backgroundImg[0]; ?>');
                    background-repeat: no-repeat;
                    background-size: cover;
                    border: 1px solid rgba(0, 0, 0, 0.8);
                    min-height: 600px;
                    padding: 20px;
                    font-size: 30px;
                    text-align: center;">
                        
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
