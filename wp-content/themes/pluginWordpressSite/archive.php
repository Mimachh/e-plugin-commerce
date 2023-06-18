<?php 
    get_header();
?>

<section class="main-section bg-light">
    <div class="container top-padding-page-section">


            <div class="one-third">
                <?php $term = get_queried_object();  
                // will show the name echo $term->name;
                // will show the taxonomy echo $term->taxonomy;
                // will show taxonomy slug  echo $term->slug;
                $idCat = $term->term_id;
                $nameCat = $term->name;
                get_the_page_list_of_from_the_current_category(array(
                    'idCat' => $idCat,
                    'nameCat' => $nameCat
                )); ?>
            </div>

            <div class="two-thirds">
                <?php echo category_description(); ?>
            </div>
                
           
    </div>
</section>

<?php
    get_footer();
?>