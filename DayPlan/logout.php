<?php
session_start();
require 'dashboard.html';
//include 'session.php';
   
 session_destroy(); 
 echo " <script> location.replace('index.html'); </script>";

   


?>