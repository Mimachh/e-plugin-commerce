<?php

add_action( 'woocommerce_product_after_variable_attributes', 'custom_field_for_activation_site', 10, 3 );

function custom_field_for_activation_site( $loop, $variation_data, $variation ) {

	woocommerce_wp_text_input(


        array( 
            'id'          => '_number_field['.$loop.']', 
            'label'       => __( 'Activations de site disponibles', 'woocommerce' ), 
            'desc_tip'    => 'true',
            'description' => __( 'Enter the custom number here.', 'woocommerce' ),
            'value'       => get_post_meta( $variation->ID, 'gestion_nombre_activation_site', true ),
            'custom_attributes' => array(
                            'step' 	=> '1',
                            'min'	=> '1'
                        ) 
        )
	);

}

add_action( 'woocommerce_save_product_variation', 'my_custom_save_fields_for_handle_site_activation', 10, 2 );

function my_custom_save_fields_for_handle_site_activation( $variation_id, $loop ) {

	// Text Field
	$text_field = ! empty( $_POST[ '_number_field' ][ $loop ] ) ? $_POST[ '_number_field' ][ $loop ] : '';
	update_post_meta( $variation_id, 'gestion_nombre_activation_site', sanitize_text_field( $text_field ) );

}

add_filter( 'woocommerce_available_variation', function( $variation ) {

	$variation[ '_number_field' ] = get_post_meta( $variation[ 'variation_id' ], 'gestion_nombre_activation_site', true );
	return $variation;

} );