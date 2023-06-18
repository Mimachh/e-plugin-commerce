<?php 



remove_action("woocommerce_sidebar", 'woocommerce_get_sidebar');
remove_action("woocommerce_before_main_content", 'woocommerce_breadcrumb', 20);
remove_action("woocommerce_before_shop_loop", 'woocommerce_result_count', 20);
remove_action("woocommerce_before_shop_loop", 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt');


function open_container_div_classes_before_shop_loop() {
    echo '<div class="container list-product">';
}
add_action("woocommerce_before_shop_loop", "open_container_div_classes_before_shop_loop", 6);

function close_container_div_classes_before_shop_loop() {
    echo "</div>";
}

add_action("woocommerce_after_main_content", "open_container_div_classes_before_shop_loop", 6);



add_action("template_redirect", "load_template_layout");

function load_template_layout() {
    if(is_shop()) {

        function open_container_row_div_classes_list_product() {
            echo '<section class="boutique-section bg-light">
            <div class="" >
            ';
           
        }
        
        add_action("woocommerce_before_main_content", "open_container_row_div_classes_list_product", 5);
        
        
        function close_container_row_div_classes_list_product() { ?>
            </div>
            </section>    
            
        <?php }
        
        add_action("woocommerce_after_main_content", "close_container_row_div_classes_list_product", 7);


    }
}


// IMAGINONS JE VEUX RENDRE FALSE LE TITRE DU SHOP PAGE
// add_filter("woocommerce_show_page_title", "toggle_page_title");

// function toggle_page_title($val) {
//     $val = false;
//     return $val;
// }

function sidebar_open_div() { ?>

    <div class='woocommerce-my-nav-page'>
        <nav>
            <ul>
                <?php if(is_user_logged_in()) { ?>
                    <!-- <li>Shop</li> -->
                    <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">Mon Compte</a></li>
                    <!-- The span items-count is used in woocommerce includes for using ajax and reload element -->
                    <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>">Panier (<span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</a></li>
                    <li><a href="<?php echo esc_url(site_url('commander')); ?>">Validation de la commande</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">S'inscrire / Se connecter</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
<?php }

add_action("woocommerce_after_main_content", "sidebar_open_div", 8);


