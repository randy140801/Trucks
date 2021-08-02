<?php 
error_reporting(0);
require('CRUD.php'); 
if(!isset($_COOKIE["ID"])){
    redirect('../index.php');
    }


if (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $sql = "SELECT * FROM washingmachines WHERE ID='$ID'";
  $data = mysqli_query($connect, $sql);
  $char = mysqli_fetch_assoc($data);
  $blob = $char['foto'];
}
else if(isset($_GET['IDtruck'])){
  $IDtruck = $_GET['IDtruck'];
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
      <a href="washers.php?ID=<?php echo ($char['IDtruck'] != "") ? $char['IDtruck'] : $IDtruck?>" class="brand-logo center" style="color: #000;">Camiones</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="washers.php?ID=<?php echo ($char['IDtruck'] != "") ? $char['IDtruck'] : $IDtruck?>">Volver</a></li>
        <li class="header"><a href="signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <div class="card">
        
  <div class="row">
    <form class="col s12" action="evaluate.php?ID='.$char['ID'].'" method="POST" enctype="multipart/form-data">
    <div class="center">
            <div class="profile">
                <div class="avatar">
                    <input id="file-uploader" type="file" name="foto" value="">
                    <div class="img"
                        style="background-image:url(<?php echo ($char['foto'] != "") ? 'data:image/jpeg;base64,'.base64_encode( $blob ).'' : 'https://st.depositphotos.com/1062321/4621/v/600/depositphotos_46217317-stock-illustration-washing-machine-icon.jpg'?>)">
                    </div>
                    <label class="avatar-selector" for="file-uploader"><i class="fa fa-camera"></i></label>
                </div>
            </div>
        </div>
    <input hidden type="text" name="ID" value="<?php echo $char["ID"];?>">
    <input hidden type="text" name="IDtruck" value="<?php echo ($char['IDtruck'] != "") ? $char['IDtruck'] : $IDtruck?>">
        <div class="row">
            <div class="input-field col s12">
              <input name="codigo" id="Codigo" type="text" class="validate" value="<?php echo $char["codigo"];?>">
              <label for="Codigo">Codigo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="marca" id="Marca" type="text" class="validate" value="<?php echo $char["marca"];?>">
              <label for="Marca">Marca</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="modelo" id="Modelo" type="text" class="validate" value="<?php echo $char["modelo"];?>">
              <label for="Modelo">Modelo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="valor" id="Valor" type="number" class="validate" value="<?php echo $char["valor"];?>">
              <label for="Valor">Valor</label>
            </div>
        </div>
      <div class="row">
            <div class="input-field col s12">
              <input name="peso" id="Peso" type="number" class="validate" value="<?php echo $char["peso"];?>">
              <label for="Peso">Peso en libras</label>
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
<script id="rendered-js">
        (() => {
            document.querySelector("#file-uploader").addEventListener("change", e => {
                const image = e.target.files[0];
                const imageURL = URL.createObjectURL(image);
                document.querySelector(".profile .img").
                style.backgroundImage = ` url("${imageURL}")`;
            });
        })();
    </script>
</body>
</html>