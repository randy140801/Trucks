<?php 
setcookie("ID", "", time()-3600);
setcookie("correo", "", time()-3600);
setcookie("nombre", "", time()-3600);
header("Location: index.php");
exit();
?>