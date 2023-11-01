<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header('Location: index.php');
    exit();
}



include_once '../inst.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?php
        if (isset($_SESSION['id'])) {
            echo 'Welcome ' . $_SESSION['username'];
        }
        ?>
    </h1>
</body>

</html>