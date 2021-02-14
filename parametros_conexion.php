<?php

    // set conection parameters
    $db_host = "localhost";
    $db_name = "prueba";
    $db_user = "root";
    $db_password = "";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

    if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>