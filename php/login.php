<?php
// require 'db/connection.php';
require "sanitization.php";
session_start();
require 'functions.php';
$errors = array();
if (isset($_POST['login'])) {
    
    $username = mysqli_real_escape_string($conn, dataSanitizations($_POST['username']));
    $password = mysqli_real_escape_string($conn, dataSanitizations($_POST['password']));
    global $errors; 
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (is_numeric($username)) {
        array_push($errors, "username can't be a number");
    }
    
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (empty($errors)) {
        $query = "SELECT * FROM owner WHERE owner_email = '$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $owner = mysqli_fetch_assoc($result);
            $usr = $owner['owner_email'];
            $pwd = $owner['owner_password'];
            if ($username== $usr && $password == $pwd) {
                $_SESSION['username'] = $owner['owner_email'];
                $_SESSION['name'] = $owner['owner_first_name'];
                $_SESSION['role'] = $owner['role'];
                $rol = $_SESSION['role'];
                if($rol == 'Admin'){
                    header("Location: php/Admin/index.php");

                }else if($rol == 'user'){
                    header("Location: php/company/index.php");
                }else{
                    array_push($errors, "Invalid credentials");
                }
                
            } else {
                array_push($errors, "Invalid credentials");
                
            }
        } else {

            array_push($errors, "Invalid credentials");

        }
    }
}
?>