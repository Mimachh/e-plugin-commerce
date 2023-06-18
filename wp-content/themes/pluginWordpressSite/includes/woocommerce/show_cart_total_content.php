<?php 

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'pluginwordpresssite_woocommerce_header_add_to_cart_fragment' );

function pluginwordpresssite_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>

    <span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>


	<?php
	$fragments['span.items-count'] = ob_get_clean();
	return $fragments;
}