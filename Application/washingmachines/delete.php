<?php 
require('CRUD.php');
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT IDtruck FROM washingmachines WHERE ID='$id'";
    $truck = mysqli_query($connect, $sql);
    $IDtruck = mysqli_fetch_assoc($connect->query($sql));
    delete($id, $IDtruck);
}
else {
    redirect('../trucks/trucks.php');
}


?>