<?php
require 'conn.php';
session_start();
$user = $_SESSION['login_user'];
  $sql = "DELETE FROM perdorues WHERE emri='$user'";
  $stat = "DELETE FROM evente WHERE emri='$user' ";

    $query = mysqli_query($conn,$sql);
    if (!$query) {
        echo "big problem at deleting!";
    }
    $query = mysqli_query($conn, $stat);
    if (!$query) {
        echo "big problem at deleting!";
    }

  ?><script> alert("Llogaria juaj dhe te gjitha te dhenat po fshihen")</script><?php
session_destroy();
header("Location:index.html");

?>