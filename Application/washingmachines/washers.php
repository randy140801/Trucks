<?php 
require('CRUD.php');
//error_reporting(0);
if(!isset($_COOKIE["ID"])){
    redirect('../index.php');
    }
$ID = $_GET["ID"];
$sql = "SELECT * FROM washingmachines WHERE IDtruck='$ID'";
$all = mysqli_query($connect, $sql);
$value = mysqli_fetch_assoc($connect->query($sql));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Yomogi&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <title>Camiones</title>
</head>

<body>

  <nav class="header">
    <div class="nav-wrapper">
      <a href="../trucks/trucks.php" class="brand-logo center" style="color: #000;">Lavadoras</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="AddEdit.php?IDtruck=<?=$ID?>">Agregar</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>


  <div class="index">
    <div class="row">
    
      <?php
      if(!empty($value)){
      foreach($all as $char){
          
            $blob = $char['foto'];
            echo'
            <div class="col s4">
                <div class="card">
                <div class="card-image">
                    <div class="activator image" style="background-image: url(data:image/jpeg;base64,'.base64_encode( $blob ).');"> </div>
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">'.$char['marca'].' '.$char['modelo'].'<i class="material-icons right">more_vert</i></span>
                    <a href="AddEdit.php?ID='.$char['ID'].'"><i class="material-icons" style="color: #000">edit</i></a>
                    <a href="delete.php?ID='.$char['ID'].'"><i class="material-icons" style="color: #000">delete</i></a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Descipcion<i class="material-icons right">close</i></span>
                    <p>Valor: '.$char['valor'].' Dolares</p>
                    <p>Peso: '.$char['peso'].' Libras</p>
                </div>
                </div>
            </div>
            ';
            }
            
      }
      else{
        echo'
        <div class="center">
        <div class="notrucks">No hay lavadoras en este camion. Intenta guardar una.</div>
        </div>
        ';
        }
      ?>
        
    </div>

  </div>



</body>

</html>