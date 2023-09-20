<?php
require "../php/sanitization.php";
session_start();
$name = $_SESSION['username'];
$uname = $_SESSION['name'];
require '../php/functions.php';
if(!isLoggedIn($name)){
    header("Location: index.php");
}

if(isset($_GET['id'])){
    $pay = "UPDATE booking SET status = 0 WHERE id_booking= ".$_GET['id'];
    $query = mysqli_query($conn,$pay);
    if($query){
        // $msg= "<p class='alter alert-danger fw-bold text-danger mt-2' style='text-align:center;'>row are deleted</p>";
        header("Location: washingpoint.php"); 
    }

else{
    echo "";
}

}
?>