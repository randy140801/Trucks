<?php
require('../conect.php');
function add(){
    require('../conect.php');
    $file = $_FILES['foto']['tmp_name'];
        if (is_uploaded_file($file)) {
            $imgData = addslashes(file_get_contents($file));
            
            $ad = "INSERT INTO trucks VALUES('','$_POST[marca]','$_POST[modelo]','$_POST[color]','$_POST[comentario]','','','','$imgData')";
            if ($connect->query($ad)){
                redirect('trucks.php');
            }
            else {
                redirect('AddEdit.php');
            }
            mysqli_close($connect);
        }
        else {
            $message = "Debe seleccionar una imagen para su camion";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
}


function edit($id){
    require('../conect.php');
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $sql = "UPDATE trucks SET marca='$_POST[marca]',modelo='$_POST[modelo]',color='$_POST[color]',comentario='$_POST[comentario]',foto='$imgData' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char) {
            redirect('trucks.php');
        }
        else {
            echo'ERROR'.$connect->error;
        }
    }
    else {
        $sql = "UPDATE trucks SET marca='$_POST[marca]',modelo='$_POST[modelo]',color='$_POST[color]',comentario='$_POST[comentario]' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char) {
            redirect('trucks.php');
        }
        else {
            echo'ERRRRRRRROR'.$connect->error;
        }
    }
}

function delete($id){
    require('../conect.php');
    $sql = "DELETE FROM trucks WHERE ID='$id'";
    $char = mysqli_query($connect, $sql);
    $washers = "SELECT * FROM washingmachines WHERE IDtruck='$id'";
    $washers = mysqli_query($connect, $washers);
    foreach($washers as $val){
        $sql = "DELETE FROM washingmachines WHERE IDtruck='$val[IDtruck]'";
        $char = mysqli_query($connect, $sql);
    }
    if ($char) {
        redirect('trucks.php');
    }
    else {
        echo'ERROR'.$connect->error;
    }
}


function redirect($url){
    echo"
    <script>
    window.location = '{$url}';
    </script>
    ";
    exit();
}


?>
