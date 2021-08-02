<?php

$connect = mysqli_connect("trucksrf.mysql.database.azure.com","randy140801@trucksrf","Randy0801","trucks");

if($connect)
{
  echo'CONECTADO';
}
else
{
  echo'AMIGO NO ESTA CONECTADO';
}
?>
