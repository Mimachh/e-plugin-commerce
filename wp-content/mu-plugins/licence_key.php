<?php

function licence_key_post_type() {
    register_post_type('licence_keys', array(
        'capability_type' => 'licence_keys',
        'map_meta_cap' => true,
        'supports' => array('title'),
        'rewrite' => array('slug' => 'licence_keys'),
        "public" => true,
        "show_ui" => true,
        'show_in_rest' => true,
        "labels" => array(
            'name' => 'Clés de Licence',
            "add_new_item" => 'Ajouter une nouvelle Clé',
            "edit_item" => "Editer la clé",
            "all_items" => "Toutes les clés",
            'singular_name' => "Clé"
        ),
        "menu_icon" => 'dashicons-money-alt'
    ));  
}
add_action('init', 'licence_key_post_type');