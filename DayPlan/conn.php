<?php
//lidhja me databazen
$serverName = "localhost";
$userName = "root";
$password = "";
$db = "dayplan";

 $conn = mysqli_connect($serverName, $userName, $password);
 $select = mysqli_select_db($conn, $db);
 if (!$conn  || !$select) {
     die("Lidhja me databazen deshtoi!" .mysqli_connect_error());
 }
?>