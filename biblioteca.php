<?php
    session_start();
    $idusuario=$_SESSION['idusuario'];
    $username=$_SESSION['username'];
    $tipoperfil=$_SESSION['tipoperfil'];
if ($idusuario!=null) {
    require("biblioteca.html");
}else{
    header("location:index.php");
}
?>