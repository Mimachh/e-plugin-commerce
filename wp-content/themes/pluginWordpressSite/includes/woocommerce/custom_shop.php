<?php


function mytheme_add_woocommerce_support() {
	add_theme_support('woocommerce', array(
        "thumbnail_image_width" => 400,
        "single_image_width" => 500,
        "product_grid" => array(
            "default_columns" => 10,
            "min_columns" => 1,
            "max_columns" => 3
        )
    ));
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

