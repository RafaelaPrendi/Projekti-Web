<?php
session_start();
require 'conn.php';
require 'sideMenu.html';
?>
<div class="myform container" id="fshi">
        <form action="fshiEvent.php" method="POST">
            <div class="form-group">
                <label for="titulli">Titulli</label>
                <input name="titulli" type="text" class="form-control" id="titulli" aria-describedby="titulli" placeholder="" required>
                <small id="emailUnderText " class="form-text text-muted ">Cilin event doni te fshini?</small>
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
                <button type="submit" class="mainBtn btn btn-lg btn-outline-dark btn-block " id="fshi" name="fshi">Fshi</button>
            </div>

        </form>
    </div>

<?php
if (isset($_POST['fshi'])) {

    $titulli = $_POST['titulli'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $user = $_SESSION['login_user'];
    $sql = "DELETE FROM evente WHERE titulli='$titulli' and ora='$ora' and dita='$data'";

    $query = mysqli_query($conn,$sql);

    if (!$query) {
    echo "big problem at deleting!";
}
else{
    ?><script> alert("Fshirja u krye me sukses.")</script><?php
         echo " <script> location.replace('event.php'); </script>";

}

}



?>
