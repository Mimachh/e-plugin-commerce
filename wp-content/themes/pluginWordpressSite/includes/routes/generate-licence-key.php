<?php

add_action('rest_api_init', 'generateLicenceKeyRoutes');

function generateLicenceKeyRoutes() {
    register_rest_route('site/v1', 'manageLicence', array(
        'methods' => 'POST',
        'callback' => 'createLicenceKey'
    ));
}

    function createLicenceKey($data) {
        if(is_user_logged_in()) {

            $order = sanitize_text_field($data['order_id']);
            $activation_totale = sanitize_text_field($data['variation_id']);
            $buyer = sanitize_text_field($data['buyer_id']);
            $token = sanitize_text_field($data['licence_key']);
            $activation_restantes = sanitize_text_field($data['activation_restantes']);
            
            $current_date = current_time('d-m-Y');

            $existKey = new WP_Query(array(
                'post_type' => 'licence_keys',
                'meta_query' => array(
                    array(
                        'key' => 'buyer_id',
                        'compare' => '=',
                        'value' => get_current_user_ID(),
                    ),
                    array(
                        'key' => 'order_id',
                        'compare' => '=',
                        'value' => $order,
                    ),
                    array(
                        'key' => 'variation_id',
                        'compare' => '=',
                        'value' => $activation_totale,
                    )
                )
            ));
            if($existKey->found_posts == 0) {
                return wp_insert_post(array(
                    'post_type' => 'licence_keys',
                    'post_title' => $buyer,
                    'post_status' => 'private',
                    'meta_input' => array(
                        'buyer_id' => $buyer,
                        'order_id' => $order,
                        'variation_id' => $activation_totale,
                        'licence_key' => $token,
                        'activation_restantes' => $activation_restantes,
                        'date_dactivation' =>$current_date
                    ),
                ));
            } else {
                die("Déja une clé");
            }

        } else {
            die('il faut être co');
        }
    }
