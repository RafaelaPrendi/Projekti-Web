<?php
session_start();
require 'conn.php';
require 'sideMenu.html';


//require 'event.php';

if (isset($_GET['kontrolloVtmDate'])) {
    $emri = $_SESSION['login_user'];

    $data = $_GET['kerkoVtmDate'];

   
    $sql = "SELECT *FROM evente WHERE dita= '$data'";
    $res = mysqli_query($conn, $sql);
    
    if (!mysqli_num_rows($res)>0) {
        //nuk ka evente ne kete kohe
        ?><script> alert("Nuk ka evente ne kete date.")</script><?php
    } else {
        //trego eventin qe ke
        echo "<h5 class='eventTitle'>Ne kete dite ju keni keto evente :</h5>";
        while ($result = mysqli_fetch_assoc($res)) {
            ?><script>
               var div = document.getElementById("eventi");
        var thead = " <table class='event tblEvent'><th>Titulli</th><th>Pershkrimi</th><th>Data</th><th>Ora</th><tr>" ;
        
       var titulli = "<td class='event'><?php echo $result['titulli']; ?></td>";
       var pershkrimi = "<td  class='event'><?php echo $result['pershkrimi']; ?></td>";
       var dita = "<td  class='event'><?php echo $result['dita']; ?></td>";
       var ora = "<td  class='event'><?php echo $result['ora']; ?></td>";
       var table = "</tr></table>";
        div.innerHTML = thead+titulli+pershkrimi+dita+ora+table;
           </script><?php
        }
    }
}

?>
<style>
    .event{
        padding:10px;
    }
    .tblEvent{
        text-align:center;
        margin-top:70px;
        background-color: #FFF;
    }
    .eventTitle{
        margin:20px;
      
    }
</style>