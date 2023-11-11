<?php
session_start();
include_once '../inst.php';
include_once '../config/Database.php';
include_once '../models/account.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$account = new Account($db);

// Cleansing Function
function treat($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

// $_POST['action'] = 50;
// $_POST['id'] = 1;
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 0;
}

// Register
if ($action == 1) {
    $error = $output = array();
    if (empty($_POST['email'])) {
        array_push($error, "Email is Required");
    }
    if (empty($_POST['password'])) {
        array_push($error, "Password is Required");
    }

    if (empty($error)) {
        $email = treat($_POST['email']);
        $password = treat($_POST['password']);

        // Call the register method from the Account class
        $output = $account->register($email, $password);
    } else {
        $output['error'] = true;
        $output['message'] = $error;
    }
    echo json_encode($output);
}

// Login
if ($action == 2) {
    $error = $output = array();
    if (empty($_POST['email'])) {
        array_push($error, "Email is Required");
    }
    if (empty($_POST['password'])) {
        array_push($error, "Password is Required");
    }

    if (empty($error)) {
        $email = treat($_POST['email']);
        $password = treat($_POST['password']);

        // Call the login method from the Account class
        $output = $account->login($email, $password);

    } else {
        $output['error'] = true;
        $output['message'] = $error;
    }
    
    echo json_encode($output);
}

if ($action == 7) {
    $subadminCount = $account->subadminClients();
    echo json_encode(['subadminCount' => $subadminCount]);
    exit; // Terminate the script after sending the response
  }

//change password

if($action==10) {
    $account->changepassword();
}



?>
