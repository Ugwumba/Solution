<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../inst.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="application/json; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>


<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>
        <form id="login" method="post">
        <input type="hidden" name="action" value="2">
        <div id="login-error-message"></div><br>
            <div class="input-group">
                <input class="input" required type="text" id="username" name="username">
                <label class="label" for="username">Username</label>
            </div><br>
            <div class="input-group">
                <input class="input" required type="password" id="password" name="password" >
                <label class="label" for="password">Password</label>
            </div>
            <div class="input-group">
            <button class="password" type="submit">Sign in</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="pages/js/a_admin.js"></script>
</body>
</html>