<?php 
error_reporting(0);
require('CRUD.php'); 
if(!isset($_COOKIE["ID"])){
    redirect('index.php');
    }
if (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $sql = "SELECT * FROM users WHERE ID='$ID'";
  $data = mysqli_query($connect, $sql);
  $char = mysqli_fetch_assoc($data);
}

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
    <link rel="stylesheet" href="../css/style.css">
    <title>Camiones</title>
</head>
<body>
    
<nav class="header">
    <div class="nav-wrapper">
      <a href="users.php" class="brand-logo left" style="color: #000; margin-left:10%">Usuarios</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="../trucks/trucks.php">Camiones</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <div class="card">
        
  <div class="row">
    <form class="col s12" action="evaluate.php?ID='.$char['ID'].'" method="POST">
    <input hidden type="text" name="ID" value="<?php echo $char["ID"];?>">
    <div class="row">
            <div class="input-field col s12">
              <input name="nombre" id="Nombre" type="text" class="validate" value="<?php echo $char["nombre"];?>">
              <label for="Nombre">Nombre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="correo" id="Correo" type="text" class="validate" value="<?php echo $char["correo"];?>">
              <label for="Correo">Correo</label>
            </div>
        </div>
      <div class="row">
            <div class="input-field col s12">
              <input name="clave" id="Clave" type="password" class="validate" value="<?php echo $char["clave"];?>">
              <label for="Clave">Contraseña</label>
            </div>
        </div>
      <div class="row">
          <div class="center">
            <button class="btn waves-effect waves-light reset" type="reset" name="action" style="margin-right: 5px;">Limpiar</button>
            <button class="btn waves-effect waves-light save" type="submit" name="action">Guardar</button>
            </div>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>