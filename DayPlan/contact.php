<?php 
require 'contact.html';
require 'conn.php';
$db = mysqli_select_db($conn, 'dayplan');

if (!$db) {
    $statement='CREATE DATABASE dayplan';

    $query=mysqli_query($conn, $statement);

    if (!$query) {
        mysqli_error($conn);
        exit();
    }
}
$sql = "CREATE TABLE IF NOT EXISTS mesazhet(
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    emerKontakt VARCHAR(25) NOT NULL,
    mbiemerKontakt VARCHAR(25) NOT NULL,
    emailKontakt VARCHAR(25) NOT NULL,
    mesazhi VARCHAR(400),
    PRIMARY KEY (ID)
)";
   $query=mysqli_query($conn, $sql);
    
    if (!$query) {
        echo "some kind of problem";
    }


if(isset($_POST['dergo'])){

extract($_POST);

$emerKontakt = mysqli_real_escape_string($conn,$_POST['emerKontakt']);
$mbiemerKontakt = mysqli_real_escape_string($conn,$_POST['mbiemerKontakt']);
$emailKontakt = mysqli_real_escape_string($conn,$_POST['emailKontakt']);
$mesazhi = mysqli_real_escape_string($conn,$_POST['mesazhi']);
 

$sql = "INSERT INTO mesazhet(emerKontakt,mbiemerKontakt,emailKontakt,mesazhi)
 VALUES('{$emerKontakt}','{$mbiemerKontakt}','{$emailKontakt}','{$mesazhi}')";

//dergoj mesazhin me email

$to_email = 'rafaelaprendi7@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'Ky email vjen si pergjigje ndaj mesazhit tuaj';
$headers = 'From: '.$emailKontakt;
mail($to_email, $subject, $message, $headers);

//ruaj mesazhin ne databaze
 $query=mysqli_query($conn, $sql);
    
    if (!$query) {
        echo "some kind of problem on inserting";
    }
else {
     echo "<script>alert('Mesazhi juaj u regjistrua me sukses :)')</script>";

}

}

?>