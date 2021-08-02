<?php 
require('CRUD.php');
if(!isset($_COOKIE["ID"])){
    redirect('../index.php');
    }
$ID = $_COOKIE["ID"];
$sql = "SELECT * FROM trucks";
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
  <link rel="stylesheet" href="../css/style.css">
  <title>Camiones</title>
</head>

<body>

  <nav class="header">
    <div class="nav-wrapper">
      <a href="trucks.php" class="brand-logo left" style="color: #000; margin-left:10%">Camiones</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="AddEdit.php">Agregar</a></li>
        <li class="header"><a href="../users/users.php">Usuarios</a></li>
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
                    <a href="../washingmachines/washers.php?ID='.$char['ID'].'"><i class="material-icons" style="color: #000">local_laundry_service</i></a>
                    <a href="../printPDF.php?ID='.$char['ID'].'"><i class="material-icons" style="color: #000">print</i></a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Detalles<i class="material-icons right">close</i></span>
                    <p>Comentario: '.$char['comentario'].'</p>
                    <p>Total de lavadoras: '.$char['lavadoras'].'</p>
                    <p>Valor de la carga: '.$char['valor'].'</p>
                    <p>Peso total de la carga: '.$char['peso'].'</p>
                </div>
                </div>
            </div>
            ';
            }
            
      }
      else{
        echo'
        <div class="center">
        <div class="notrucks">No hay ningun camion por el momento. Intenta guardar uno.</div>
        </div>
        ';
        }
      ?>
        
    </div>

  </div>



</body>

</html>