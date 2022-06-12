<?php

require '../db/connection.php';
// session_start();
// require 'functions.php';
// $username = $_SESSION['username'];
// $role = $_SESSION['role'];
// if(!isLoggedIn($username)){
//     header("Location: ../index.php");
// }
// if(!isAdmin($role)){
//     header("Location: ../index.php");
// }

if(isset($_GET['id'])){
    $delete = "DELETE FROM worker WHERE id =".$_GET['id'];
    $query = mysqli_query($conn,$delete);
    if($query){
        // $msg= "<p class='alter alert-danger fw-bold text-danger mt-2' style='text-align:center;'>row are deleted</p>";
        header("Location:./worker_1.php"); 
    }

else{
    echo "";
}

}
?>