<?php
session_start();
require 'conn.php';
require 'sideMenu.html';
?>
<div class="myform container" id="shto">
        <form action="shtoEvent.php" method="POST">
            <div class="form-group">
                <label for="titulli">Titulli</label>
                <input name="titulli" type="text" class="form-control" id="titulli" aria-describedby="titulli" placeholder="Si do ta quajme kete detyre" required>
                <small id="emailUnderText " class="form-text text-muted ">Nje emer i shkurter qe te mbahet mend.</small>
            </div>
               <div class="form-group">
                <label for="pershkrimi">Pershkrimi</label>
                <input name="pershkrimi" type="textarea" class="form-control" id="pershkrimi" aria-describedby="pershkrimi" placeholder="Cfare do beni specifikisht ?" required>
                <small id="emailUnderText " class="form-text text-muted ">Detaje mbi detyren qe duhet te kryeni.</small>
            </div>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input name="data" type="date" class="form-control" id="data" aria-describedby="data" required>
            </div>
            <div class="form-group">
                <label for="ora">Ora</label>
                <input name="ora" type="time" class="form-control" id="ora" aria-describedby="ora" required>
            </div>


            <div class="form-group ">
                <button type="submit" class="mainBtn btn btn-lg btn-outline-dark btn-block " id="shtoEvent" name="shto">Shto</button>
            </div>
        </form>
    </div>

<?php
if(isset($_POST['shto'])){

    $titulli = $_POST['titulli'];
    $pershkrimi = $_POST['pershkrimi'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $user = $_SESSION['login_user'];
   
//marrim mbiemrin 
    $stm = "SELECT mbiemri FROM perdorues WHERE emri ='$user'";
    $res = mysqli_query($conn,$stm);
    if(!$res)
    echo "weird problem";

    $res = mysqli_fetch_assoc($res);
    $mbiemri = $row['mbiemri'];
 ?><script> alert("Miresevjen,<?php echo $mbiemri;?>")</script><?php


    //problem me marrjen e mbiemrit
    $sql = "SELECT *FROM evente";
    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "big problem!";
    }

    $statement = "INSERT INTO evente (emri,mbiemri,titulli,pershkrimi,dita,ora)
    VALUES ('$user','$mbiemri','$titulli','$pershkrimi','$data','$ora') ";
    $qry = mysqli_query($conn,$statement);
    if(!$qry){
        echo "big problem!";
    }
    else{
         ?><script> alert("U SHTUA NJE EVENT!YESSS")</script><?php
    }


}

?>
<script>
  var span = document.getElementById("emriPerdoruesit");
    var insert = "<h5 style=' color: #FFFCF2;margin-left: 15px;'>Hey, <?php echo $_SESSION['login_user'];?></h3>";
    span.innerHTML = insert;
</script>




