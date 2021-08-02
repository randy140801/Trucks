<?php
require('../conect.php');
function add(){
    require('../conect.php');
        $ad = "INSERT INTO users VALUES('','$_POST[nombre]','$_POST[correo]','$_POST[clave]')";
        if ($connect->query($ad)){
            redirect('users.php');
        }
        else {
            echo'NO GUARDO MIOP'.$connect->error;
        }
        mysqli_close($connect);
}


function edit($id){
    require('../conect.php');
        $sql = "UPDATE users SET nombre='$_POST[nombre]',correo='$_POST[correo]',clave='$_POST[clave]' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char) {
            redirect('users.php');
        }
        else {
            echo'ERRRRRRRROR'.$connect->error;
        }
}

function delete($id){
    require('../conect.php');
    $sql = "DELETE FROM users WHERE ID='$id'";
    $char = mysqli_query($connect, $sql);
    if ($char) {
        redirect('users.php');
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