<?php 
    get_header();
?>

<section class="main-section bg-dark">
    <div class="container landing-page">
        <!-- <div class="two-thirds">
            <div class="landing-hero">
                <h2>Boost your Wordpress WebSite</h2>
            </div>
        </div>
        <div class="logo-landing-page one-third">
            <img src="<?php echo get_theme_file_uri('/images/p_(2)-transformed.png') ?>" alt="Website Logo">
        </div>

        <div> -->
            <iframe
                src="https://www.youtube.com/embed/QbjPR1Ifn0g">
            </iframe> 
    </div>
    
    </div>
    <style>
        iframe[src*="https://www.youtube.com/embed/"] {
            position: relative !important;
            width: 100% !important;
            height: auto !important;
            max-width: 450px!important;
            aspect-ratio: 9 / 16 !important;
        }
    </style>

</section>

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

    foreach($categories as $c) {
       echo $c->name;
    //    print_r($c);
       ?><a href='<?php echo get_term_link( $c->term_id ) ?>'>lien</a> <?php
    }
?>

<?php 
    get_footer();
?>