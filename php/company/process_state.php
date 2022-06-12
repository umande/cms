<?php 
require "../db/connection.php";
require "../sanitization.php";
if(isset($_GET['id'])){
    $update = "UPDATE vehicle SET status = 2 WHERE id_vehicle=".$_GET['id'];
    $query = mysqli_query($conn,$update) or die("error on pr");
    if($query){
        ?>
            <script>

                location.reload();
				return false;
            </script>
        <?php
        header("Location:./customer_1.php");
    }
}

?>