<?php
require 'index.html';
require 'conn.php';
?>
<?php
$db = mysqli_select_db($conn,'dayplan');


if(!$db){
    
    $statement='CREATE DATABASE dayplan';

    $query=mysqli_query($conn, $statement);

    if (!$query) {
        mysqli_error($conn);
        exit();
    }

}

$statement = "CREATE TABLE IF NOT EXISTS perdorues(
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    emri VARCHAR(25) NOT NULL,
    mbiemri VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    fjalekalimi VARCHAR(25) NOT NULL,
    PRIMARY KEY(ID)
)";
  
    $query=mysqli_query($conn, $statement);
    
    if (!$query) {
        echo "some kind of problem";
    }

?>


<?php

    if (isset($_POST['regjistrohu'])) {
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $fjalekalimi = $_POST['fjalekalimi'];
        $repeat = $_POST['repeat'];
        if(!isset($repeat))
            echo "problem me variablin";

        if (!isset($_POST['check'])) {
            echo "<script>";
            echo "alert('Ju nuk mund te rregjistroheni pa rene dakort me rregullat e faqes!')";
            echo "</script>";
        }
       else { 

            //Kontrollo nqs emaili ekziston njehere ne databaze
            $sql = "SELECT *FROM perdorues WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            

          if (mysqli_num_rows($result)>0) {
              echo "<script>";
               echo "alert('Emaili eshte perdorur tashme!')";
              echo "</script>";
            }
            //kontrollo nqs pass eshte shkruar ne rregull
          elseif ($fjalekalimi!=$repeat) {
                echo "<script>";
                echo "alert('Ju nuk keni perseritur te njejtin fjalekalim!')";
                echo "</script>";
            } 
            //hedh te dhenat ne databaze
        else {
                //validimi i passwordit
                $uppercase = preg_match('@[A-Z]@', $fjalekalimi);
                $lowercase = preg_match('@[a-z]@', $fjalekalimi);
                $number    = preg_match('@[0-9]@', $fjalekalimi);
              
                if (!$uppercase || !$lowercase || !$number  || strlen($fjalekalimi) < 6) {
                            echo '<script>
                            alert("Fjalekalimi nuk ploteson kushtet!");
                            </script>';
                                        }

                else{
                        $sql = "INSERT INTO perdorues(emri,mbiemri,email,fjalekalimi) VALUES ('$emri','$mbiemri','$email','$fjalekalimi')";
                         $result = mysqli_query($conn, $sql);
                        if (!$result) {
                                         echo "nuk jane hedhur te dhenat! ";
                                             }
                            echo '<script>
                            alert("Ju u regjistruat me sukses! Tani shtyp butonin hyr.");
                            </script>';

                     }
                
            }
        }
    }
mysqli_close($conn);
?>






