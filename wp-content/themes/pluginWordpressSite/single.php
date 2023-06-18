<?php 
    get_header();

    while(have_posts()) {
        the_post(); 
        $postcat = get_the_category();
        $idCat = $postcat[0]->term_id;
        $nameCat = ($postcat[0]->name);
        ?> 
        

    
        <section class="main-section bg-light">
            <div class="container top-padding-page-section">
                <div class="one-third">
                    
                    <?php         
                        get_the_page_list_of_from_the_current_category(array(
                            'idCat' => $idCat,
                            'nameCat' => $nameCat,
                        )); 
                    ?>
                </div>

                <div class="two-thirds">
                    <h2><?php the_title(); ?></h2>
                       
                        <div class="top-padding-page-section">
                            <?php the_content(); ?>
                            le contenu ici
                        </div>
                </div>
            </div>
        </section>
        
        <?php
    ?>

  
        
    <?php }



    get_footer();
?>