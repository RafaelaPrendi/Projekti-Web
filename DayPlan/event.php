<?php
//session_start();
require 'dashboard.php';
require 'conn.php';

?>
<script>
  var span = document.getElementById("emriPerdoruesit");
    var insert = "<h5 style=' color: #FFFCF2;margin-left: 15px;'>Hey, <?php echo $_SESSION['login_user'];?></h3>";
    span.innerHTML = insert;
</script>

<?php
$db = mysqli_select_db($conn, 'dayplan');
//nqs nuk ka databaze,krijohet
if (!$db) {
    $statement='CREATE DATABASE dayplan';

    $query=mysqli_query($conn, $statement);

    if (!$query) {
        mysqli_error($conn);
        exit();
    }
}
?>

<?php
 


//krijohet tabela e eventeve
$statement = "CREATE TABLE IF NOT EXISTS evente(
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    emri VARCHAR(25) NOT NULL,
    mbiemri VARCHAR(25) NOT NULL,
    titulli VARCHAR(300) NOT NULL,
    pershkrimi VARCHAR(300) NOT NULL,
    dita DATE NOT NULL,
    ora TIME NOT NULL,
    PRIMARY KEY(ID)
)";
 $query = mysqli_query($conn,$statement);

if(!$query)

    echo mysqli_error($conn);


?> 
<?php
//lidh tabelen e eventeve me perdoruesit
$join = "SELECT
 perdorues.ID,
 perdorues.emri,
 perdorues.mbiemri,
 perdorues.email,
 perdorues.fjalekalimi,
 FROM perdorues
 JOIN evente ON
  evente.emri = perdorues.emri,
  evente.mbiemri = perdorues.mbiemri";
  if(!$join)
  echo "table join is not ok!";
  
 
if (isset($_GET['kontrollo'])) {
    $emri = $_SESSION['login_user'];

    $data = $_GET['kerkoDate'];
    $ora = $_GET['kerkoOre'];
   
    $sql = "SELECT *FROM evente WHERE dita= '$data' and ora='$ora'";
    $res = mysqli_query($conn, $sql);
    
    if (!mysqli_num_rows($res)>0) {
        //nuk ka evente ne kete kohe
        ?><script> alert("Nuk ka evente ne kete ore.")</script><?php
    } else {
        //trego eventin qe ke
       while($result = mysqli_fetch_assoc($res)){
           ?><script>
               var div = document.getElementById("eventi");
        var thead = " <table class='event tblEvent'><th>Titulli</th><th>Pershkrimi</th><tr>" ;
        
       var titulli = "<td class='event'><?php echo $result['titulli'];?></td>";
       var pershkrimi = "<td  class='event'><?php echo $result['pershkrimi'];?></td>";
    
       var table = "</tr></table>";
        div.innerHTML = thead+titulli+pershkrimi+table;
           </script><?php
       }
       
    }
}





//rregullo sesionet,logout
//mbiemri nk shtohet te tabela e eventeve
//printo event per te bere shporten -_-


//ndaji sipas diteve te javes dhe hidhi opsionet e lira te kartat
//lidh shtoEvent.php me butonat shto tek ditet

//tabele ne databaze per njoftimet
//njoftimi ne email,mos njofto kur eshte e kryer dhe kur eshte me heret se data/ora e tanishme


?>


<style>
    .event{
        padding:10px;
    }
    .tblEvent{
        text-align:center;
        margin-top:40px;
        background-color: #FFF;
    }
</style>