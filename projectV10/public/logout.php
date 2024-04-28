<?php
// Start the session
session_start();

// Check if the logout button was clicked
if(isset($_POST['logout'])) {
    // Destroy all session data
    session_destroy();
    
    // Redirect to a login page or any other page after logout
    header("Location: login-register.php");
    exit;
}