<?php
session_start();
include_once '../inst.php';
include_once '../config/Database.php';
include_once '../models/a_account.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$admin = new Admin($db);

// Cleansing Function
function treat($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 0;
}

// Login
if ($action == 2) {
    $error = $output = array();
    if (empty($_POST['username'])) {
        array_push($error, "Username is Required");
    }
    if (empty($_POST['password'])) {
        array_push($error, "Password is Required");
    }

    if (empty($error)) {
        $username = treat($_POST['username']);
        $password = treat($_POST['password']);

        // Call the login method from the Admin class
        $output = $admin->login($username, $password);

        header('Content-Type: application/json'); // Set the response content type to JSON
        echo json_encode($output);
    } else {
        $output['error'] = true;
        $output['message'] = $error;
        header('Content-Type: application/json'); // Set the response content type to JSON
        echo json_encode($output);
    }
}


?>
