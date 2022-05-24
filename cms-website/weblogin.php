<?php
// require 'db/connection.php';
require "../php/sanitization.php";
// session_start();
require '../php/functions.php';
$errors = array();
if (isset($_POST['login'])) {
    
    $username = mysqli_real_escape_string($conn, dataSanitizations($_POST['username']));
    $password = mysqli_real_escape_string($conn, dataSanitizations($_POST['password']));
    global $errors; 
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (empty($errors)) {
        $query = "SELECT * FROM customer WHERE customer_email = '$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $owner = mysqli_fetch_assoc($result);
            $usr = $owner['customer_email'];
            $pwd = $owner['customer_password'];
            if ($username== $usr && $password == $pwd) {
                $_SESSION['username'] = $owner['customer_email'];
                // $_SESSION['name'] = $owner['owner_first_name'];
                // $_SESSION['role'] = $owner['role'];
                $_SESSION['$logsension'] = true;
            } else {
                array_push($errors, "Invalid credentials");
                
            }
        } else {

            array_push($errors, "Invalid credentials");

        }
    }
}

if(isset($_POST['regist'])){
        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, dataSanitizations($_POST['email']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $password1 = mysqli_real_escape_string($conn, dataSanitizations($_POST['password1']));
        $password2 = mysqli_real_escape_string($conn, dataSanitizations($_POST['password2']));
        if(empty($first_name)){
        ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#register").modal("show");
        });
        </script>
    <?php
}

}

?>