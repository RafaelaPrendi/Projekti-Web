<?php
session_start();
require 'conn.php';
require 'sideMenu.html';
$statment="SELECT titulli,pershkrimi,dita,ora,gjendja from evente";
    if (!$statment) {
        echo "statment is not ";
    }
    $result=mysqli_query($conn, $statment);

?>
  <section id="DashTable">
        <h4 id="titull-tabele">Tabela e Eventeve</h4>
        <div class="row">
            <div class="col-lg main-table">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="table-header" scope="col">Nr</th>
                            <th class="table-header" scope="col">Titulli</th>
                            <th class="table-header" scope="col">Pershkrimi</th>
                            <th class="table-header" scope="col">Data</th>
                            <th class="table-header" scope="col">Ora</th>
                            <th class="table-header" scope="col">Gjendja</th>
                            <th class="table-header" scope="col">Fshi</th>
                            <th class="table-header" scope="col">Sheno si te kryer</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped" id="secondTableBody">
                <?php
                
                
                 while($row=mysqli_fetch_assoc($result)){
                    $count =1;
                   
                    echo "<tr>";
                    echo "<td>$count</td>";
                    
                    foreach ($row as $key =>$element) {
                        echo "<td>";
                        if ($key =='titulli') {
                            $vlera=$element;
                        }

                        if ($element==null) {
                            echo "";
                        } else {
                            echo $element;
                        }
                        echo "</td>";
                        $count++;
                    }
                    echo "<td><form method='post'> <button class='btn-outline' name='fshi'  value='$vlera'>Fshi eventin</button></td></form>";
                    echo "<td><form method='post'><button class='btn-outline' name='sheno'  value='$vlera'>Sheno si te kryer</button></td></form>";

                    echo "</tr>";

                 }
                 mysqli_free_result($result);
                    //sheno eventin si te kryer
                if (isset($_POST['sheno'])) {
                        $value=$_POST['sheno'];
                        
                        $gjendja = 'E kryer';
                        $stm="UPDATE evente
                        SET gjendja = '$gjendja'
                        WHERE titulli = '$value'";

                        $query=mysqli_query($conn, $stm);
                        if (!$query) {
                            echo 'query error';
                        }
  
                     }
                ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php 





// while ($row=mysqli_fetch_row($result) && $col = mysqli_fetch_fields($result)) {
//     $count =1;
                   
//     echo "<tr>";
//     echo "<td>$count;</td>";
                    
//     foreach ($row as $key =>$element) {
//         echo "<td>";
//         if ($col =='titulli') {
//             $vlera=$element;
//         }

//         if ($element==null) {
//             echo "";
//         } else {
//             echo $element;
//         }
//         echo "</td>";
//         $count++;
//     }
//     echo "<td><form method='post'> <button name='fshi'  value='$vlera'>Fshi eventin</button></td></form>";
//     echo "<td><a href='mark();'>Sheno si te kryer</a></td>";

//     echo "</tr>";
// }
//                  mysqli_free_result($result);

?>