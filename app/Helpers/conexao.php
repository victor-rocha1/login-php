<?php 
    $hostname = "localhost";
    $bancodedados = "phplogin";
    $usuario = "root";
    $senha = "";

    $mysql = new mysqli($hostname, $usuario, $senha, $bancodedados);

    if ($mysql->connect_errno) {
        echo"falha ao conectar";
    }
?>