<?php
// monero-controller.php

// Include necessary WooCommerce files
require_once('../../../wp-load.php');
require_once('../../../wp-admin/includes/admin.php');
require_once('../../../wp-includes/pluggable.php');
require_once('../../../wp-includes/post.php');

// Include the file for generating the address
require_once __DIR__ . '/monero-generate-subaddress.php';

// Include the file for checking the transaction
require_once __DIR__ . '/monero-check-transaction.php';

// Hook to execute the check_monero_transaction function every five minutes
add_action('monero_check_transaction_event', 'check_monero_transaction_event_callback');

function check_monero_transaction_event_callback() {
    // Include the file for checking the transaction
    require_once __DIR__ . '/monero-check-transaction.php';

    // Call the function to check transactions
    check_monero_transaction();
}

// Schedule the event every five minutes
if (!wp_next_scheduled('monero_check_transaction_event')) {
    wp_schedule_event(time(), 'five_minutes', 'monero_check_transaction_event');
}

// Add five minutes interval to WordPress
function filter_cron_schedules($schedules) {
    $schedules['five_minutes'] = array(
        'interval' => 300,
        'display'  => __('Every 5 Minutes'),
    );
    return $schedules;
}
add_filter('cron_schedules', 'filter_cron_schedules');

// ... (any other necessary code)
