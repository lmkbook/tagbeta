<?php

    ini_set('display_error', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $db = 'tagmypet';
    $nsql = new mysqli($host, $user, $pass, $db);

    if(!$nsql){
        die("ERROR DE CONEXION" . mysqli_connect_error());
    }else{
        echo "";
    }

?>