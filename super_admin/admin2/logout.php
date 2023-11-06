<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();
    
    // Redirect to the login page or any other page you prefer
    header("Location: ../login.php");
    exit();
} else {
    // If the user is not logged in, you can redirect them to the login page as well
    header("Location: ../login.php");
    exit();
}
?>
