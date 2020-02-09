<?php
session_start();
require 'hyr.html';
//lidhja me databazen
require 'conn.php';

//bejme log in 
 if(isset($_POST['hyr']))
 {

     if(isset($_POST['emailHyr']))
        $email = $_POST['emailHyr'];
    if(isset($_POST['passwordHyr']))
        $password = $_POST['passwordHyr'];
    
    $sql = "SELECT *FROM perdorues WHERE email = '$email' and fjalekalimi = '$password'";
    if(!isset($conn,$sql))
        echo "some kind of problem"; 
        
    //kontrollojme nqs emaili eshte i regjistruar ne databaze
    $sqlEmail =  "SELECT *FROM perdorues WHERE email = '$email'";
    if (!isset($conn,$sqlEmail)) {
    echo "some kind of problem";
}

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

     if ($count != 1) {
     echo " <script>alert( Ju nuk jeni te regjistruar! );</script>";   
 }
 else{   
 // nqs eshte perdorues dhe fjalekalimi eshte i sakte  hapim dashboardin
    $result = mysqli_query($conn,$sql);
   // $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if($count == 1){

        $_SESSION['login_user'] = $email;  
        //marr emrin e perdoruesit
        $sql = "SELECT emri FROM perdorues WHERE email = '$email'";
        $query = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($query);
        $user = $row['emri'];
     //ruaj emrin ne session
        $_SESSION['login_user'] = $user;
      
        ?><script> alert("Miresevjen,<?php echo $user;?>")</script><?php
      
          echo " <script> location.replace('event.php'); </script>";
         
    }
    else{
        echo "<script> alert('Fjalekalimi ose emaili nuk eshte i sakte')</script>";

    }
}

 }
?>
