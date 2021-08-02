<?php
require('../conect.php');
function add(){
    require('../conect.php');
    $file = $_FILES['foto']['tmp_name'];
        if (is_uploaded_file($file)) {
            $imgData = addslashes(file_get_contents($file));
            $ad = "INSERT INTO washingmachines VALUES('','$_POST[codigo]','$_POST[marca]','$_POST[modelo]','$_POST[valor]','$_POST[peso]','$_POST[IDtruck]','$imgData')";
            $char = mysqli_query($connect, $ad);
            $washers = "SELECT * FROM washingmachines WHERE IDtruck='$_POST[IDtruck]'";
            $washers = mysqli_query($connect, $washers);
            $valor = 0;
            $peso = 0;
            $cant = 0;
            foreach($washers as $val){
                $valor += $val['valor'];
                $peso += $val['peso'];
                $cant++;
            }
            $trucks = "UPDATE trucks SET valor='$valor',peso='$peso',lavadoras='$cant' WHERE ID='$_POST[IDtruck]'";
            $calculated = mysqli_query($connect, $trucks);
            if ($char && $calculated){
                redirect('washers.php?ID='.$_POST['IDtruck'].'');
            }
            else {
                redirect('AddEdit.php');
            }
            mysqli_close($connect);
        }
        else {
            redirect('AddEdit.php');
        }
}


function edit($id){
    require('../conect.php');
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $sql = "UPDATE washingmachines SET codigo='$_POST[codigo]',marca='$_POST[marca]',modelo='$_POST[modelo]',valor='$_POST[valor]',peso='$_POST[peso]',foto='$imgData' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        $washers = "SELECT * FROM washingmachines WHERE IDtruck='$_POST[IDtruck]'";
        $washers = mysqli_query($connect, $washers);
        $valor = 0;
        $peso = 0;
        foreach($washers as $val){
            $valor += $val['valor'];
            $peso += $val['peso'];
        }
        $trucks = "UPDATE trucks SET valor='$valor',peso='$peso' WHERE ID='$_POST[IDtruck]'";
        $calculated = mysqli_query($connect, $trucks);
        if ($char && $calculated) {
            redirect('washers.php?ID='.$_POST['IDtruck'].'');
        }
        else {
            echo'ERRRRRRRROR'.$connect->error;
        }
    }
    else {
        
        $sql = "UPDATE washingmachines SET codigo='$_POST[codigo]',marca='$_POST[marca]',modelo='$_POST[modelo]',valor='$_POST[valor]',peso='$_POST[peso]' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        $washers = "SELECT * FROM washingmachines WHERE IDtruck='$_POST[IDtruck]'";
        $washers = mysqli_query($connect, $washers);
        $valor = 0;
        $peso = 0;
        foreach($washers as $val){
            $valor += $val['valor'];
            $peso += $val['peso'];
        }
        $trucks = "UPDATE trucks SET valor='$valor',peso='$peso' WHERE ID='$_POST[IDtruck]'";
        $calculated = mysqli_query($connect, $trucks);
        if ($char && $calculated) {
            redirect('washers.php?ID='.$_POST['IDtruck'].'');
        }
        else {
            echo'ERRRRRRRROR'.$connect->error;
        }
    }
}

function delete($id, $IDtruck){
    require('../conect.php');
    $sql = "DELETE FROM washingmachines WHERE ID='$id'";
    $char = mysqli_query($connect, $sql);
    $washers = "SELECT * FROM washingmachines WHERE IDtruck='$IDtruck[IDtruck]'";
    $washers = mysqli_query($connect, $washers);
    $valor = 0;
    $peso = 0;
    $cant = 0;
    foreach($washers as $val){
        $valor += $val['valor'];
        $peso += $val['peso'];
        $cant++;
    }
    $trucks = "UPDATE trucks SET valor='$valor',peso='$peso',lavadoras='$cant' WHERE ID='$IDtruck[IDtruck]'";
    $calculated = mysqli_query($connect, $trucks);
    if ($char && $calculated) {
        redirect('washers.php?ID='.$IDtruck['IDtruck'].'');
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