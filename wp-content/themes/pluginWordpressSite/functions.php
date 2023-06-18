<?php 

	require get_theme_file_path('/includes/scripts.php');
    require get_theme_file_path('/includes/medias/features.php');
    require get_theme_file_path('/includes/medias/mimesType.php');
    require get_theme_file_path('/includes/meta/description.php');
    require get_theme_file_path('/includes/meta/keywords.php');
    require get_theme_file_path('/includes/routes/search.php');
    require get_theme_file_path('/includes/single/page_related_category.php');
    require get_theme_file_path('/includes/medias/custom-logo.php');


    if (class_exists("Woocommerce")) {
        require get_theme_file_path('/includes/woocommerce/custom_shop.php');
        require get_theme_file_path('/includes/woocommerce/shop_page.php');
        require get_theme_file_path('/includes/woocommerce/single_product.php');
        require get_theme_file_path('/includes/woocommerce/create_custom_field_in_variation_products.php');
        require get_theme_file_path('/includes/woocommerce/show_cart_total_content.php');
        require get_theme_file_path('/includes/woocommerce/add_generation_licence_key.php');
        require get_theme_file_path('/includes/routes/generate-licence-key.php');
    }


