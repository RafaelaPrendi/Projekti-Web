<?php
session_start();
require 'conn.php';
require 'sideMenu.html';

$sql = "CREATE TABLE IF NOT EXISTS njoftime(
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    emri VARCHAR(25) NOT NULL,
    mbiemri VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    titulli VARCHAR(300) NOT NULL,
    pershkrimi VARCHAR(300) NOT NULL,
    dita DATE NOT NULL,
    ora TIME NOT NULL,
    PRIMARY KEY (ID))";
    $query = mysqli_query($conn, $sql);

if (!$query) {
    echo mysqli_error($conn);
}
$join = "SELECT
 perdorues.ID,
 perdorues.emri,
 perdorues.mbiemri,
 perdorues.email,
 perdorues.fjalekalimi,
 FROM perdorues
 JOIN njoftime ON
  njoftime.emri = perdorues.emri,
  njoftime.mbiemri = perdorues.mbiemri,
  njoftime.email = perdorues.email";
  if (!$join) {
      echo "table join is not ok!";
  }
  $join2 = "SELECT
 evente.ID,
 evente.titulli,
 evente.pershkrimi,
 evente.dita,
 evente.ora,
 FROM evente
 JOIN njoftime ON
  njoftime.titulli = evente.titulli,
  njoftime.pershkrimi = evente.pershkrimi,
  njoftime.dita = evente.dita,
  njoftime.ora = evente.ora";
  if (!$join2) {
      echo "table join 2 is not ok!";
  }
$dataSot = date("Y/m/d");
$oraTani = date("h:i:sa");

$statement = "SELECT *FROM njoftime";
$result = mysqli_query($conn,$statement);
if(!$result){
    echo "statement is not ok!";

}
$row = array();
$row = mysqli_fetch_assoc($result);
print_r($row);
foreach($row as $key => $element){
if($key =='dita')
{
    if(($element-$dataSot) ==1){
        //dergo email
        $to_email = 'rafaelaprendi7@gmail.com';
        $subject = 'Njoftim';
         $message = 'Neser ju keni nje event.Kontrolloni profilin tuaj.';
         $headers = 'From: '.$emailKontakt;
         mail($to_email, $subject, $message, $headers);

    }
    elseif($element==$dataSot){
        //dergo email
        $to_email = 'rafaelaprendi7@gmail.com';
        $subject = 'Njoftim';
         $message = 'Sot ju keni nje event.Kontrolloni profilin tuaj.';
         $headers = 'From: '.$emailKontakt;
         mail($to_email, $subject, $message, $headers);

    }

}

}
