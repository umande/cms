<?php
echo "hellow";
session_start();
unset($_SESSION['$logsension']);
session_destroy();

session_start();
$_SESSION['$logsension'] = 0;
header("Location: index.php");
