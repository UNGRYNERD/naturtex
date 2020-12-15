<?php

//remove woocommerce block styles
add_action('wp_enqueue_scripts', function () {
    wp_deregister_style('wc-block-style');
}, 100);

//remove woocommerce default styles
add_filter('woocommerce_enqueue_styles', function ($enqueue_styles) {
    unset($enqueue_styles['woocommerce-general']); // Remove the gloss
    unset($enqueue_styles['woocommerce-layout']); // Remove the layout
    unset($enqueue_styles['woocommerce-smallscreen']); // Remove the smallscreen optimisation
    return $enqueue_styles;
});

//single product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_before_single_product', 'woocommerce_template_single_title', 15);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_all_actions('woocommerce_after_single_product_summary');

add_filter('wc_product_sku_enabled', '__return_false');

add_action('woocommerce_after_single_product', function () {
    echo App\template('partials.product-data');
}, 99);

add_filter('woocommerce_dropdown_variation_attribute_options_html', function($html, $args) {
    if (!strpos($html, 'display:none')) {
        $html = '<div class="c-dropdown">' . $html . '</div>';
    }
    return $html;
}, 300, 2);

//Cambia el texto del selector de variaciones
add_filter('woocommerce_dropdown_variation_attribute_options_args', function ($args) {
    global $product;

    $args['show_option_none'] = wc_attribute_label($args['attribute'], $product);

    return $args;
}, 10);

// remove wrapper and breadcrump

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');


//add new wrapper
add_action('woocommerce_before_main_content', function () {
    if (is_shop()) {
        echo App\template('partials.shop-slideshow');
    }
    echo '<div class="container container--full shop-wrapper">';
});

add_action('woocommerce_after_main_content', function () {
    echo '</div>';
});

//Archive Page
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_filter('single_product_archive_thumbnail_size', function () {
    return 'product-thumb';
});

function un_variable_price_from( $price, $product ) {
    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( 'From %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', __NAMESPACE__ . '\un_variable_price_from', 10, 2 );
add_filter( 'woocommerce_variable_price_html', __NAMESPACE__ . '\un_variable_price_from', 10, 2 );

add_filter('woocommerce_before_shop_loop_item_title', function() {
    echo '<div class="product__image-wrapper">';
}, 9);

add_filter('woocommerce_before_shop_loop_item_title', function() {
    echo '</div>';
}, 11);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_before_shop_loop', function () {
    echo App\template('partials.shop-filters');
}, 99 );
