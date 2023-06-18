<?php

function get_the_page_list_of_from_the_current_category($args = null) { 
    
    if (!isset($args['idCat'])) {
        $args['idCat'] = '';
    }

    if (!isset($args['nameCat'])) {
        $args['nameCat'] = '';
    }

    $cat_posts = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page'   => -1,
        'cat'         => $args['idCat'],
        'orderby'          => 'date',
        'order'            => 'ASC',
    ));
    
    ?>
    
    <div class="list-of-related-page-category">  
        <h2 class="the-cat-name"><a href="<?php echo get_term_link( $args['idCat'] ) ?>"><?php echo $args['nameCat']; ?></a> documentation</h2>
        <?php
        while ($cat_posts->have_posts()) {
            $cat_posts->the_post(); ?>

        <a href="<?php the_permalink(); ?>" <?php if(is_single(get_the_ID())) echo "class='active-link'"; ?> ><h3><?php echo the_title();?> </h3></a>  
        
        
        <?php }
        ?>
    </div>
<?php  wp_reset_postdata(); }