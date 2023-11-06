<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include_once '../config/Database.php';
include_once '../models/client.php';

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


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 0;
}

// Register
if ($action == 1) {
    $error = $output = array();
    if (empty($_POST['firstname'])) {
        array_push($error, "First Name is Required");
    }
    if (empty($_POST['lastname'])) {
        array_push($error, "Last Name is Required");
    }
    if (empty($_POST['email'])) {
        array_push($error, "Email is Required");
    }
    if (empty($_POST['password'])) {
        array_push($error, "Password is Required");
    }
    if (empty($_POST['phone'])) {
        array_push($error, "Phone is Required");
      }
      if (empty($_POST['address'])) {
        array_push($error, "Address is Required");
      }
      if (!is_numeric($_POST['phone']) || strlen($_POST['phone']) !== 11) {
        array_push($error, "Phone must be exactly 11 digits in correct phone format");
      }  

    if (empty($error)) {
        $firstname = treat($_POST['firstname']);
        $lastname = treat($_POST['lastname']);
        $email = treat($_POST['email']);
        $password = treat($_POST['password']);
        $phone = treat($_POST['phone']);
        $address = treat($_POST['address']);

        // Call the register method from the Account class
        $output = $account->register($firstname, $lastname, $email, $password, $phone, $address);
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



//change password
if($action==10) {
    $account->changepassword();
}



?>
