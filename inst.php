<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




function logout(){
	if(isset($_SESSION['email'])){
    unset($_SESSION['email']);


    }
    header('Location: login.php');
}


function admin_logout(){
	if(isset($_SESSION['username'])){
    unset($_SESSION['username']);


    }
    header('Location: ../index.php');
}