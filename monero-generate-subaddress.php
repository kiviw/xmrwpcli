<?php
// monero-generate-subaddress.php

// Path to your Monero CLI executable
$monero_cli_path = '/var/www/monero-x86_64-linux-gnu-v0.18.3.1/monero-wallet-cli';

// Wallet file path
$wallet_file = '/var/www/monero-x86_64-linux-gnu-v0.18.3.1/mronion';

// Password file path
$password_file = '/var/www/woo.txt';

// Use the order ID as the label for the subaddress
$order_id = 123; // Replace with your order ID
$label = 'order_' . $order_id;

// Command to execute with escapeshellarg()
$command = escapeshellcmd("$monero_cli_path --wallet-file " . escapeshellarg($wallet_file) . " --password-file " . escapeshellarg($password_file) . " address new " . escapeshellarg($label));

// Execute the command and capture the output
$subaddress = shell_exec($command);

// Save the subaddress to subaddress.txt
file_put_contents('subaddress.txt', $subaddress);

// Start 40 minutes timer
wp_schedule_single_event(time() + 2400, 'monero_check_transaction_status', array($order_id));
?>
