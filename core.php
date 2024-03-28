<?php

// Start session
session_start();

// Function to check for login using user id session created at login
function checkLogin() {
    // Check if user id session exists
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login_view page
        header("Location: login_view.php");
        // Stop further execution
        die();
    }
}

?>
