<?php
include_once '../inst.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add this meta tag in your HTML <head> section -->
<meta http-equiv="Content-Type" content="application/json; charset=UTF-8">

    <title>CRUD OPERATIONS</title>
    <link rel="stylesheets" href="../assets/style.css">

    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Boxicons CSS from a CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Include Font Awesome CSS from a CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <?php include 'includes/header.php'; ?>
    <!-- Content -->
    <?php include('../pages/p-login.php'); ?>
    <!--/ Content -->

    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Your custom JavaScript file -->
    <script src="../pages/js/account.js"></script>
</body>
</html>
