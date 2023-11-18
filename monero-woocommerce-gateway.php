<?php
/**
 * Plugin Name: Monero WooCommerce Gateway
 * Description: Enable Monero payments on your WooCommerce store.
 * Version: 1.0.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action('plugins_loaded', 'init_monero_gateway_class');
function init_monero_gateway_class() {
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }

    require_once __DIR__ . '/class-wc-monero-gateway.php';
    require_once __DIR__ . '/monero-generate-subaddress.php';
    require_once __DIR__ . '/monero-check-transaction.php';
}

// Include the controller file
require_once __DIR__ . '/monero-controller.php';
