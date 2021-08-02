<?php
require('conect.php');
error_reporting(0);
    if ($_POST['nombre']) {
        $ad = "INSERT INTO users VALUES('','$_POST[nombre]','$_POST[correo]','$_POST[clave]')";
        if ($connect->query($ad)){
            redirect('index.php');
        }
        else {
            echo'NO GUARDO MIOP'.$connect->error;
        }
        mysqli_close($connect);
    }
    else{
        $select = "SELECT * FROM users WHERE correo='$_POST[correo]' and clave='$_POST[clave]'";
        $row = mysqli_fetch_assoc($connect->query($select));
       if($row['ID'] > 0){
        setcookie("ID", $row['ID']);   
        setcookie("correo", $row['correo']);
        setcookie("nombre", $row['nombre']);
        redirect('trucks/trucks.php');
       }
       else{
           redirect('index.php');
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