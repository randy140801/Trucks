<?php 
require('CRUD.php');
if(!isset($_COOKIE["ID"])){
    redirect('../index.php');
    }
$ID = $_COOKIE["ID"];
$sql = "SELECT * FROM users";
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
      <a href="users.php" class="brand-logo left" style="color: #000; margin-left:10%">Usuarios</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="AddEdit.php">Agregar</a></li>
        <li class="header"><a href="../trucks/trucks.php">Camiones</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <table style="background-color: white; border-radius: 10px">
    <tr>
      <th class="center">ID</th>
      <th class="center">Nombre</th>
      <th class="center">Correo</th>
      <th class="center">Acciones</th>
    </tr>
    <?php
      foreach($all as $char)
      {
            echo' <tr>
            <td class="center">'.$char['ID'].'</td>
            <td class="center">'.$char['nombre'].'</td>
            <td class="center">'.$char['correo'].'</td>
            <td class="center"><a href="AddEdit.php?ID='.$char['ID'].'"><i class="material-icons" style="color: #000">edit</i></a>
            <a href="delete.php?ID='.$char['ID'].'"><i class="material-icons" style="color: #000">delete</i></a></td>
          </tr>';
            
      }
      ?>
  </table>
  </div>


</body>

</html>