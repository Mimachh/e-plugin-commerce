<?php 
    get_header();
?>

<section class="main-section bg-light">
    <div class="container index-doc-div">


        Here you can find all the documentation for using our plugin
        <div class="index-list-grid-structure">
           
            <div class="index-list-grid-detail">
                <?php
                        $args = array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'parent'   => 0,
                            'hide_empty' => 0,
                            //'exclude'   => '7',
                            // optional you can exclude parent categories from listing
                    );

                    $categories = get_categories( $args );
                    
                    foreach($categories as $index => $c) { ?>
                    
                        <article>
                            <div class="content-card-doc">
                                <a href="<?php echo get_term_link( $c->term_id ) ?>">                                       
                                    <img class="doc-img" src="<?php echo get_field('main_image', $c)['sizes']['postLandscape']; ?>" alt="Plugin image">   
                                    <div class="title title-<?php echo $index + 1; ?>">
                                        <h2 ><?php echo $c->name; ?></h2>
                                    </div>
                                </a>
                            </div>
                            
                            <span class="debord-<?php echo $index + 1; ?>"></span>
                        </article>
                    
                    <?php } ?>
            </div>
          
        </div>
    </div>
    
</section>

<?php 
    get_footer();
?>