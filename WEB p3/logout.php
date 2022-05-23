<?php
session_start();
unset($_SESSION["usuari"]);
unset($_SESSION["Contrassenya"]);
header("Location:index.php");
?>
