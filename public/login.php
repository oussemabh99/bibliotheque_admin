<?php 
session_start();
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')
    
    {
    require '../includes/check_user.php';
    $verify = checkUser($_POST['email'], $_POST['password']);
    if ($verify!==false) {
        $_SESSION['email'] = $_POST['email'];
        header("Location: dashboard.php");
        exit();
    }
    else {
        include 'assets/html/errorlogin.html';
        exit();
    }
    }
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
        include 'assets/html/login.html';

 }
 ?>