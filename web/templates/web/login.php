<?php
// require 'db/connection.php';
require "../php/sanitization.php";
session_start();
require '../php/functions.php';
$errors = new SplFixedArray(4);
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, dataSanitizations($_POST['username']));
    $password = mysqli_real_escape_string($conn, dataSanitizations($_POST['password']));
    // global $errors; 
    if (empty($username)) {
        $errors[0] = "username cannot be empty";
    }
    if (is_numeric($username)) {
        $errors[0] = "username can not be a number";
    }
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $errors[0] = "username is an email";
    }
    
    if (empty($password)) {
        $errors[1] = "incorect password";
    }
    $GLOBALS['exart'] = 0;
    foreach($errors as $k => $val){
        if($val == null){
            $exart+=1; 
        }
    }
    if (isset($errors) && $exart == 4) {
        $query = "SELECT * FROM customer WHERE customer_email = '$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $owner = mysqli_fetch_assoc($result);
            $usr = $owner['customer_email'];
            $pwd = $owner['customer_password'];
            if ($username== $usr && password_verify($password,$pwd)) {
                $_SESSION['username'] = $owner['customer_email'];
                $_SESSION['name'] = $owner['customer_first_name'];
                $_SESSION['cm_id'] = $owner['id_customer'];
                header("Location: home.php");
                
            } else {
                $errors[1] = "invalid username and password";
            }
        } else {
            $errors[0] = "invalid username";
        }
    }
}
?>