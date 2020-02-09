<?php 
session_start();
require 'conn.php';
 $statment="SELECT titulli,pershkrimi,dita,ora,gjendja from evente";
    if (!$statment) {
        echo "statment is not ";
    }
    $result=mysqli_query($conn, $statment);
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/98321fec91.js" crossorigin="anonymous"></script>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Javascript scripts -->
    <script src="index.js"></script>
    <!-- <script src="datepicker.js"></script> -->
    <style>
        body {
            background-color: #fffcf2;
        }
    </style>

</head>

<body class="dashboard">
    <div class="row">
        <div class="col-lg horizontal">
            <hr>
        </div>
    </div>
    <!-- Navbari anesor -->
    <div class="row">
        <div class="col-sm-2">
            <div class="sidenav">

                <a class="navbar-brand" href="index.html"> <img src="images/logo.png" style=" width: 30px; height: auto; margin-right: 6px;" alt=""> DayPlan</a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button> -->

                <span id="emriPerdoruesit"></span>

                <a href="shtoEvent.php">Shto event te ri</a>
                <a href="fshiEvent.php">Fshi nje event</a>
                <a href=""> <i class="fas fa-check"></i> Sheno si te kryer</a>
                <a href="">Shto nje njoftim</a>
                <div class="dropdown">
                    <a class="btn btn-outline btn-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink" href="">
                        <i class="fas fa-cog"></i> Rregullimet</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        <a class="dropdown-item settings-item" href="">- Fshi oren</a>
                        <a class="dropdown-item settings-item" href="">- Shto oren</a>
                        <a class="dropdown-item settings-item" href="">- Fshi njoftimin</a>
                        <a class="dropdown-item settings-item" href="">- Tingulli i njoftimit</a>
                        <a class="dropdown-item settings-item" href="fshiLlogarine.php">- Fshi llogarine time</a>
                         
                    </div>

                </div>

                <a href="dashboard.php">Dashboard</a>
                <a href="" class="end-btn"> <i class="fas fa-question"></i> Ndihme</a>
                <form action="logout.php" method="post">
                    <a role="button" href="logout.php" name="logout"> <i class="fas fa-sign-out-alt"></i> Dil</a>
                </form>

            </div>

        </div>
        <!-- DATA ,KOHA -->
        <div class="col-sm-3 date">
            <div class="container row">

                <h5>A jeni te lire ne daten:</h5>
                <form action="kerkoEvent.php" method="GET">
                    Vendos daten <input type="date" id="date" name="kerkoVtmDate">
                    <input type="submit" class="btn btn-dark" id="kontrollo" value="Kontrollo" name="kontrolloVtmDate">
                </form>

                <br><br>
                <h5>A jeni te lire ne daten dhe oren:</h5>
                <form action="event.php" method="GET">
                    Vendos daten <input type="date" id="date" name="kerkoDate">
                    <br> Vendos oren <input type="time" id="time" name="kerkoOre">
                    <br>
                    <input type="submit" class="btn btn-dark" id="kontrollo" value="Kontrollo" name="kontrollo">
                </form>

            </div>
            <div id="eventi"></div>
        </div>
        <!-- Karuseli me karta -->
        <div class="col-sm-3 card-stack">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="card">
                            <div class="card-header"> <strong>E Hene</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-header"> <strong>E Marte</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-header"> <strong>E Merkure </strong></div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-header"> <strong>E Enjte</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-header"> <strong>E Premte</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-header"> <strong>E Shtune</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-header"><strong>E Diel</strong> </div>
                            <div class="card-body">
                                <h5 class="card-title"> Opsione te lira </h5>
                                <p class="card-text">
                                    <div class="card-part">
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                        <p>• Lorem ipsum</p>
                                        <hr>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Shto nje event te ri</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

        <a class="carousel-control-prev crl-btn " id="prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <strong class="carousel-icon">
                 </strong> <span class="carousel-control-prev-icon  " aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next crl-btn " id="next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <strong class="carousel-icon">></strong>
            <span class="carousel-control-next-icon " aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>
    <br>
    <hr>
    <!-- Table -->
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
                  
                 while ($row=mysqli_fetch_assoc($result)) {
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
                    echo "<td><button class='btn-outline' name='sheno'  value='$vlera'>Sheno si te kryer</button></td>";

                     echo "</tr>";
                 }
                 mysqli_free_result($result);

                
                
                ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
<!-- Footeri -->
<footer>
    <p class="dashboard-footer"><i class="far fa-copyright"></i> Copyright 2020 Rafaela Prendi.</p>
</footer>
<!-- per te treguar emrin e perdoruesit -->
<?php
if (isset($_POST['fshi'])) {
    $value=$_POST['fshi'];

    $stm="DELETE FROM evente WHERE titulli = '$value'";

    $query=mysqli_query($conn, $stm);
    if (!$query) {
        echo 'query error';
    }
}


?>
</html>