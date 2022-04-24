<?php
$conn = mysqli_connect("localhost","root","","cms") or die("coluld not connect");
$q = "SELECT * FROM map";
$query = mysqli_query($conn,$q) or die("map error");

header('Content-Type: application/json');

$rows = array();
while ($row = mysqli_fetch_array($query))
{
    $rows[] = $row;
}
echo json_encode($rows);
exit;


?>