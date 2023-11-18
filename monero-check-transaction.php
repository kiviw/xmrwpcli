<?php
// monero-check-transaction.php

// Path to your Monero CLI executable
$monero_cli_path = '/var/www/monero-x86_64-linux-gnu-v0.18.3.1/monero-wallet-cli';

// Wallet file path
$wallet_file = '/var/www/monero-x86_64-linux-gnu-v0.18.3.1/mronion';

// Password file path
$password_file = '/var/www/woo.txt';

// Read the subaddress from subaddress.txt
$subaddress = file_get_contents('subaddress.txt');

// Command to check the transaction with escapeshellarg()
$check_tx_command = escapeshellcmd("$monero_cli_path --wallet-file " . escapeshellarg($wallet_file) . " --password-file " . escapeshellarg($password_file) . " check_tx " . escapeshellarg($subaddress));

// Execute the command and capture the output
$transaction_result = shell_exec($check_tx_command);

// Save the transaction result to confirmation.txt
file_put_contents('confirmation.txt', $transaction_result);
?>
